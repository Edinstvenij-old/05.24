-- Створення таблиці parks
CREATE TABLE parks
(
    id INT PRIMARY KEY,
    address VARCHAR(255) NOT NULL
);

-- Створення таблиці cars
CREATE TABLE cars
(
    id INT PRIMARY KEY,
    park_id INT NOT NULL,
    model VARCHAR(150) NOT NULL,
    price FLOAT NOT NULL,
    FOREIGN KEY (park_id) REFERENCES parks (id)
);

-- Створення таблиці drivers
CREATE TABLE drivers
(
    id INT PRIMARY KEY,
    car_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(50),
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

-- Створення таблиці customers
CREATE TABLE customers
(
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(50)
);

-- Створення таблиці orders
CREATE TABLE orders
(
    id INT PRIMARY KEY,
    driver_id INT NOT NULL,
    customer_id INT NOT NULL,
    start TEXT NOT NULL,
    finish TEXT NOT NULL,
    total FLOAT NOT NULL,
    FOREIGN KEY (driver_id) REFERENCES drivers (id),
    FOREIGN KEY (customer_id) REFERENCES customers (id)
);
