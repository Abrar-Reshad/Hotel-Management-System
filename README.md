# Hotel Crown Management System

A PHP and MySQL hotel website and management application. The project includes a guest-facing hotel homepage and pages for room booking, guest records, payments, restaurant billing, amenities billing, and room status management.

## Features

- Browse hotel rooms, amenities, and restaurant menu pages
- Submit room booking details and check room availability
- View guest, staff, payment, room, and vacant-room records
- Manage restaurant and amenities charges
- Update room availability from the admin area

## Requirements

- PHP with the `mysqli` extension
- MySQL

The PHP pages expect a database named `project`. Database connection settings are currently defined in the PHP files. Configure them for your local MySQL instance before using database-backed pages. This repository does not currently include a database schema or seed data, so the required tables and records must be created separately.

Admin login credentials are read from the `HOTEL_ADMIN_USERNAME` and `HOTEL_ADMIN_PASSWORD` environment variables. Set both variables in your server environment; login will remain unavailable if either is unset.

## Run locally

From the project root, start PHP's development server:

```bash
php -S localhost:8000
```

On PowerShell, set the admin credentials before starting the server:

```powershell
$env:HOTEL_ADMIN_USERNAME = "admin"
$env:HOTEL_ADMIN_PASSWORD = "replace-with-a-strong-password"
```

Open [http://localhost:8000](http://localhost:8000) to view the homepage. Database-backed features require the MySQL setup described above.

## Project structure

- `index.html` - guest-facing hotel homepage
- `room/` - room pages and booking flow
- `guest/` - guest details, payments, menu, and amenities pages
- `admin/` - database connection and booking-related pages
- `login/` - admin dashboard and room-status management
- `Menu_rate/` - restaurant billing pages
- `amenities/` - amenities billing pages
- `css/`, `image/`, and other feature folders - styles and visual assets