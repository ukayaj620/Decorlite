drop database decorlite;
create database decorlite;

use decorlite;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `catagories` (
  `catagoryId` varchar(30) NOT NULL,
  `catagoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`catagoryId`)
);

CREATE TABLE `items` (
  `itemId` varchar(30) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `itemPrice` int(16) NOT NULL,
  `itemStock` int(11) NOT NULL,
  `catagoryId` varchar(30) NOT NULL,
  PRIMARY KEY (`itemId`),
  FOREIGN KEY (`catagoryId`) REFERENCES `catagories` (`catagoryId`)
);

CREATE TABLE `users` (
  `userId` varchar(30) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `session` varchar(20) NOT NULL,
  PRIMARY KEY (`userId`)
);

CREATE TABLE `carts` (
  `CartId` varchar(30) NOT NULL,
  `userId` varchar(30) NOT NULL,
  PRIMARY KEY (`CartId`),
  FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
);

CREATE TABLE `history` (
  `userId` varchar(30) NOT NULL,
  `userPayment` int(16) NOT NULL,
  `timePayment` varchar(50) NOT NULL,
  `CartID` varchar(30) NOT NULL,
  FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  FOREIGN KEY (`cartId`) REFERENCES `carts` (`CartId`)
);

CREATE TABLE `Transaksi` (
	`CartID` varchar(30) NOT NULL,
	`ItemID` varchar(30) NOT NULL,
	`JumalahBarang` int(3) NOT NULL,
	FOREIGN KEY (`cartId`) REFERENCES `carts` (`cartId`),
	FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`)
);
