# Rultivate Deployment Instructions

This document provides instructions for deploying the Rultivate marketplace application on a VPS with cPanel.

## Prerequisites

*   A VPS with cPanel installed.
*   Apache, MySQL, and PHP installed on the server.
*   Node.js and npm installed on your local machine.

## Backend Deployment

1.  **Create a Database:**
    *   Log in to your cPanel account.
    *   Navigate to the "MySQL Databases" section.
    *   Create a new database named `rultivate`.
    *   Create a new database user and add it to the `rultivate` database with all privileges.

2.  **Import the Database Schema:**
    *   Navigate to the "phpMyAdmin" section in cPanel.
    *   Select the `rultivate` database.
    *   Click on the "Import" tab.
    *   Upload the `schema.sql` file and click "Go".

3.  **Upload Backend Files:**
    *   Navigate to the "File Manager" in cPanel.
    *   Go to the `public_html` directory.
    *   Create a new folder named `api`.
    *   Upload all the files from the `api` directory of the project to the `public_html/api` directory on your server.

4.  **Configure the Database Connection:**
    *   Open the `public_html/api/config/database.php` file.
    *   Update the `$host`, `$db_name`, `$username`, and `$password` variables with your database credentials.

## Frontend Deployment

1.  **Build the Angular App:**
    *   Open a terminal on your local machine.
    *   Navigate to the root directory of the project.
    *   Run the command `ng build --configuration production`.

2.  **Upload Frontend Files:**
    *   Navigate to the "File Manager" in cPanel.
    *   Go to the `public_html` directory.
    *   Upload all the files from the `dist/rultivate-frontend` directory of the project to the `public_html` directory on your server.
