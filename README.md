# Inventory Management System

## Project Overview

The **Webstack Portfolio Project** is a full-stack web application designed to manage user requests and device tracking. This system provides a seamless interface for both students and staff to submit, view, and update their requests. The project focuses on creating a user-friendly experience, utilizing a robust architecture and secure backend processing to handle user inputs efficiently.

## Team Members
Divine Dorvlo: Frontend design, UI development, and connecting frontend with backend APIs.

## Project Features
- **Secure User Login & Session Management**: PHP-based authentication system that ensures users can log in and securely manage their sessions.
- **Request Management**: Users can submit requests, select multiple devices, and track the status of their requests.
- **Multi-select Dropdown**: Integrated a multi-select dropdown for selecting devices with filtering options, improving the user experience.
- **Responsive Design**: Frontend built with Bootstrap ensures responsiveness across different screen sizes and devices.

## Technologies Used

### Frontend
- **HTML5**
- **CSS3**
- **JavaScript**
- **Bootstrap 4**

### Backend
- **PHP**: Handles request processing, form submissions, and session management.
- **MySQL**: Used for data storage and retrieval (user information, request details, device information).

### Development Tools
- **GitHub**: Version control and collaboration.
- **phpMyAdmin**: MySQL database management.
- **VS Code**: Code editor used for development.

## Architecture Overview

The project architecture includes three main components:
1. **Frontend**: Built using HTML, CSS, JavaScript, and Bootstrap. It provides the interface for users to interact with the system.
2. **Backend**: PHP is used for processing user requests, interacting with the database, and managing sessions.
3. **Database**: MySQL database that stores user information, requests, and device data.

### Visual Diagram

A visual representation of the architecture, including the flow between the frontend, backend, and database.

![image](https://github.com/user-attachments/assets/78ef121f-c135-4c11-b011-d0798e318f8c)


## Installation & Setup

### Prerequisites
- **XAMPP/WAMP Server**: To run the PHP backend and MySQL database locally.
- **Composer**: Dependency management (if required).
- **Git**: Version control.

### Steps
1. Clone this repository:
    ```bash
    git clone https://github.com/DivineDK/Webstack---Portfolio-Project---Pitch.git
    ```
2. Navigate to the project folder:
    ```bash
    cd webstack-portfolio
    ```
3. Set up your database:
    - Import the `database.sql` file into your MySQL database.
    - Configure your `config.php` file with the correct database credentials.

4. Start the PHP server (if using XAMPP/WAMP, ensure Apache and MySQL are running):
    ```bash
    php -S localhost:8000
    ```

5. Open the app in your browser at `http://localhost:8000`.

## Project Highlights

- **Prepared Statements**: Secure database interactions to prevent SQL injection.
- **Device Management**: Users can select multiple devices and submit them with a single request.
- **Bootstrap UI**: Ensured a consistent and responsive layout across all devices.

## Challenges

- **Database Integration**: Managing the flow of data between the frontend and backend, especially with multi-select inputs.
- **Cross-Browser Compatibility**: Addressed issues with layout rendering in different browsers.

## Lessons Learned

- Improved our understanding of secure backend development using PHP.
- Learned how to effectively manage dynamic forms and integrate them into a full-stack application.
- Gained valuable experience in team collaboration and problem-solving.

## Next Steps

- **Feature Expansion**: Plan to introduce real-time request tracking and notifications.
- **Deployment**: Move the project to a live environment for real-world testing.
- **User Feedback**: Gather feedback and iterate on the user interface and functionality.


