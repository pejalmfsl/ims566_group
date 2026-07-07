# LERS Development Progress

Last updated: 2026-06-28

## Project Status

LERS (Library Event Registration System) is now running on CodeIgniter 4 at:

- Production URL: `https://ptarapps.uitm.edu.my/ims566_group/`
- Current working URL style: `index.php` routes, for example `/ims566_group/index.php/login`

## Completed

### Landing Page

- Root URL now displays a landing page.
- Landing page uses UiTM branding and logo.
- Bootstrap 5 is used with a custom UiTM theme stylesheet.
- Login buttons point to the working `index.php/login` route.

Files:

- `app/Controllers/Home.php`
- `app/Views/home/welcome.php`
- `public/assets/css/uitm-theme.css`
- `public/uitm-logo.svg`

### UiTM Theme

- Added UiTM colors based on logo colors:
  - Blue: `#002e6e`
  - Purple: `#8c3392`
  - Gold: `#febe10`
- Bootstrap primary/warning colors are overridden through `public/assets/css/uitm-theme.css`.
- UiTM logo added as a local SVG asset.

Files:

- `public/assets/css/uitm-theme.css`
- `public/uitm-logo.svg`

### Login Flow

- Login page redesigned using UiTM theme.
- Login success now redirects to dashboard.
- Login failure now shows Bootstrap danger alert.
- Login success now shows Bootstrap success alert on dashboard.
- Logout shows Bootstrap success alert on login page.
- Fixed POST method check so login submission is processed correctly.
- Auth redirects now use `site_url()` to work with `index.php` routing.

Tested credentials:

- Username: `SUPERADMIN`
- Password: `Password123!`

Files:

- `app/Controllers/Auth.php`
- `app/Filters/AuthFilter.php`
- `app/Views/auth/login.php`
- `app/Views/layouts/main.php`

### Database Compatibility

The existing database did not fully match the current app code. Minimum compatibility fixes were applied:

- Created missing `users` table.
- Seeded `SUPERADMIN` account.
- Added compatibility columns to `events`.
- Added compatibility columns to `registrations`.
- Created `attendance` table if missing.
- Added `registration_token` to `events`.
- Generated tokens for existing events.

Important note: the database still contains some legacy columns such as `title`, `max_participant`, `registration_deadline`, `fullname`, `student_id`, and `register_date`. Current app code supports compatibility for now.

### Dashboard

- Dashboard redesigned using UiTM theme.
- Added hero section, quick action buttons, statistics cards, upcoming events, and recent registrations.

Files:

- `app/Views/dashboard/index.php`
- `app/Views/layouts/main.php`

### User Management

- Fixed `Create User` URL not found issue by replacing `base_url()` with `site_url()`.
- User listing page redesigned with UiTM theme.
- Create user form redesigned with UiTM theme.
- Validation error alert added.
- Username is saved in uppercase.

Files:

- `app/Controllers/Users.php`
- `app/Views/users/index.php`
- `app/Views/users/form.php`

### Events CRUD

- Events list redesigned with UiTM theme.
- Create/edit event form redesigned.
- Added validation for event create/update.
- Added 404 handling for missing event on edit/update.
- Event redirect paths now use `site_url()`.
- New event auto-generates `registration_token`.
- Events list now displays unique registration URL with Copy button.
- Edit event page displays registration URL and Open button.

Files:

- `app/Controllers/Events.php`
- `app/Models/EventModel.php`
- `app/Views/events/index.php`
- `app/Views/events/form.php`

### Public Registration

- Registration is now public and does not require login.
- Public registration no longer uses numeric event ID.
- Each event has a unique token parameter.
- URL format:

```text
/ims566_group/index.php/register/{registration_token}
```

Example:

```text
https://ptarapps.uitm.edu.my/ims566_group/index.php/register/bengkel-literasi-digital-eab0b678
```

- Invalid token returns 404 error.
- Public registration page uses UiTM theme and logo.
- Successful registration shows Bootstrap success alert.
- Validation failure shows Bootstrap danger alert.
- Existing `Active` status is treated as open for compatibility.
- Current open statuses supported: `open`, `Active`.

Files:

- `app/Config/Routes.php`
- `app/Controllers/Registrations.php`
- `app/Models/RegistrationModel.php`
- `app/Views/registrations/create.php`

### Participants / Registration List

- Participants page no longer lists all participants in one mixed table.
- Participants page now groups registrations by activity/event.
- Counts are shown per activity.
- Since requirement changed, once a user registers, they are counted as attended.
- Removed `Pending`, `Absent`, and `Present` from Participants/Attendance screens.
- Current label: `Registered / Attended`.

Files:

- `app/Controllers/Participants.php`
- `app/Views/participants/index.php`

### Attendance / Activity Registration List

- Attendance page now shows registrations for a single activity only.
- Dashboard count shows `Total Registered / Attended`.
- Participant table shows only participants for the selected activity.
- Status is simplified to `Registered / Attended`.

Files:

- `app/Controllers/Attendance.php`
- `app/Views/attendance/index.php`

## Verified

The following were tested during development:

- Landing page returns `200`.
- Login failure displays Bootstrap danger alert.
- Login success redirects to dashboard and displays Bootstrap success alert.
- Users create page renders correctly after login.
- Public registration valid token returns `200`.
- Public registration invalid token returns `404`.
- Public registration submit succeeds.
- Events page shows registration URL and Copy button.
- Participants page renders grouped by activity.
- Attendance page renders participants for one activity only.

## Known Issues / Pending Server Configuration

### Clean URL Not Fully Enabled on HTTPS

Clean URLs like these currently return Apache 404:

```text
/ims566_group/login
/ims566_group/users/create
/ims566_group/events
```

Working URLs use `index.php`, for example:

```text
/ims566_group/index.php/login
/ims566_group/index.php/users/create
```

Reason:

- HTTP vhost has `AllowOverride All`.
- HTTPS vhost `ptarapps-ssl.conf` does not include a `<Directory /var/www/html>` block with `AllowOverride All`.
- `.htaccess` is therefore not being read under HTTPS.
- Attempted to edit Apache config, but sudo password is required.

Required server fix:

```apache
<Directory /var/www/html>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Then run:

```bash
sudo apachectl configtest
sudo systemctl reload apache2
```

After server config is fixed, set this in `app/Config/App.php`:

```php
public string $indexPage = '';
```

## Recommended Next Work

1. Clean up database schema properly with migration files.
2. Add edit/delete/reset password for users.
3. Add export report for activity registration list.
4. Add participant search/filter within each activity.
5. Add duplicate registration prevention by event + email or event + student/staff ID.
6. Add admin-friendly confirmation page after public registration.
7. Disable debug toolbar in production once development is done.
