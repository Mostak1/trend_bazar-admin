-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 08:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `trend_bazar`
--
INSERT INTO
    `categories` (`id`, `name`)
VALUES
    (1, 'Smartphones'),
    (2, 'Laptops'),
    (3, 'Perfume'),
    (4, 'Skincare'),
    (5, 'Groceries'),
    (6, 'Home-decoration'),
    (7, 'Furniture'),
    (8, 'Tops'),
    (9, 'Womens-dresses'),
    (10, 'Womens-shoes'),
    (11, 'Mens-shirts'),
    (12, 'Mens-shoes'),
    (13, 'Mens-watches'),
    (14, 'Womens-watches'),
    (15, 'Womens-bags'),
    (16, 'Womens-jewellery'),
    (17, 'Sunglasses'),
    (18, 'Automotive'),
    (19, 'Motorcycle'),
    (20, 'Lighting');
    COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;