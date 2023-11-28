
DROP TABLE IF EXISTS users;
CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Age int,
    Password varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
INSERT INTO users (Username,Email,Age,Password) VALUES('admin', 'admin@gmail.com', 23, '123');

DROP TABLE IF EXISTS product;
CREATE TABLE product (
    Product_id INT PRIMARY KEY AUTO_INCREMENT,
    Product_name VARCHAR(200),
    category_id INT,
    category_name VARCHAR(200),
    price DECIMAL(10, 2),
    quantity INT,
    description TEXT,
    manufacturer_id INT,
    manufacturer_name VARCHAR(200),
    date_added DATE DEFAULT CURRENT_TIMESTAMP,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
