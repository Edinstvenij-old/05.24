---------------------- 1. Видалення однієї з таблиць

-- Видалення таблиці parks
DROP TABLE parks;

---------------------- 2. Модифікація поля таблиці

-- Зміна типу поля start у таблиці orders з TEXT на DATE
ALTER TABLE orders
    MODIFY start DATE NOT NULL;

-- Або зміна імені поля з start на start_date
ALTER TABLE orders
    CHANGE start start_date DATE NOT NULL;

---------------------- 3. Заповнення кожної таблиці хоча б по 3-5 записів

-- Заповнення таблиці parks
INSERT INTO parks (id, address)
VALUES (1, 'Pushkinskaya str. 24'),
            (2, 'Bolshaya Arnautskaya str. 56'),
            (3, 'Kanatna str. 7');

-- Заповнення таблиці cars
INSERT INTO cars (id, park_id, model, price)
VALUES (1, 1, 'Toyota Camry', 25000.00),
            (2, 1, 'Honda Accord', 22000.00),
            (3, 2, 'Ford Focus', 18000.00);
            (4, 2, 'Mitsubishi Pajero', 35000.00);

-- Заповнення таблиці drivers
INSERT INTO drivers (id, car_id, name, phone)
VALUES (1, 1, 'VozniukSerhii', '123-456-7890'),
            (2, 2, 'Oleg Kirbaba', '091-765-4321'),
            (3, 3, 'Eugene Alieksieiev', '555-555-5555');

-- Заповнення таблиці customers
INSERT INTO customers (id, name, phone)
VALUES (1, 'Vitalii Rosinskyi', '321-654-9870'),
            (2, 'Vladyslav Shypylo', '654-321-0987'),
            (3, 'Serhii Revva', '789-123-4567');

-- Заповнення таблиці orders
INSERT INTO orders (id, driver_id, customer_id, start_date, finish, total)
VALUES (1, 1, 1, '2024-05-01', '2024-05-01 12:00', 100.00),
            (2, 2, 2, '2024-05-02', '2024-05-02 14:00', 120.00),
            (3, 3, 3, '2024-05-03', '2024-05-03 16:00', 90.00);

----------------------4. Модифікації будь-якого запису

-- Зміна серійного номера автопарку для машини з id 1
UPDATE cars
SET park_id = 3
WHERE id = 1;

---------------------- 5. Видалення запису з таблиці

-- Видалення запису з таблиці customers де id = 3
DELETE
FROM customers
WHERE id = 3;

---------------------- 6. Пару різних запитів до бази даних

-- Вибрати всі машини з ціною більше 20000
SELECT * FROM cars
WHERE price > 20000;

-- Вибрати всі замовлення, де загальна сума більше 100
SELECT * FROM orders
WHERE total > 100;

---------------------- 7. Приклади Join запитів

-- Вибрати замовлення з інформацією про водіїв
SELECT orders.id, drivers.name, orders.start_date, orders.finish, orders.total
FROM orders
         JOIN drivers ON orders.driver_id = drivers.id;

-- Вибрати машини з інформацією про парки
SELECT cars.id, cars.model, cars.price, parks.address
FROM cars
         JOIN parks ON cars.park_id = parks.id;

---------------------- 8. Додати/змінити колонку за допомогою команди ALTER TABLE

-- Додати колонку email до таблиці customers
ALTER TABLE customers
    ADD email VARCHAR(150);

-- Змінити тип колонки phone у таблиці drivers на VARCHAR(20)
ALTER TABLE drivers
    MODIFY phone VARCHAR (20);

---------------------- 9. Креативні запити

-- Вибрати всі машини разом з відповідними водіями та парками
SELECT cars.model, cars.price, drivers.name AS driver_name, parks.address AS park_address
FROM cars
         JOIN drivers ON cars.id = drivers.car_id
         JOIN parks ON cars.park_id = parks.id;

-- Вибрати всіх клієнтів разом з їхніми замовленнями та водіями
SELECT customers.name AS customer_name, orders.start_date, orders.finish, orders.total, drivers.name AS driver_name
FROM customers
         JOIN orders ON customers.id = orders.customer_id
         JOIN drivers ON orders.driver_id = drivers.id;
