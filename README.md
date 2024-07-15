# Book Library API

This is a simple Book Library API built with core PHP. The API allows users to perform CRUD (Create, Read, Update, Delete) operations on books and includes user authentication.

## Features

- List all books
- Retrieve a single book by ID
- Create a new book
- Update an existing book
- Delete a book
- User registration
- User login (JWT Authentication)

## Prerequisites

- PHP 7.4 or higher
- MySQL
- Composer

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/your-username/book-library-api.git
   cd book-library-api
2. **Install dependencies:**
    ```sh
    composer install
3. **Set up the database:**
 - Create a MySQL database.
 - Import the provided database.sql file to set up the books and users tables.
4. **Configure the database connection:**
Open `src/config/database.php` and update the database connection settings:

5. **Set up the server:**
    - If you are using a local server (e.g., XAMPP, MAMP), place the project directory in the server's root directory.
    - Make sure your server is configured to serve the public directory as the document root.
6. **Set up URL rewriting:**
    Ensure that your server supports URL rewriting and is configured to use the .htaccess file in the public directory.

# Usage
## Endpoints
### Book Endpoints
- GET `/books` : Retrieve a list of all books.
    ```sh 
    curl -X GET http://localhost/books
- GET `/books/{id}` : Retrieve a list of all books.
    ```sh 
    curl -X GET http://localhost/books/1
- POST `/books` : Create a new book.
    ```sh 
    curl -X POST http://localhost/books -d '{"title": "New Book", "author": "Author Name", "published_year": "2024"}' -H "Content-Type: application/json" -H "Authorization: Bearer YOUR_JWT_TOKEN"
- PUT `/books/{id}` : Update an existing book.
    ```sh 
    curl -X PUT http://localhost/books/1 -d '{"title": "Updated Title", "author": "Updated Author", "published_year": "2024"}' -H "Content-Type: application/json" -H "Authorization: Bearer YOUR_JWT_TOKEN"
- DELETE `/books/{id}` : Delete a book by ID.
    ```sh 
    curl -X DELETE http://localhost/books/1 -H "Authorization: Bearer YOUR_JWT_TOKEN"
## User Endpoints
- POST `/register` : Register a new user.
    ```sh 
    curl -X POST http://localhost/register -d '{"username": "newuser", "password": "password123"}' -H "Content-Type: application/json"
- POST `/login` : Login to get a JWT token..
    ```sh 
    curl -X POST http://localhost/login -d '{"username": "newuser", "password": "password123"}' -H "Content-Type: application/json"

# Contributing
Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

# License
This project is licensed under the MIT License.
