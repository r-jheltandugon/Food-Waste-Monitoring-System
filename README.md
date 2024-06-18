# Food Waste Monitoring System

This project is a "Food Waste Monitoring System" designed to help reduce food wastage by allowing users to donate their excess or leftover food to needy people or organizations. Additionally, the system supports the conversion of food waste into fertilizer, promoting sustainable waste management practices. The system is implemented using PHP and MySQL and runs on XAMPP.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)

## Features

- **User Module**: Allows users to register, login, and donate food. Users can select the type and quantity of food to donate, and the system matches their donation with the nearest needy people or organizations. Users can also view their donation history.
- **Administrator Module**: Designed for trusts, NGOs, and charities. Admins can view and manage donations, track requests, and oversee the food distribution process. NGOs and charities can select donations and request pickups.

## Installation

To set up the project on your local machine, follow these steps:

### Prerequisites

- XAMPP (or any other similar local server environment)

### Steps

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ambo18/Food-Waste-Monitoring-System.git
    ```

2. **Move the project files to the XAMPP directory:**

    Copy the cloned repository to the `htdocs` directory of your XAMPP installation.

3. **Start XAMPP:**

    Open the XAMPP Control Panel and start the Apache and MySQL services.

4. **Create the database:**

    - Open your browser and go to `http://localhost/phpmyadmin`.
    - Create a new database, for example, `foodwaste`.
    - Import the database schema from the `database.sql` file located in the project directory.

5. **Configure the database connection:**

    Open the project directory and locate the `connection.php` file. Update the database connection details as needed:

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodwaste";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

6. **Access the application:**

    Open your browser and go to `http://localhost/Food-Waste-Monitoring-System`.

## Usage

1. **User Module:**

    - **Register/Login**: Users can register and login to the system.
    - **Donate Food**: Select the type and quantity of food to donate. The system matches donations with the nearest needy people or organizations.
    - **View Donations**: Users can view their donation history.

2. **Administrator Module:**

    - **Manage Donations**: Admins can view and manage the list of donations received.
    - **Track Requests**: Track requests from NGOs and charities. 
    - **Select Donations**: NGOs and charities can select donations and request pickups.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

