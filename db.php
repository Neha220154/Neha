<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrishop";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql="CREATE DATABASE IF NOT EXISTS $dbname";
$con_res = $conn->query($sql);

if(!$con_res){
    echo "error creating database: ";
}
$conn->select_db($dbname);
$sql="CREATE TABLE IF NOT EXISTS users(
user_id INT(5) PRIMARY KEY AUTO_INCREMENT,Name  VARCHAR(20) NOT NULL ,
email varchar(50) NOT NULL,password varchar(20) not null,
role enum('admin','users'),
 first_login boolean default true )";
if($conn->query($sql)===FALSE){
    die("error creating table: ".$conn->error);
}
$sql="ALTER TABLE users AUTO_INCREMENT = 10";
if($conn->query($sql)===FALSE){
    die("error running the query: ".$conn->error);}

$sql="CREATE TABLE IF NOT EXISTS admin(
    name varchar(50) not null,
    email VARCHAR(50) NOT NULL,
    password varchar(50) not null,
    phone_no varchar(13) not null)";
    if($conn->query($sql)===FALSE){
        die("error creating table: ".$conn->error);
    }

    $sql="CREATE TABLE IF NOT EXISTS users(
        user_id INT(5) not null,
        email varchar(50)  not null,
        password varchar(20) not null,
        role ENUM('admin', 'seller', 'customer') NOT NULL,
        users_phno varchar(10) not null,
        FOREIGN KEY(user_id) REFERENCES users(user_id))";
        if($conn->query($sql)===FALSE){
            die("error creating table: ".$conn->error);
        }
        $sql="CREATE TABLE IF NOT EXISTS products(
            product_id INT PRIMARY KEY AUTO_INCREMENT,
            seller_id INT,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            price DECIMAL(10, 2) NOT NULL,
            stock_quantity INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(user_id) REFERENCES users(user_id))";
            if($conn->query($sql)===FALSE){
                die("error creating table: ".$conn->error);
            }
            $sql="CREATE TABLE IF NOT EXISTS orders(
            order_id INT PRIMARY KEY AUTO_INCREMENT,
            customer_id INT,
            order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            status ENUM('pending', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
            total DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES Users(user_id))";
                if (!$conn->query($sql)) {
                    $error = $conn->error;
                    echo "Error creating table: $error";
                }
           
           $sql="CREATE TABLE IF NOT EXISTS order_items(
             order_item_id INT PRIMARY KEY AUTO_INCREMENT,
             order_id INT,
             product_id INT,
             quantity INT NOT NULL,
             price DECIMAL(10, 2) NOT NULL,
             FOREIGN KEY (order_id) REFERENCES Orders(order_id),
             FOREIGN KEY (product_id) REFERENCES Products(product_id))";
    
            $sql="CREATE TABLE IF NOT EXISTS review(
                review_id INT PRIMARY KEY AUTO_INCREMENT,
                product_id INT,
                customer_id INT,
                rating INT CHECK (rating >= 1 AND rating <= 5),
                comment TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (product_id) REFERENCES Products(product_id),
                FOREIGN KEY (customer_id) REFERENCES Users(user_id))";
                if (!$conn->query($sql)) {
                    $error = $conn->error;
                    echo "Error creating table: $error";
                }
             
                 $sql="CREATE TABLE IF NOT EXISTS inventory(
                    inventory_id INT PRIMARY KEY AUTO_INCREMENT,
                     product_id INT,
                    quantity INT NOT NULL,
                    FOREIGN KEY (product_id))";
                    if (!$conn->query($sql)) {
                        $error = $conn->error;
                        echo "Error creating table: $error";
                    }

            
       /* $sql="INSERT INTO admins (Name, email, password, phone_number, role)
          VALUES ('Kadeeja shameer', 'kadeejashameer110@gmail.com', 'ks12345#', '8129030978', 'Admin')";
           if (!$conn->query($sql)) {
            $error = $conn->error;
            echo "Error running the query: $error";
        }*/
                 
?>
