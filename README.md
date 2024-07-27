# Student Data Dashboard

The Student Data Dashboard is a web application designed to manage student information, including adding, deleting, and editing student data. The application also displays statistics such as the total number of students and active courses.

## Description

This application provides a user-friendly web interface for managing student data. Key features include:

- Adding new students
- Editing student information
- Deleting students
- Displaying total number of students
- Displaying active courses

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL

## Installation

1. **Clone the repository** to your local machine:
   ```bash
   git clone https://github.com/username/repository-name.git
   ```
2. Navigate to the project directory: cd repository-name

3. Create Database and Tables:
   Create the required database and tables in MySQL. You can use the following SQL script to set up the tables:

   **CREATE DATABASE database_name;**

   **USE database_name;**

   **CREATE TABLE students (**
   **id INT(11) AUTO_INCREMENT PRIMARY KEY,**
   **name VARCHAR(100) NOT NULL,**
   **nim VARCHAR(50) NOT NULL,**
   **faculty VARCHAR(100) NOT NULL,**
   **status ENUM('active', 'inactive') NOT NULL,**
   **profile VARCHAR(255)**
   **);**

4. Configure Database Connection:
   Update the database connection information in your PHP files, such as server name, username, password, and database name.

5. Run the Server:
   Ensure you have a local server like XAMPP or WAMP to run this application. Place the project files in the htdocs or www directory and start the server.

## Usage

1. Navigate to the main page in your browser:
   http://localhost/project-name/

2. Manage Student Data:

   - Add, edit, or delete student data through the provided interface.

3. Statistics:

   - View statistics such as the total number of students and active courses on the dashboard.

## Preview

![Student Data Dashboard Preview](https://github.com/alfian-happier/crud-university/blob/main/Screenshot%202024-07-27%20171838.png?raw=true)
