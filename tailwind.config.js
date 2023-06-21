const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {

  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue'
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans]
      }
    },

    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      outolightblue: '#009EE8',
      outodarkblue: '#003057',
      ...colors
    }

  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
}
