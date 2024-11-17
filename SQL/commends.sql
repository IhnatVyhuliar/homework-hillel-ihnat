START TRANSACTION;
DROP TABLE IF EXISTS orders;

CREATE TABLE IF NOT EXISTS orders(
    id BIGINT AUTO_INCREMENT PRIMARY KEY, 
    driver_id BIGINT,
    customer_id BIGINT,
    start MEDIUMTEXT NOT NULL,
    finish MEDIUMTEXT NOT NULL,
    total float(8, 2) UNSIGNED NOT NULL,
    
    FOREIGN KEY(driver_id) REFERENCES drivers(id) ON Delete SET NULL,
    FOREIGN KEY(customer_id) REFERENCES customers(id) ON Delete SET NULL
);

ALTER TABLE orders 
MODIFY COLUMN start TEXT NOT NULL;

ALTER TABLE orders
ADD COLUMN created_at datetime NOT NULL Default CURRENT_TIMESTAMP;

ALTER TABLE orders
CHANGE total total_sum float(8, 2) UNSIGNED NOT NULL;

INSERT INTO `parks` (address_park) values ("Lodz Kilinksiego 20, 20-203");
INSERT INTO `parks` (address_park) values ("Lodz Moniuszki 30, 21-203");
INSERT INTO `parks` (address_park) values ("Kyiv Schevchenka 70, 40-505");
INSERT INTO `parks` (address_park) values ("Lviv Lysenka 34, 89-505");
INSERT INTO `parks` (address_park) values ("Kyiv Lesia 12, 09-290");

SET @park_id = LAST_INSERT_ID();

INSERT INTO `cars` (park_id, model, price) 
VALUES (@park_id, "Toyota Camry", 23.000);
SET @car1_id = LAST_INSERT_ID();

INSERT INTO `cars` (park_id, model, price) 
VALUES (@park_id, "Toyota Rav-4", 70.000);
SET @car2_id = LAST_INSERT_ID();

INSERT INTO `cars` (park_id, model, price) 
VALUES (@park_id, "Honda Civic", 20.000);
SET @car3_id = LAST_INSERT_ID();

INSERT INTO `cars` (park_id, model, price) 
VALUES (@park_id, "Bmw m5 f90", 100.000);
SET @car4_id = LAST_INSERT_ID();

INSERT INTO `drivers` (car_id, name, phone)
values(@car1_id, "Volodymyr Vasilenko", "+380123123123");
SET @driver1_id = LAST_INSERT_ID();
INSERT INTO `drivers` (car_id, name, phone)
values(@car2_id, "Anatoliy Vinnichenko", "+3803120900");

INSERT INTO `drivers` (car_id, name, phone)
values(@car3_id, "Anton Lysenko", "+380231231231");
SET @driver3_id = LAST_INSERT_ID();

INSERT INTO `drivers` (car_id, name, phone)
values(@car4_id, "Vitalii Chernovy", "+3802093098");

INSERT INTO `customers` (name, phone)
values("Andryi Helo", "+38023123102");
SET @customer1_id = LAST_INSERT_ID();

INSERT INTO `customers` (name, phone)
values("Vanya Grydin", "+380192880093");

INSERT INTO `customers` (name, phone)
values("Aleksii Fabian", "+3802334876");
SET @customer3_id = LAST_INSERT_ID();

INSERT INTO `customers` (name, phone)
values("Mykola Lysovy", "+3803210897");


INSERT INTO `orders` (driver_id, customer_id, start, finish, total_sum)
values(@driver1_id, @customer1_id, "Hjdjjdjdj", "dwddedee", 200.20);

INSERT INTO `orders` (driver_id, customer_id, start, finish, total_sum)
values(@driver1_id, @customer1_id, "Lpkjijiojde", "Djhyhde", 340.20);

INSERT INTO `orders` (driver_id, customer_id, start, finish, total_sum)
values(@driver3_id, @customer3_id, "fhdslhsfjhsal", "ufjfkjdajkjfs", 50.00);

INSERT INTO `orders` (driver_id, customer_id, start, finish, total_sum)
values(@driver3_id, @customer3_id, "ddjasdjl", "wewqwes", 100.00);

Update `orders` set `start`="shdlahdjskdhas" where `id` = 1;
Update `orders` set `finish`="dja" where `id` = 2;
Update `orders` set `finish`="djdda", `total_sum`=500.20 where `id` = 2;

SELECT P.id
FROM parks P
LEFT JOIN cars C ON C.park_id = P.id
WHERE C.park_id IS NULL
LIMIT 1
into @p_id;

DELETE FROM parks
WHERE id = @p_id;

SELECT Count(*) as orders_count
from orders
where 1;

Select start, finish, Max(total_sum) as max_amount
from orders;

Select Round(Avg(total_sum), 2) as average_total_sum
from orders;


SELECT O.id, O.start, 
    O.finish, 
    O.total_sum, C.name as customer_name, 
    C.phone, D.name as driver_name,
    Cr.model
from orders O
LEFT JOIN customers C
On O.customer_id = C.id
LEFT JOIN drivers D
On O.driver_id = D.id
LEFT JOIN cars Cr
On D.car_id = Cr.id;

/* Customers didn't order  */
SELECT C.id, C.name, C.phone
from orders O
Right JOIN customers C
On O.customer_id = C.id
where O.customer_id is NULL
Group by C.id;

Select P.id as park_id, P.address_park, Cr.model, Cr.price
from cars Cr
Left JOIN parks P
On Cr.park_id = P.id
Group by Cr.id
ORDER BY price DESC;

Select D.id as drvier_id, Count(O.id) as number_of_orders, Sum(O.total_sum) as total_sum, D.name
from orders O
Left JOIN drivers D
On O.driver_id = D.id
Group by O.driver_id;

/* Used parks */
Select P.id, P.address_park
from parks P
Left JOIN cars C
ON C.park_id = P.id
Where C.park_id is NOT NULL
Group by P.id;

/* Empty parks */
Select P.id, P.address_park
from parks P
Left JOIN cars C
ON C.park_id = P.id
Where C.park_id is NULL
Order by P.address_park
Limit 3;

Select P.id, Count(C.id) as count_cars, P.address_park
from parks P
Left join cars C
On C.park_id = P.id
Group by P.id
Having count_cars > 0;

COMMIT;