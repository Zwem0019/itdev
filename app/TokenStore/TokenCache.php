<?php

namespace App\TokenStore;
use App\Models\AuthClient;

/**
 * Class to store and retrieve tokens from session
 */
class TokenCache
{
    /**
     * Store tokens and user data in the session
     */
    public function storeTokens($accessTokens, $user)
    {
        session([
            // Store the tokens
            'accessToken'   => $accessTokens->getToken(),
            'refreshToken'  => $accessTokens->getRefreshToken(),
            'tokenExpires'  => $accessTokens->getExpires(),

            // Store the user
            // Depending on the account type, the mail or userPrincipalName attribute will be used
            'userName'      => $user->getDisplayName(),
            'userEmail'     => null !== $user->getMail() ? $user->getMail() : $user->getUserPrincipalName(),
            'userTimeZone'  => $user->getMailboxSettings()->getTimeZone()
        ]);
    }

    /**
     * Clear the session
     */
    public function clearTokens()
    {
        // Clear all session variables
        session()->forget('accessToken');
        session()->forget('refreshToken');
        session()->forget('tokenExpires');
        session()->forget('userName');
        session()->forget('userEmail');
        session()->forget('userTimeZone');
    }

    /**
     * Get the access tokens from the session
     */
    public function getAccessToken()
    {
        // Check if the tokens exist
        if (empty(session('accessToken')) || empty(session('refreshToken')) || empty(session('tokenExpires'))) {
            return '';
        }

        // Check if token is expired, if so refresh it
        $now = time() + 300;
        if (session('tokenExpires') <= $now) {
            return $this->refreshTokens();
        }

        // Token is still valid, return it
        return session('accessToken');
    }

    /**
     * Update the tokens in the session
     */
    public function updateTokens($accessTokens)
    {
        session([
            // Set the tokens
            'accessToken'   => $accessTokens->getToken(),
            'refreshToken'  => $accessTokens->getRefreshToken(),
            'tokenExpires'  => $accessTokens->getExpires()
        ]);
    }

    /**
     * Refresh the tokens in the session with new ones
     */
    private function refreshTokens() {
        try {
            // Initialize the OAuth client and get new tokens
            $oauthClient = AuthClient::getAuthClient();
            $newToken = $oauthClient->getAccessToken('refresh_token', [
                'refresh_token' => session('refreshToken')
            ]);

            // Store the new values in the session
            $this->updateTokens($newToken);

            // Return the new access token
            return $newToken->getToken();
        } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
            // The refresh token failed, return nothing
            return '';
        }
    }
}