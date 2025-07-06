-- Laravel Portfolio Database Setup
-- Run this SQL in your production database

-- Create users table
CREATE TABLE users (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    email_verified_at timestamp NULL DEFAULT NULL,
    password varchar(255) NOT NULL,
    role varchar(255) DEFAULT 'user',
    remember_token varchar(100) DEFAULT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY users_email_unique (email)
);

-- Create projects table
CREATE TABLE projects (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    description text NOT NULL,
    technologies varchar(255) NOT NULL,
    github_link varchar(255) DEFAULT NULL,
    live_link varchar(255) DEFAULT NULL,
    images json DEFAULT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);

-- Create messages table
CREATE TABLE messages (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    subject varchar(255) NOT NULL,
    message text NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);

-- Create cvs table
CREATE TABLE cvs (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    file_path varchar(255) NOT NULL,
    is_active tinyint(1) NOT NULL DEFAULT '0',
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);

-- Create sessions table
CREATE TABLE sessions (
    id varchar(255) NOT NULL,
    user_id bigint unsigned DEFAULT NULL,
    ip_address varchar(45) DEFAULT NULL,
    user_agent text,
    payload longtext NOT NULL,
    last_activity int NOT NULL,
    PRIMARY KEY (id),
    KEY sessions_user_id_index (user_id),
    KEY sessions_last_activity_index (last_activity)
);

-- Create cache table
CREATE TABLE cache (
    `key` varchar(255) NOT NULL,
    value mediumtext NOT NULL,
    expiration int NOT NULL,
    PRIMARY KEY (`key`)
);

-- Create cache_locks table
CREATE TABLE cache_locks (
    `key` varchar(255) NOT NULL,
    owner varchar(255) NOT NULL,
    expiration int NOT NULL,
    PRIMARY KEY (`key`)
);

-- Create jobs table
CREATE TABLE jobs (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    queue varchar(255) NOT NULL,
    payload longtext NOT NULL,
    attempts tinyint unsigned NOT NULL,
    reserved_at int unsigned DEFAULT NULL,
    available_at int unsigned NOT NULL,
    created_at int unsigned NOT NULL,
    PRIMARY KEY (id),
    KEY jobs_queue_index (queue)
);

-- Create job_batches table
CREATE TABLE job_batches (
    id varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    total_jobs int NOT NULL,
    pending_jobs int NOT NULL,
    failed_jobs int NOT NULL,
    failed_job_ids longtext NOT NULL,
    options mediumtext,
    cancelled_at int DEFAULT NULL,
    created_at int NOT NULL,
    finished_at int DEFAULT NULL,
    PRIMARY KEY (id)
);

-- Create failed_jobs table
CREATE TABLE failed_jobs (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    uuid varchar(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload longtext NOT NULL,
    exception longtext NOT NULL,
    failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY failed_jobs_uuid_unique (uuid)
);

-- Insert admin user (password: nmdp7788)
INSERT INTO users (name, email, password, role, email_verified_at, created_at, updated_at) 
VALUES ('Admin', 'admin@yopmail.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW(), NOW());

-- Insert sample project (optional)
INSERT INTO projects (title, description, technologies, github_link, live_link, created_at, updated_at)
VALUES (
    'Laravel Portfolio',
    'A professional portfolio website built with Laravel, featuring admin panel, contact form, and CV management system.',
    'Laravel, PHP, MySQL, Bootstrap, JavaScript, GSAP, Swiper.js',
    'https://github.com/umerfarooque00786/Umer-Portfolio',
    'https://your-domain.vercel.app',
    NOW(),
    NOW()
);
