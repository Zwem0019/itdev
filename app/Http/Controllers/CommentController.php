<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $comments = Comment::paginate(15);


        return view('comments.index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('comments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        Comment::create($this->validateComment($request));
        return redirect()->route('Comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $Comment): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('comments.show', compact('Comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $Comment): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('comments.edit', compact('Comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $Comment): RedirectResponse
    {

        $Comment->update($this->validateComment($request));

        return redirect()->route('Comments.show', $Comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $Comment): RedirectResponse
    {

        $Comment->delete();

        return redirect()->route('Comments.index');
    }

    private function validateComment(Request $request): array
    {
        return $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5|max:5000',
            'name' => 'required',
        ]);
    }
}
