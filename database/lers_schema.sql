CREATE DATABASE IF NOT EXISTS ims566_group CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ims566_group;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('superadmin','admin') NOT NULL DEFAULT 'admin',
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB;

CREATE TABLE events (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    registration_token VARCHAR(80) NULL UNIQUE,
    event_name VARCHAR(150) NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT NULL,
    venue VARCHAR(150) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    max_participants INT UNSIGNED NOT NULL DEFAULT 0,
    registration_close_date DATE NULL,
    max_participant INT UNSIGNED NOT NULL DEFAULT 50,
    registration_deadline DATE NULL,
    status ENUM('draft','open','closed') NOT NULL DEFAULT 'draft',
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB;

CREATE TABLE registrations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT UNSIGNED NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    student_staff_id VARCHAR(50) NOT NULL,
    fullname VARCHAR(150) NOT NULL,
    student_id VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone_number VARCHAR(30) NOT NULL,
    faculty VARCHAR(100) NOT NULL,
    programme VARCHAR(100) NOT NULL,
    register_date DATETIME NOT NULL,
    attendance_status VARCHAR(20) NOT NULL DEFAULT 'Pending',
    status ENUM('registered','approved','rejected','attended','absent') NOT NULL DEFAULT 'registered',
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    CONSTRAINT fk_registrations_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE attendance (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT UNSIGNED NOT NULL,
    registration_id INT UNSIGNED NOT NULL,
    status ENUM('present','absent') NOT NULL DEFAULT 'present',
    checked_in_at DATETIME NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    CONSTRAINT fk_attendance_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    CONSTRAINT fk_attendance_registration FOREIGN KEY (registration_id) REFERENCES registrations(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO users (username, name, email, password, role, created_at, updated_at)
VALUES ('SUPERADMIN', 'Super Admin', 'superadmin@example.com', '$2y$12$BNTkvrq1tVYs/WG43aEj7eXlbBKadu92aIywD0CHeU7vB3AEvVoLS', 'superadmin', NOW(), NOW());
