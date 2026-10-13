-- ========================================================
-- ExchangeHub Database Schema (MySQL 8+ / MariaDB)
-- Production schema for Barter & Multi-Item Exchange Marketplace
-- ========================================================

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `admin_audit_logs`;
DROP TABLE IF EXISTS `site_settings`;
DROP TABLE IF EXISTS `reports`;
DROP TABLE IF EXISTS `favorites`;
DROP TABLE IF EXISTS `notifications`;
DROP TABLE IF EXISTS `messages`;
DROP TABLE IF EXISTS `conversations`;
DROP TABLE IF EXISTS `offer_history`;
DROP TABLE IF EXISTS `offer_items`;
DROP TABLE IF EXISTS `exchange_offers`;
DROP TABLE IF EXISTS `listing_images`;
DROP TABLE IF EXISTS `listings`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;

-- 1. Users Table
CREATE TABLE `users` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(120) NOT NULL,
  `email` VARCHAR(191) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(30) NULL,
  `city` VARCHAR(100) NOT NULL DEFAULT 'Delhi',
  `locality` VARCHAR(150) NULL,
  `avatar` VARCHAR(255) NULL DEFAULT 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
  `is_verified` TINYINT(1) NOT NULL DEFAULT 1,
  `rating` DECIMAL(3, 2) NOT NULL DEFAULT 4.80,
  `exchange_count` INT UNSIGNED NOT NULL DEFAULT 0,
  `role` ENUM('user', 'admin', 'moderator') NOT NULL DEFAULT 'user',
  `status` ENUM('active', 'suspended', 'pending') NOT NULL DEFAULT 'active',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_users_email` (`email`),
  INDEX `idx_users_city` (`city`),
  INDEX `idx_users_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Categories Table
CREATE TABLE `categories` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(120) NOT NULL UNIQUE,
  `icon` VARCHAR(60) NOT NULL DEFAULT 'package',
  `description` VARCHAR(255) NULL,
  `sort_order` INT NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Listings Table
CREATE TABLE `listings` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT NOT NULL,
  `brand` VARCHAR(100) NULL,
  `model` VARCHAR(100) NULL,
  `condition_state` ENUM('brand_new', 'like_new', 'good', 'fair', 'needs_repair') NOT NULL DEFAULT 'good',
  `estimated_value` DECIMAL(12, 2) NOT NULL,
  `currency` VARCHAR(10) NOT NULL DEFAULT 'INR',
  `city` VARCHAR(100) NOT NULL DEFAULT 'Delhi',
  `locality` VARCHAR(150) NULL,
  `wants_exchange_categories` VARCHAR(255) NOT NULL COMMENT 'JSON or comma-separated list of wanted categories',
  `wants_description` VARCHAR(255) NULL,
  `exchange_type` ENUM('direct', 'cash_adjustment', 'negotiable') NOT NULL DEFAULT 'negotiable',
  `status` ENUM('active', 'pending', 'reserved', 'completed', 'paused', 'rejected') NOT NULL DEFAULT 'active',
  `views_count` INT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT,
  INDEX `idx_listings_user` (`user_id`),
  INDEX `idx_listings_category` (`category_id`),
  INDEX `idx_listings_status` (`status`),
  INDEX `idx_listings_city` (`city`),
  INDEX `idx_listings_val` (`estimated_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Listing Images Table
CREATE TABLE `listing_images` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `listing_id` INT UNSIGNED NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  INDEX `idx_listing_images_listing` (`listing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Exchange Offers (Parent Table for Multi-Item Exchanges)
CREATE TABLE `exchange_offers` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `offer_code` VARCHAR(30) NOT NULL UNIQUE,
  `sender_id` INT UNSIGNED NOT NULL,
  `receiver_id` INT UNSIGNED NOT NULL,
  `cash_amount` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
  `cash_payer` ENUM('sender', 'receiver', 'none') NOT NULL DEFAULT 'none',
  `message` TEXT NULL,
  `status` ENUM('pending', 'countered', 'accepted', 'rejected', 'withdrawn', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
  `parent_offer_id` INT UNSIGNED NULL COMMENT 'Self-reference for counter-offers',
  `version` INT UNSIGNED NOT NULL DEFAULT 1,
  `sender_completed` TINYINT(1) NOT NULL DEFAULT 0,
  `receiver_completed` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`parent_offer_id`) REFERENCES `exchange_offers` (`id`) ON DELETE SET NULL,
  INDEX `idx_offers_sender` (`sender_id`),
  INDEX `idx_offers_receiver` (`receiver_id`),
  INDEX `idx_offers_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Offer Items (Multi-Item Relational Children)
CREATE TABLE `offer_items` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `offer_id` INT UNSIGNED NOT NULL,
  `listing_id` INT UNSIGNED NOT NULL,
  `owner_id` INT UNSIGNED NOT NULL,
  `side` ENUM('offered', 'requested') NOT NULL,
  `estimated_value` DECIMAL(12, 2) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`offer_id`) REFERENCES `exchange_offers` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  INDEX `idx_offer_items_offer` (`offer_id`),
  INDEX `idx_offer_items_listing` (`listing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Offer History & Negotiation Audit Trail
CREATE TABLE `offer_history` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `offer_id` INT UNSIGNED NOT NULL,
  `actor_id` INT UNSIGNED NOT NULL,
  `action` ENUM('created', 'countered', 'accepted', 'rejected', 'withdrawn', 'completed', 'status_change') NOT NULL,
  `note` TEXT NULL,
  `previous_status` VARCHAR(50) NULL,
  `new_status` VARCHAR(50) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`offer_id`) REFERENCES `exchange_offers` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`actor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Conversations Table
CREATE TABLE `conversations` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `listing_id` INT UNSIGNED NULL,
  `offer_id` INT UNSIGNED NULL,
  `user_one_id` INT UNSIGNED NOT NULL,
  `user_two_id` INT UNSIGNED NOT NULL,
  `last_message_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`offer_id`) REFERENCES `exchange_offers` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`user_one_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_two_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  INDEX `idx_conv_users` (`user_one_id`, `user_two_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Messages Table
