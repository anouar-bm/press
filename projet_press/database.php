<?php

//include the connection file
include('connection.php');

//create an instance of Connection class
$connection = new Connection();

//call the createDatabase methods to create database "chap4Db"
$connection->createDatabase('prj_press');

// Create the 'types' table
$query0 = "
CREATE TABLE types (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
)";

// Create the 'Users' table with a foreign key
$query1 = "
CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(40) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_dat e TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_type INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (user_type) REFERENCES types (id) ON DELETE CASCADE
)";

// Create the 'Categories' table
$query2 = "
CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(255) NOT NULL
)";

// Create the 'post' table with a foreign key
$query3 = "
CREATE TABLE `post` (
    `post_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `post_title` VARCHAR(127) NOT NULL,
    `post_text` TEXT NOT NULL,
    `category` INT(11) NOT NULL,
    `publish` INT(2) NOT NULL DEFAULT 1,
    `cover_url` VARCHAR(255) NOT NULL DEFAULT 'default.jpg',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (`category`) REFERENCES `Categories` (`CategoryID`) 
)";
// Create the 'comment' table with foreign keys
$query4 = "
CREATE TABLE `comment` (
    `comment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `comment` VARCHAR(255) NOT NULL,
    `user_id` INT(6) UNSIGNED NOT NULL,
    `post_id` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE
)";
// Create the 'post_like' table with foreign keys
$query5 = "
CREATE TABLE `post_like` (
    `like_id` INT AUTO_INCREMENT PRIMARY KEY,
    `liked_by` INT(6) UNSIGNED NOT NULL,
    `post_id` INT NOT NULL,
    `liked_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (`liked_by`) REFERENCES `Users` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE
)";


//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('prj_press');

//call the createTable method to create table with the $query
$connection->createTable($query0);
$connection->createTable($query1);
$connection->createTable($query2);
$connection->createTable($query3);
$connection->createTable($query4);
$connection->createTable($query5);


?>
