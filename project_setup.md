# LERS Setup Notes

Library Event Registration System (LERS) is a CodeIgniter 4 application for IMS566 group project submission.

## Included

* CodeIgniter 4 MVC controllers, models, filters, and views
* MySQL schema file in `database/lers_schema.sql`
* Bootstrap 5 responsive interface
* Role-based login for `superadmin` and `admin`
* Event CRUD with generated public registration link
* Participant registration, listing, edit, delete, and attendance marking
* Search and filter for events, activity summaries, and attendance lists
* Attendance PDF export using DomPDF
* Environment template and Composer manifest

## Setup Steps

1. Install dependencies with Composer.
2. Copy `.env.example` to `.env`.
3. Update `app.baseURL` and database credentials in `.env`.
4. Import `database/lers_schema.sql` into MySQL.
5. Login with the seeded superadmin account and create admin users as needed.

## Current Status

Core application modules required by the IMS566 guideline are implemented:

* Authentication
* Event CRUD
* Participant registration and CRUD
* Search/filter
* Attendance marking
* PDF export
* Responsive Bootstrap UI

Remaining submission work is documentation packaging: final report/user manual PDF, screenshots, final GitHub repository URL, and presentation material.