CREATE TABLE `messages` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `conversation_id` INT UNSIGNED NOT NULL,
  `sender_id` INT UNSIGNED NOT NULL,
  `message_text` TEXT NOT NULL,
  `attachment_url` VARCHAR(255) NULL,
  `is_offer_card` TINYINT(1) NOT NULL DEFAULT 0,
  `offer_id` INT UNSIGNED NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`offer_id`) REFERENCES `exchange_offers` (`id`) ON DELETE SET NULL,
  INDEX `idx_msg_conv` (`conversation_id`),
  INDEX `idx_msg_sender` (`sender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Notifications Table
CREATE TABLE `notifications` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT UNSIGNED NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `message` TEXT NOT NULL,
  `link` VARCHAR(255) NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  INDEX `idx_notif_user` (`user_id`, `is_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Favorites Table
CREATE TABLE `favorites` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT UNSIGNED NOT NULL,
  `listing_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `uk_user_listing` (`user_id`, `listing_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Reports Table
CREATE TABLE `reports` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `reporter_id` INT UNSIGNED NOT NULL,
  `reported_user_id` INT UNSIGNED NULL,
  `listing_id` INT UNSIGNED NULL,
  `reason` VARCHAR(100) NOT NULL,
  `details` TEXT NOT NULL,
  `status` ENUM('pending', 'investigating', 'resolved', 'dismissed') NOT NULL DEFAULT 'pending',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`reported_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Site Settings Table
CREATE TABLE `site_settings` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) NOT NULL UNIQUE,
  `setting_value` TEXT NOT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Admin Audit Logs
CREATE TABLE `admin_audit_logs` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `admin_id` INT UNSIGNED NOT NULL,
  `action` VARCHAR(100) NOT NULL,
  `target_type` VARCHAR(50) NOT NULL,
  `target_id` INT UNSIGNED NULL,
  `details` TEXT NULL,
  `ip_address` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- Seed Default Categories
INSERT INTO `categories` (`name`, `slug`, `icon`, `description`, `sort_order`) VALUES
('Mobiles & Tablets', 'mobiles-tablets', 'smartphone', 'Smartphones, iPhones, iPads, Android tablets and accessories', 1),
('Bikes & Scooters', 'bikes-scooters', 'bike', 'Motorcycles, sports bikes, scooters, and electric bikes', 2),
('Laptops & Computers', 'laptops-computers', 'laptop', 'Gaming laptops, MacBooks, PC builds, and monitors', 3),
('TV & Home Appliances', 'tv-home-appliances', 'tv', 'Smart TVs, air conditioners, refrigerators, and washers', 4),
('Furniture', 'furniture', 'sofa', 'Sofas, study tables, beds, recliners, and office chairs', 5),
('Gaming', 'gaming', 'gamepad-2', 'PS5, Xbox, Nintendo Switch, and gaming gear', 6),
('Fashion & Lifestyle', 'fashion-lifestyle', 'shirt', 'Sneakers, luxury watches, leather jackets, and apparel', 7),
('Sports & Fitness', 'sports-fitness', 'dumbbell', 'Treadmills, cycles, gym equipment, and athletic gear', 8);

-- Seed Initial Administrator
-- Note: password is 'Admin@123456'
INSERT INTO `users` (`name`, `email`, `password_hash`, `phone`, `city`, `locality`, `is_verified`, `role`, `status`) VALUES
('ExchangeHub Admin', 'admin@exchangehub.local', '$2y$12$Z0.U7i7oX0t1VzC7xPqBqeB0vE1lH0YlV7YyG1T6zC1K6u7bO8XfO', '+91 9876543210', 'Delhi', 'Connaught Place', 1, 'admin', 'active');
