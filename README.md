# Hotel Room Booking System

## Overview

This project is a Hotel Room Booking System designed to facilitate the reservation and management of hotel rooms. The system allows users to book rooms, check availability, and manage bookings through a user-friendly interface.

## Features

- **User Authentication**: Secure login and registration for users.
- **Room Booking**: Users can browse available rooms, view details, and book them.
- **Admin Dashboard**: Admins can manage rooms(Add, Delete, Feedback...)..
- **Search and Filter**: Users can search for rooms based on various criteria(Dtae, Type).
- **Forgot Password**: Users can reset their password if they forget it.
- **Receipt Generation**: Users receive a receipt for their booking.
- **Responsive Design**: Optimized for both desktop and mobile devices.

## Technologies Used

- **Framework**: Laravel
- **Frontend**: Blade templates, Bootstrap, CSS, Html
- **Database**: MySQL
- **PDF Generation**: DOMPDF
- **Local Development**: XAMPP
## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/hotel-room-booking.git
   cd hotel-room-booking

2. **Backend Setup**

 **Install Composer dependencies**

    composer install

**Create a copy of the `.env` file**

    cp .env.example .env

**Generate an application key**

    php artisan key:generate

**Configure your database in the `.env` file**

    Open the `.env` file and set your database credentials:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

**Run the database migrations**

    php artisan migrate

**Seed the database (optional)**

    php artisan db:seed

**Start the local development server**

    php artisan serve

## Usage

### Access the Application

1. Open your browser and navigate to `http://localhost:8000`.
2. Register a new account or log in with an existing account.

### Booking a Room

1. Browse the available rooms.
2. Select a room and check its availability.
3. Book the room by providing the necessary details.

## Contribution

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch:

    ```bash
    git checkout -b feature-branch
    ```

3. Make your changes.
4. Commit your changes:

    ```bash
    git commit -am 'Add new feature'
    ```

5. Push to the branch:

    ```bash
    git push origin feature-branch
    ```

6. Create a new Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details

## contact

For any inquiries or feedback, please contact mossabarektout2000@gmail.com or open an issue on GitHub.

## Acknowledgments
This project was developed in collaboration with [Abdelrrahim Mabrouk](https://github.com/Abderrahimself).
