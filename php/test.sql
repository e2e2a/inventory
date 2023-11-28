
DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(200),
    email varchar(200),
    age int,
    password varchar(200),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
INSERT INTO users (username,email,age,password) VALUES('admin', 'admin@gmail.com', 23, '123');

DROP TABLE IF EXISTS product;
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(200),
    /* category_id INT, */
    price DECIMAL(10, 2),
    quantity INT,
    description TEXT,
    /* manufacturer_id INT, */
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders(
    id int PRIMARY KEY AUTO_INCREMENT,
    customer_id int,
    supplier_id int,
    shipping_address varchar(255),
    total_amount DECIMAL(10, 2),
    order_status varchar(255),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf32;

DROP TABLE IF EXISTS order_details;
CREATE TABLE IF NOT EXISTS order_details(
    id int PRIMARY KEY AUTO_INCREMENT,
    order_id int not null,
    product_id int not null,
    quantity int,
    total_amount decimal(10, 2), 
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf32;

DROP TABLE IF EXISTS suppliers;
CREATE TABLE IF NOT EXISTS suppliers(
    id int PRIMARY KEY AUTO_INCREMENT,
    supplier_name varchar(255),
    contact_name varchar(255),
    contact_title varchar(255),
    address varchar(255),
    street varchar(255),
    city varchar(255),
    state varchar(255),
    postal_code varchar(255),
    country varchar(255),
    phone varchar(255),
    email varchar(255),
    website varchar(255),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf32;

DROP TABLE IF EXISTS customers;
CREATE TABLE IF NOT EXISTS customers(
    id int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    phone varchar(255),
    address varchar(255),
    street varchar(255),
    city varchar(255),
    state varchar(255),
    postal_code varchar(255),
    country varchar(255),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf32;