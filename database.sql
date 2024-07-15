CREATE DATABASE IF NOT EXISTS book_library;
USE book_library;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_year INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES
('user1', '$2y$10$KbqzSnklTeT3WFiZZD8vhe2gCq3gVOP4O/hsmGcbQw7HxuXv4vT3e'), -- password: password123
('user2', '$2y$10$KbqzSnklTeT3WFiZZD8vhe2gCq3gVOP4O/hsmGcbQw7HxuXv4vT3e'), -- password: password123
('user3', '$2y$10$KbqzSnklTeT3WFiZZD8vhe2gCq3gVOP4O/hsmGcbQw7HxuXv4vT3e'); -- password: password123

INSERT INTO books (title, author, published_year) VALUES
('1984', 'George Orwell', 1949),
('To Kill a Mockingbird', 'Harper Lee', 1960),
('The Great Gatsby', 'F. Scott Fitzgerald', 1925),
('One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 1967),
('Moby-Dick', 'Herman Melville', 1851),
('War and Peace', 'Leo Tolstoy', 1869),
('Ulysses', 'James Joyce', 1922),
('The Odyssey', 'Homer', -800),
('Pride and Prejudice', 'Jane Austen', 1813),
('The Book Thief', 'Markus Zusak', 2005);
