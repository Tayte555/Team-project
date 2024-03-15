/* DATABASE CREATION */

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    forename VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    is_admin INT NOT NULL DEFAULT 0 
);

CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    release_date DATE NOT NULL,
    stock_quantity INT NOT NULL,
    category VARCHAR(255) NOT NULL,
    product_img VARCHAR(255) NOT NULL
);

-- table to be implemented in later variations where shoes sizes etc. are used

-- CREATE TABLE product_stock (
--     stock_id INT PRIMARY KEY AUTO_INCREMENT,
--     product_id INT,
--     shoe_size VARCHAR(10) NOT NULL,
--     stock_quantity INT NOT NULL,
--     FOREIGN KEY (product_id) REFERENCES products(product_id)
-- );

CREATE TABLE user_orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    -- stock_id INT,
    order_date DATE NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
    -- FOREIGN KEY (stock_id) REFERENCES product_stock(stock_id)
);

CREATE TABLE contactform (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_addresses (
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address_line_1 VARCHAR(255) NOT NULL,
    address_line_2 VARCHAR(255),
    city VARCHAR(255) NOT NULL,
    country_region VARCHAR(255) NOT NULL,
    province VARCHAR(255),
    post_code VARCHAR(20) NOT NULL,
    is_default BOOLEAN NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

/* INSERT BASE DATA INTO DATABASE */

INSERT INTO products (product_name, brand, price, release_date, stock_quantity, category, product_img) VALUES
('Wales Bonner x Adidas Samba Pony Black', 'Adidas', 185.00, '2023-11-08', 10, 'Mens', './images/sneakersmol2.png'),
('Jordan 4 Retro Black Cat', 'Air Jordan', 1150.00, '2020-11-22', 10, 'Mens', './images/blackcatsneaker 1.png'),
('Air Force 1 Low White', 'Nike', 95.00, '2008-02-16', 10, 'Mens', './images/af1.png');

/* Default admin account details
Email: admin@admin.com
Password: Adminuser1
*/
INSERT INTO users (forename, surname, email, pass, is_admin) VALUES 
('Default', 'User', 'default@user.com', 'Defaultuser1', 0),
('Admin', 'User', 'admin@admin.com', 'Adminuser1', 1);
