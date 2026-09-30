# Hotel Crown Management System

A PHP and MySQL hotel website and management application. The project includes a guest-facing hotel homepage and pages for room booking, guest records, payments, restaurant billing, amenities billing, and room status management.

## Features

- Browse hotel rooms, amenities, and restaurant menu pages
- Submit room booking details and check room availability
- View guest, staff, payment, room, and vacant-room records
- Manage restaurant and amenities charges
- Update room availability from the admin area

## Requirements

- Xamp



Admin login credentials are read from the root `.env` file, with process environment variables as a fallback. Copy `.env.example` to `.env` and set both values. Keep `.env` private; it is excluded from Git. Login remains unavailable if either credential is blank or unset.

## Run with XAMPP

1. Install and open the XAMPP Control Panel.
2. Copy the entire project folder into `C:\xampp\htdocs\CSE`. The folder should contain `index.html`, `project.sql`, and the project subfolders.
3. In the XAMPP Control Panel, click **Start** beside **Apache** and **MySQL**.
4. Click **Admin** beside **MySQL** to open phpMyAdmin. Create a database named `project`.
5. Select the `project` database, open the **Import** tab, choose `C:\xampp\htdocs\CSE\project.sql`, and click **Import** or **Go** to load the schema and demo records.
6. In the project folder, copy `.env.example` to `.env` and set `HOTEL_ADMIN_USERNAME` and `HOTEL_ADMIN_PASSWORD` in `.env` for the admin login.
7. Open [http://localhost/CSE/](http://localhost/CSE/) in your browser.

The URL path must match the project folder's name inside `htdocs`. For example, if you use a folder name other than `CSE`, replace `CSE` in the URL with that folder name.

## Project structure

- `index.html` - guest-facing hotel homepage
- `room/` - room pages and booking flow
- `guest/` - guest details, payments, menu, and amenities pages
- `admin/` - database connection and booking-related pages
- `login/` - admin dashboard and room-status management
- `Menu_rate/` - restaurant billing pages
- `amenities/` - amenities billing pages
- `css/`, `image/`, and other feature folders - styles and visual assets