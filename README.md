# HRIS System Documentation

## Project Overview

This project is a **Human Resource Information System (HRIS)** designed to manage employee data, attendance, leaves, payroll, and more. It consists of:

-   A **Laravel 10 backend** serving as an API.
-   A **React.js frontend** for managerial interfaces.
-   A **Flutter mobile app** for employee attendance and activities.

The system supports features like:

-   Employee management
-   Attendance tracking with face recognition and geolocation
-   Leave and task management
-   Payroll processing
-   Role-based access control (RBAC)

---

## Technologies Used

### Backend

-   **Laravel 10**: PHP framework for building the API.
-   **Sanctum**: For API authentication.
-   **MySQL/PostgreSQL**: Database for storing employee, attendance, leave, and payroll data.
-   **Spatie Laravel Permissions**: For role-based access control (RBAC).
-   **Laravel Factories and Seeders**: For generating dummy data.
-   **Laravel Migrations**: For database schema management.

### Frontend (Managerial Dashboard)

-   **React.js**: JavaScript library for building the user interface.
-   **Axios**: For making API requests to the Laravel backend.
-   **Material-UI (MUI)**: For pre-built React components and styling.
-   **React Router**: For navigation and routing.

### Mobile App (Employee Attendance)

-   **Flutter**: Framework for building cross-platform mobile apps.
-   **Camera Plugin**: For capturing images during attendance.
-   **Geolocator**: For detecting employee location during attendance.
-   **TensorFlow Lite**: For on-device face recognition.

### Other Tools

-   **Docker**: For containerization and local development.
-   **Git**: For version control.
-   **Postman**: For API testing.
-   **Redis**: For caching and queue management (optional).

---

## API Documentation

### Base URL

http://yourdomain.com/api

### Authentication

All endpoints (except `/login` and `/register`) require authentication via **Sanctum tokens**. Include the token in the `Authorization` header:

Authorization: Bearer <your-token>

---

### Endpoints

#### 1. Authentication

-   **Login**

    -   **URL**: `/login`
    -   **Method**: `POST`
    -   **Request Body**:
        ```json
        {
            "email": "user@example.com",
            "password": "password"
        }
        ```
    -   **Response**:
        ```json
        {
            "token": "your-sanctum-token"
        }
        ```

-   **Register**

    -   **URL**: `/register`
    -   **Method**: `POST`
    -   **Request Body**:
        ```json
        {
            "name": "John Doe",
            "email": "user@example.com",
            "password": "password",
            "password_confirmation": "password"
        }
        ```
    -   **Response**:
        ```json
        {
            "token": "your-sanctum-token"
        }
        ```

-   **Logout**
    -   **URL**: `/logout`
    -   **Method**: `POST`
    -   **Response**:
        ```json
        {
            "message": "Logged out successfully"
        }
        ```

---

#### 2. Employees

-   **Get All Employees**

    -   **URL**: `/employees`
    -   **Method**: `GET`
    -   **Response**:
        ```json
        [
            {
                "id": 1,
                "name": "John Doe",
                "department_id": 1,
                "position_id": 1,
                "nik": "1234567890",
                "join_date": "2023-01-01",
                "photo_path": "http://yourdomain.com/storage/employee_photos/photo.jpg"
            }
        ]
        ```

-   **Create Employee**
    -   **URL**: `/employees`
    -   **Method**: `POST`
    -   **Request Body**:
        ```json
        {
            "name": "Jane Doe",
            "department_id": 1,
            "position_id": 1,
            "nik": "0987654321",
            "join_date": "2023-01-01",
            "photo": "<file>"
        }
        ```
    -   **Response**:
        ```json
        {
            "id": 2,
            "name": "Jane Doe",
            "department_id": 1,
            "position_id": 1,
            "nik": "0987654321",
            "join_date": "2023-01-01",
            "photo_path": "http://yourdomain.com/storage/employee_photos/photo.jpg"
        }
        ```

---

#### 3. Attendance

-   **Check-In**
    -   **URL**: `/attendance/check-in`
    -   **Method**: `POST`
    -   **Request Body**:
        ```json
        {
            "employee_id": 1,
            "check_in": "2023-10-01 08:00:00",
            "check_in_location": "Office",
            "check_in_photo": "<file>"
        }
        ```
    -   **Response**:
        ```json
        {
            "id": 1,
            "employee_id": 1,
            "check_in": "2023-10-01 08:00:00",
            "check_in_location": "Office",
            "check_in_photo": "http://yourdomain.com/storage/attendance_photos/photo.jpg"
        }
        ```

---

#### 4. Payroll

-   **Get Payroll**
    -   **URL**: `/payroll`
    -   **Method**: `GET`
    -   **Response**:
        ```json
        [
            {
                "id": 1,
                "employee_id": 1,
                "basic_salary": 5000000,
                "allowances": 1000000,
                "deductions": 500000,
                "net_salary": 5500000,
                "payroll_date": "2023-10-01"
            }
        ]
        ```

---

## Setup Instructions

### Backend (Laravel)

1. Clone the repository:
   `bash
 git clone https://github.com/your-repo/hris-system.git
 cd hris-system
 `
   Install dependencies:
   composer install

Set up the .env file:

#### cp .env.example .env

Generate an application key:

#### php artisan key:generate

Run migrations and seeders:

#### php artisan migrate --seed

Start the development server:

#### php artisan serve
