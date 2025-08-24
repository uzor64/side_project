# Orders Feature

This feature implements a mobile-first orders page that matches the provided design exactly.

## Components Created

### Layout
- `resources/views/livewire/layout/landing.blade.php` - New layout for the orders page

### Orders Components
- `resources/views/components/orders/header.blade.php` - Header with title and filter icon
- `resources/views/components/orders/container.blade.php` - Main content container
- `resources/views/components/orders/section-heading-new.blade.php` - Time-based section headers
- `resources/views/components/orders/order-item-new.blade.php` - Individual order items with status badges

### UI Components
- `resources/views/components/ui/bottom-nav-new.blade.php` - Bottom navigation with 4 items

### Livewire Component
- `app/Livewire/OrdersPage.php` - Main Livewire component for the orders page
- `resources/views/livewire/orders/orders-page.blade.php` - Main view file

## Route
- `/orders` - Entry point to the orders feature

## Features
- Mobile-first responsive design
- Clean, modern UI matching the provided image
- Reusable blade components
- Status badges with appropriate colors
- Bottom navigation with active state
- Proper typography and spacing

## Status Badges
- **Processing**: Green background
- **On Hold**: Purple background
- **Completed**: Gray background

## Navigation Items
- My store (inactive)
- Orders (active)
- Products (inactive)
- Reviews (inactive)

## Usage
Visit `/orders` to see the orders page in action.
