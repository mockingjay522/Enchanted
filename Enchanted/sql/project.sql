-- SQL Script for Enchanted 

-- DROP the database if it exists
-- CREATE THE DATABASE
DROP DATABASE IF EXISTS enchanted;
CREATE DATABASE IF NOT EXISTS enchanted;

-- Use the database
USE enchanted;

-- Create Customer table
CREATE TABLE User
( UserID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name CHAR(50) NOT NULL,
  Password CHAR(100) NOT NULL,
  Email CHAR(50) NOT NULL,
  Address CHAR(100) NOT NULL,
  PhoneNo CHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Create Products table
CREATE TABLE Products
(  ID CHAR(5) NOT NULL PRIMARY KEY,
   Name CHAR(50),
   Description CHAR(100),
   Image CHAR(50),
   Type CHAR(50),
   Price FLOAT(4,2)
) ENGINE=InnoDB;

-- Create Cart (Associative Table)
CREATE TABLE Cart
( UserID INT UNSIGNED NOT NULL,
  ProductID CHAR(5) NOT NULL,
  Name CHAR(50),
  Amount FLOAT(6,2),
  PRIMARY KEY (UserID, ProductID),
  FOREIGN KEY (UserID) REFERENCES User(UserID),
  FOREIGN KEY (ProductID) REFERENCES Products(ID) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Create Orders table
CREATE TABLE Orders
( OrderID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UserID INT UNSIGNED NOT NULL,
  Amount FLOAT(6,2),
  Date DATE NOT NULL,
  FOREIGN KEY (UserID) REFERENCES User(UserID)
) ENGINE=InnoDB;

-- Create Order_Items (Associative Table)
CREATE TABLE Order_Items
( OrderID INT UNSIGNED NOT NULL,
  ProductID CHAR(5) NOT NULL,
  Amount FLOAT(6,2),
  Name CHAR(50),
  PRIMARY KEY (OrderID, ProductID),
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (ProductID) REFERENCES Products(ID) ON DELETE CASCADE
) ENGINE=InnoDB;

-- -- INSERT Products records
INSERT INTO Products VALUES
  ('1', 'Pearl Necklace', 'A classy touch to your outfit', 'image/1.jpg', 'Necklace', 34.99),
  ('2', 'Diamond Ring', 'A girls best friend', 'image/2.jpg', 'Ring', 54.99),
  ('3', 'Mood Ring', 'Emerald City', 'image/3.jpg', 'Ring', 24.99),
  ('4', 'Gold Pearl Ring', 'Gold and Pearls Combined', 'image/4.jpg', 'Ring', 24.99),
  ('5', 'Butterfly Pendant', 'A piece that speaks to the soul', 'image/5.jpg', 'Pendant', 14.99),
  ('6', 'Bridal Tiara', 'Every princess needs a tiara', 'image/6.jpg', 'Tiara', 104.99),
  ('7', 'Bling Bracelet', 'A little bling never hurt no one', 'image/7.jpg', 'Bracelet', 34.99);