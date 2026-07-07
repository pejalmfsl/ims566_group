# Library Event Registration System (LERS)

## IMS566 - Advanced Web Design Development and Content Management

LERS is a web-based system for managing library events and participant registration. It converts a manual event registration process into an online application with authentication, CRUD, search/filter, attendance tracking, and PDF export.

## Live System

Application URL:

`https://ptarapps.uitm.edu.my/ims566_group/`

GitHub Repository Link:

`Add the final GitHub repository URL here before submission.`

## Technology Stack

| Item | Technology |
| --- | --- |
| Framework | CodeIgniter 4 |
| Language | PHP 8.1+ |
| Database | MySQL |
| Frontend | Bootstrap 5 |
| PDF Export | DomPDF |
| Browser Target | Google Chrome |

## User Roles

| Role | Access |
| --- | --- |
| Superadmin | Dashboard, user management, event management, participant management, attendance, PDF export |
| Admin | Dashboard, event management, participant management, attendance, PDF export |
| Public participant | Event registration form through public event URL |

## Main Features

* Login and logout
* Role-based admin access
* Event create, list, update, delete
* Generated public registration URL for each event
* Public participant registration form
* Participant list, update, delete
* Attendance mark as Present or Absent
* Search and filter for events, activities, and attendance lists
* Attendance report export to PDF
* Responsive Bootstrap navigation and UI

## CRUD Workflow

1. Admin creates an event.
2. System generates a registration token and public registration URL.
3. Participant submits the registration form.
4. Admin reviews participant list by event.
5. Admin edits participant details or deletes invalid records.
6. Admin marks participant attendance as Present or Absent.
7. Admin exports attendance list to PDF.

## Entity Relationship Diagram

```mermaid
erDiagram
    USERS {
        int id PK
        varchar username
        varchar name
        varchar email
        varchar password
        enum role
        datetime created_at
        datetime updated_at
    }

    EVENTS {
        int id PK
        varchar registration_token
        varchar event_name
        varchar title
        text description
        varchar venue
        date event_date
        time event_time
        int max_participants
        date registration_close_date
        enum status
        datetime created_at
        datetime updated_at
    }

    REGISTRATIONS {
        int id PK
        int event_id FK
        varchar full_name
        varchar student_staff_id
        varchar email
        varchar phone_number
        varchar faculty
        varchar programme
        datetime register_date
        varchar attendance_status
        enum status
        datetime created_at
        datetime updated_at
    }

    ATTENDANCE {
        int id PK
        int event_id FK
        int registration_id FK
        enum status
        datetime checked_in_at
        datetime created_at
        datetime updated_at
    }

    EVENTS ||--o{ REGISTRATIONS : has
    EVENTS ||--o{ ATTENDANCE : records
    REGISTRATIONS ||--o{ ATTENDANCE : linked_to
```

## Database Tables

* `users` - administrator accounts and roles
* `events` - event details and registration token
* `registrations` - participant registration and status
* `attendance` - optional attendance record linkage

The database setup script is available at `database/lers_schema.sql`.

## System Requirements

* PHP 8.1 or newer
* Composer
* MySQL or MariaDB
* Apache/Nginx with rewrite support
* Google Chrome for testing and presentation

## Support Contact

Add the project manager or team support contact before final submission.
