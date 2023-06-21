import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/api.js',
        'resources/js/table.js'
      ],
      refresh: [
        ...refreshPaths,
        'app/Http/Livewire/**'
      ]
    })
  ]
})
