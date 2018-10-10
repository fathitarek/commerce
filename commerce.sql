-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 10:34 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `email`, `password`, `telephone`, `super_name`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fathi', 'f@yahoo.com', '202cb962ac59075b964b07152d234b70', NULL, 'super fathi', '2fed3e53b257dcb94a8dc0abb613ef1c', '2018-10-01 16:25:05', '2018-10-01 16:25:05', NULL),
(3, 'fathi', 'f2@yahoo.com', '202cb962ac59075b964b07152d234b70', NULL, 'super fathi', 'e291357d1bd365c53ec39a9f7e56559b', '2018-10-01 16:31:45', '2018-10-01 16:31:45', NULL),
(4, 'fathi', 'f3@yahoo.com', '202cb962ac59075b964b07152d234b70', NULL, 'super fathi', '9fca3db6992f9660c70205ef54d184a7', '2018-10-01 16:32:49', '2018-10-01 16:32:49', NULL),
(5, 'fathi', 'f4@yahoo.com', '202cb962ac59075b964b07152d234b70', '555', 'super fathi', 'f5387f20faa76fe447e88b1f441cd2b8', '2018-10-01 16:33:37', '2018-10-01 16:33:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'category-1', NULL, '2018-09-30 15:27:37', '2018-09-30 15:27:37', NULL),
(2, 'category-2', NULL, '2018-09-30 15:38:49', '2018-09-30 15:38:49', NULL),
(3, 'category-3', NULL, '2018-09-30 16:29:23', '2018-09-30 16:29:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images_products`
--

CREATE TABLE `images_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_products`
--

INSERT INTO `images_products` (`id`, `product_id`, `image_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAe1BMVEX///8AAADk5OTo6OhgYGDy8vJOTk6NjY2YmJi2trY0NDTb29v4+PhcXFyjo6Orq6vMzMzt7e2CgoIhISELCwvX19dlZWVwcHDFxcU8PDyenp4wMDBCQkImJibAwMBISEiFhYV5eXkYGBgqKiqxsbFVVVUSEhJtbW2RkZGgOiLNAAAExElEQVR4nO3aa3OqOhiGYQGPFQ+otbXaqq11+f9/4Za8IElIADvOdpi5rw+dLkKTPApJCKvTAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaJvTuutyiLRzIjm20A7F6shkYVeXlU7Xw15928locLw1mGgFvYmzU931NL474Czw2GknhdmxUXFoIUf27lo/rkX/ats+rYwGtc73fL0KhncnXHvr0r7EPOEqzI98ZUf6zkp7n2lZ6CwrLKwGx00Suhus8s9bl3bV5AmDSXYgWVY2KPk/qlse2A1qn4g/4cRfoceXr6q1dtItYTCVA7dv3p3wqMp+Kxs+VTXoTzi7O2Hn9TJQLr9pBctBZqTf0kVCuZSK3jkTxlspTFyFebNyyucxb/Ckl0rCW1lhfn/AQjo6BC/OIi1hOrREQXXCcVb4XtGaXOZ7z4cgCSN34Z8N6xL+qJ+DTmdf/NOZcJol9EwlKXXBBGffYCQJ64aqe9UmnEu/5xKgf/Im7GcJz9VtXavylT8pYSLRfmQWG3/5EhbDxNhRmsqGN//c9qSEYWdS3ICDzsiXsBiePfNFJJ9R19+XpyUsRpzrAsSb8O12lnu+iOU+3lQswJ6WsFjjXa8/b0K1oJGvybk2Paii1WtFX56XML9O0zvIl1Bmuov66Zov3qWKkaPo5okJZSpU621fQhkn43P60zVf9LP7uMoTE8pMfUl/8yXsyyhy9Nxrshz4rO7LMxOqFalanXoSyrmzbEQt32wz7+WreWbCUzbOeBOOspFIrudpqVw9zCxrHmQl4TgWd0fxaJawM9zsZZHsSXi7OtXCbF0q76aH656OJeF2s3lJbe5/7HVqmLCTf6TuhLFarh6uv6nR9FyaL9RofKzpi/30VHNRN9Q0Yc6dUOaK+e23L/uEiW+M1dkJq0feph6TUD25L9NvTp4SS1lUwktNX+yEf3judXhMwl16VFacavW2tU+YGAPQeFbQnhWthPsG+3YNPCRhEhQBTq6/MhMaeyilnajRPPOg0fQhCUdaX/OZ0WQkXFcm/N+f8ZskXOuVqGcI+/nCSDipTPicGb/gShirExdJlEpkv9C6h4yEH61LKM8N55VQi297vjASxsPu5Oq3PQkPQZk1X5hjqei1J+HOkXBjntLuhKEjoL0f1e6E7hdZZpx2J1RzxWZc0FY4OZXwYFbVmoTJd3pIXyWrOr+NrXvXs0XYloQyV+gb2bJNbjz7qNXq0pwkZVrUljAPXdPEUajNz1v5RxQaXWiYUNXwoi8i4xf7W81Wq7v3rKFrU6+yd6WPuZJwHpnCMPrDCjXMXzJYvvW3XQ0TbtIj5vS3sPvuGW8Dc4/f+/5w53tR4Ge/ai5oH1ezhNn7G+OkefkvfS3q5/jfkNb/7wBb11tX6T1+XUJ1N1l3WKx2H83J4dfZnHGzPvI9fult+o3+XyPUHr21hJ7bH6mKbO83qPqt/e1jubGt+dU/8juMJu6afoxenT6Dpf2gFx9Xwc7YD718B2/2UBC/BcvSVtn7m7G8++nOrE/Pm7B//314ncUiF6unceTYSEjs4bznemmduLYg4oq2Us4+XTXMBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAWuQ/dmAyoBictbgAAAAASUVORK5CYII=', NULL, NULL, NULL),
(2, '1', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAe1BMVEX///8AAADk5OTo6OhgYGDy8vJOTk6NjY2YmJi2trY0NDTb29v4+PhcXFyjo6Orq6vMzMzt7e2CgoIhISELCwvX19dlZWVwcHDFxcU8PDyenp4wMDBCQkImJibAwMBISEiFhYV5eXkYGBgqKiqxsbFVVVUSEhJtbW2RkZGgOiLNAAAExElEQVR4nO3aa3OqOhiGYQGPFQ+otbXaqq11+f9/4Za8IElIADvOdpi5rw+dLkKTPApJCKvTAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaJvTuutyiLRzIjm20A7F6shkYVeXlU7Xw15928locLw1mGgFvYmzU931NL474Czw2GknhdmxUXFoIUf27lo/rkX/ats+rYwGtc73fL0KhncnXHvr0r7EPOEqzI98ZUf6zkp7n2lZ6CwrLKwGx00Suhus8s9bl3bV5AmDSXYgWVY2KPk/qlse2A1qn4g/4cRfoceXr6q1dtItYTCVA7dv3p3wqMp+Kxs+VTXoTzi7O2Hn9TJQLr9pBctBZqTf0kVCuZSK3jkTxlspTFyFebNyyucxb/Ckl0rCW1lhfn/AQjo6BC/OIi1hOrREQXXCcVb4XtGaXOZ7z4cgCSN34Z8N6xL+qJ+DTmdf/NOZcJol9EwlKXXBBGffYCQJ64aqe9UmnEu/5xKgf/Im7GcJz9VtXavylT8pYSLRfmQWG3/5EhbDxNhRmsqGN//c9qSEYWdS3ICDzsiXsBiePfNFJJ9R19+XpyUsRpzrAsSb8O12lnu+iOU+3lQswJ6WsFjjXa8/b0K1oJGvybk2Paii1WtFX56XML9O0zvIl1Bmuov66Zov3qWKkaPo5okJZSpU621fQhkn43P60zVf9LP7uMoTE8pMfUl/8yXsyyhy9Nxrshz4rO7LMxOqFalanXoSyrmzbEQt32wz7+WreWbCUzbOeBOOspFIrudpqVw9zCxrHmQl4TgWd0fxaJawM9zsZZHsSXi7OtXCbF0q76aH656OJeF2s3lJbe5/7HVqmLCTf6TuhLFarh6uv6nR9FyaL9RofKzpi/30VHNRN9Q0Yc6dUOaK+e23L/uEiW+M1dkJq0feph6TUD25L9NvTp4SS1lUwktNX+yEf3judXhMwl16VFacavW2tU+YGAPQeFbQnhWthPsG+3YNPCRhEhQBTq6/MhMaeyilnajRPPOg0fQhCUdaX/OZ0WQkXFcm/N+f8ZskXOuVqGcI+/nCSDipTPicGb/gShirExdJlEpkv9C6h4yEH61LKM8N55VQi297vjASxsPu5Oq3PQkPQZk1X5hjqei1J+HOkXBjntLuhKEjoL0f1e6E7hdZZpx2J1RzxWZc0FY4OZXwYFbVmoTJd3pIXyWrOr+NrXvXs0XYloQyV+gb2bJNbjz7qNXq0pwkZVrUljAPXdPEUajNz1v5RxQaXWiYUNXwoi8i4xf7W81Wq7v3rKFrU6+yd6WPuZJwHpnCMPrDCjXMXzJYvvW3XQ0TbtIj5vS3sPvuGW8Dc4/f+/5w53tR4Ge/ai5oH1ezhNn7G+OkefkvfS3q5/jfkNb/7wBb11tX6T1+XUJ1N1l3WKx2H83J4dfZnHGzPvI9fult+o3+XyPUHr21hJ7bH6mKbO83qPqt/e1jubGt+dU/8juMJu6afoxenT6Dpf2gFx9Xwc7YD718B2/2UBC/BcvSVtn7m7G8++nOrE/Pm7B//314ncUiF6unceTYSEjs4bznemmduLYg4oq2Us4+XTXMBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAWuQ/dmAyoBictbgAAAAASUVORK5CYII=', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_30_172419_create_categories_table', 1),
(4, '2018_10_01_165209_create_status_orders_table', 2),
(5, '2018_10_01_180225_create_buyers_table', 3),
(6, '2018_10_02_060520_create_sellers_table', 4),
(7, '2018_10_02_181606_create_purchased_orders_table', 5),
(8, '2018_10_02_182411_create_images_products_table', 5),
(9, '2018_10_03_050907_create_products_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `category_id`, `quantity`, `seller_id`, `price`, `discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'product-1', '1', 10, '1', 123, NULL, '2018-10-03 05:25:00', '2018-10-03 06:21:27', NULL),
(2, 'product-2', '2', 10, '2', 12345, NULL, '2018-10-03 05:25:00', '2018-10-03 06:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_orders`
--

CREATE TABLE `purchased_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `super_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `telephone`, `token`, `super_name`, `address`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fathi', 'f4@yahoo.com', '202cb962ac59075b964b07152d234b70', '555', '09c24353574f0adf917d0cad0ba5b5c8', 'super fathi', NULL, NULL, '2018-10-02 04:30:51', '2018-10-02 04:30:51', NULL),
(4, 'fathi', 'f1@yahoo.com', '202cb962ac59075b964b07152d234b70', '555', 'a682abfabfa87fd81f86bc161f0e1132', 'super fathi', 'cairo', 'developer', '2018-10-02 04:49:25', '2018-10-02 04:49:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_orders`
--

CREATE TABLE `status_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', '2018-10-01 14:56:36', '2018-10-01 14:57:31', NULL),
(2, 'fathi', '2018-10-01 16:14:02', '2018-10-01 16:14:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$wqyFMVe41aWE3vdFNqBdE./W83hu.Rgx3mn/C/FWj7f5BKvXOflF6', NULL, '2018-10-01 14:43:56', '2018-10-01 14:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyers_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_products`
--
ALTER TABLE `images_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_orders`
--
ALTER TABLE `purchased_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images_products`
--
ALTER TABLE `images_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchased_orders`
--
ALTER TABLE `purchased_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
