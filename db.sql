CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    forename VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    release_date DATE NOT NULL,
    stock_quantity INT NOT NULL,
    category VARCHAR(10) NOT NULL
);

CREATE TABLE product_stock (
    stock_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    shoe_size VARCHAR(10) NOT NULL,
    stock_quantity INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE user_orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    stock_id INT,
    order_date DATE NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (stock_id) REFERENCES product_stock(stock_id)
);