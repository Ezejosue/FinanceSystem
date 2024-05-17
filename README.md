# Finance Control API

Welcome to the Finance Control API, a powerful tool for managing your financial records with ease. This API allows you to track income and expenses, generate balance reports, and visualize your financial health.

## Features

- User authentication
- Record income and expenses
- View detailed financial entries
- Generate balance reports
- Visualize financial data with charts
- Comprehensive API documentation with Swagger

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Routes](#routes)
- [Contributing](#contributing)
- [License](#license)

## Installation

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL
- Laravel

### Steps

1. **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/finance-control-api.git
    cd finance-control-api
    ```

2. **Install dependencies:**
    ```bash
    composer install
    ```

3. **Copy the environment file and configure it:**
    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database and other configurations.

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run the database migrations:**
    ```bash
    php artisan migrate
    ```

6. **Install the CORS package:**
    ```bash
    composer require fruitcake/laravel-cors
    php artisan vendor:publish --provider="Fruitcake\Cors\CorsServiceProvider"
    ```

7. **Configure CORS:**
    Edit the `config/cors.php` file to allow appropriate origins and methods.

8. **Run the application:**
    ```bash
    php artisan serve
    ```

## Configuration

### Swagger API Documentation

1. **Install L5-Swagger:**
    ```bash
    composer require darkaonline/l5-swagger
    ```

2. **Publish Swagger configuration:**
    ```bash
    php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
    ```

3. **Generate Swagger documentation:**
    ```bash
    php artisan l5-swagger:generate
    ```

### Access Swagger UI

Navigate to `/api/documentation` in your browser to view the interactive API documentation.

## Usage

### API Endpoints

Here are some of the key API endpoints:

- **User Login:** `POST /api/login`
- **Register Income:** `POST /api/income`
- **Register Expense:** `POST /api/expense`
- **Get Balance by User ID:** `GET /api/balance/{userId}`

### Example Request

#### Register Income

```bash
curl -X POST "http://localhost:8000/api/income" \
-H "Content-Type: application/json" \
-d '{
  "type": "Salary",
  "amount": 500,
  "date": "2024-05-01",
  "invoice": "/path/to/invoice.jpg",
  "user_id": 1
}'
```

## API Documentation

The API documentation is generated using Swagger. You can access the documentation by navigating to:

```
http://localhost:8000/api/documentation
```

## Routes

### Income Routes

- `POST /api/income` - Register a new income
- `GET /api/income/{userId}` - Get income by user ID

### Expense Routes

- `POST /api/expense` - Register a new expense
- `GET /api/expense/{userId}` - Get expense by user ID

### Balance Routes

- `GET /api/balance/{userId}` - Get balance by user ID

### Auth Routes

- `POST /api/login` - User login
- `POST /api/register` - User registration

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature/your-feature`).
6. Open a pull request.

## License

This project is licensed under the CCO License - see the [LICENSE](LICENSE) file for details.
