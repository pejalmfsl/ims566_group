ALTER TABLE users
    ADD COLUMN username VARCHAR(50) NULL AFTER id;

UPDATE users
SET username = UPPER(SUBSTRING_INDEX(email, '@', 1))
WHERE username IS NULL OR username = '';

ALTER TABLE users
    MODIFY username VARCHAR(50) NOT NULL,
    ADD UNIQUE KEY uq_users_username (username),
    MODIFY role ENUM('superadmin','admin') NOT NULL DEFAULT 'admin';

DELETE FROM users WHERE username = 'SUPERADMIN';

INSERT INTO users (username, name, email, password, role, created_at, updated_at)
VALUES ('SUPERADMIN', 'Super Admin', 'superadmin@example.com', '$2y$12$BNTkvrq1tVYs/WG43aEj7eXlbBKadu92aIywD0CHeU7vB3AEvVoLS', 'superadmin', NOW(), NOW());
