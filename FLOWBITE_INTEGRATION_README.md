# Flowbite Integration

This document describes the Flowbite integration with the Laravel project using Tailwind CSS v4.

## Installation & Configuration

### 1. Package Installation
```bash
npm install flowbite
```

### 2. Configuration Files Updated

#### CSS Configuration (`resources/css/app.css`)
- Added Flowbite source scanning: `@source '../../node_modules/flowbite/**/*.js';`
- This allows Tailwind to scan Flowbite components for utility classes

#### Layout Files
- **`resources/views/livewire/layout/landing.blade.php`**: Added Flowbite JavaScript
- **`resources/views/livewire/layout/app.blade.php`**: Added Flowbite JavaScript

```html
<script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
```

### 3. Build Process
```bash
npm run build
```

## Usage

### Available Components
Flowbite provides a wide range of components including:
- Buttons
- Cards
- Alerts
- Modals
- Dropdowns
- Forms
- Tables
- Navigation
- And many more...

### Example Usage
```blade
{{-- Flowbite Button --}}
<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    Flowbite Button
</button>

{{-- Flowbite Card --}}
<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Card Title</h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Card content...</p>
</div>
```

## Testing

### Test Route
Visit `/flowbite-test` to see Flowbite components in action.

### Test Components
- **Button**: Standard Flowbite button with hover effects
- **Card**: Flowbite card component with proper styling
- **Alert**: Interactive alert with dismiss functionality

## Compatibility

### Tailwind CSS v4
This integration is specifically configured for Tailwind CSS v4 using the new Vite plugin approach. The configuration:
- Uses `@tailwindcss/vite` plugin
- Scans Flowbite components for utility classes
- Includes Flowbite JavaScript for interactive components

### Browser Support
Flowbite supports all modern browsers and includes dark mode support.

## Resources

- [Flowbite Documentation](https://flowbite.com/docs/getting-started/introduction/)
- [Flowbite Components](https://flowbite.com/docs/components/buttons/)
- [Tailwind CSS v4 Documentation](https://tailwindcss.com/docs)

## Notes

- Flowbite CSS is not imported directly due to Tailwind CSS v4 compatibility
- Components use utility classes that are automatically included
- JavaScript components require the Flowbite script to be loaded
- Dark mode support is built-in and follows Tailwind's dark mode configuration

