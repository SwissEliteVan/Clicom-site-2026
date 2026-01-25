-- =====================================================
-- CLICOM - Écosystème Agence Digitale
-- Schema SQL pour MariaDB/MySQL (Hostinger Compatible)
-- Version: 1.0 | Date: 2026-01-25
-- =====================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- =====================================================
-- Table: users (Admin CRM)
-- =====================================================
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL COMMENT 'bcrypt hash',
  `role` ENUM('admin', 'manager', 'user') DEFAULT 'user',
  `is_active` TINYINT(1) DEFAULT 1,
  `last_login` DATETIME DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: clients (Données Clients)
-- =====================================================
CREATE TABLE IF NOT EXISTS `clients` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(150) NOT NULL,
  `contact_name` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(30) DEFAULT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `city` VARCHAR(100) DEFAULT NULL,
  `postal_code` VARCHAR(20) DEFAULT NULL,
  `country` VARCHAR(50) DEFAULT 'CH',
  `source` ENUM('website', 'referral', 'cold_call', 'event', 'social_media', 'other') DEFAULT 'website',
  `status` ENUM('lead', 'prospect', 'active', 'inactive', 'churned') DEFAULT 'lead',
  `notes` TEXT DEFAULT NULL,
  `assigned_user_id` INT(11) UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_source` (`source`),
  FOREIGN KEY (`assigned_user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: quotes (Devis)
-- =====================================================
CREATE TABLE IF NOT EXISTS `quotes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quote_number` VARCHAR(50) NOT NULL UNIQUE COMMENT 'ex: DEVIS-2026-001',
  `client_id` INT(11) UNSIGNED NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `subtotal` DECIMAL(10,2) DEFAULT 0.00,
  `vat_rate` DECIMAL(5,2) DEFAULT 7.70 COMMENT 'TVA Suisse 7.7%',
  `vat_amount` DECIMAL(10,2) DEFAULT 0.00,
  `total_amount` DECIMAL(10,2) DEFAULT 0.00,
  `status` ENUM('draft', 'sent', 'accepted', 'rejected', 'expired') DEFAULT 'draft',
  `valid_until` DATE DEFAULT NULL,
  `notes` TEXT DEFAULT NULL,
  `created_by` INT(11) UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_quote_number` (`quote_number`),
  INDEX `idx_client` (`client_id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_created_at` (`created_at`),
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: quote_items (Lignes de devis)
-- =====================================================
CREATE TABLE IF NOT EXISTS `quote_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quote_id` INT(11) UNSIGNED NOT NULL,
  `service_name` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `quantity` DECIMAL(10,2) DEFAULT 1.00,
  `unit_price` DECIMAL(10,2) DEFAULT 0.00,
  `total_price` DECIMAL(10,2) DEFAULT 0.00,
  `sort_order` INT(5) DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `idx_quote` (`quote_id`),
  FOREIGN KEY (`quote_id`) REFERENCES `quotes`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: invoices (Factures)
-- =====================================================
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_number` VARCHAR(50) NOT NULL UNIQUE COMMENT 'ex: FACT-2026-001',
  `quote_id` INT(11) UNSIGNED DEFAULT NULL,
  `client_id` INT(11) UNSIGNED NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `subtotal` DECIMAL(10,2) DEFAULT 0.00,
  `vat_rate` DECIMAL(5,2) DEFAULT 7.70,
  `vat_amount` DECIMAL(10,2) DEFAULT 0.00,
  `total_amount` DECIMAL(10,2) DEFAULT 0.00,
  `status` ENUM('draft', 'sent', 'paid', 'overdue', 'cancelled') DEFAULT 'draft',
  `issue_date` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  `paid_date` DATE DEFAULT NULL,
  `payment_method` VARCHAR(50) DEFAULT NULL,
  `notes` TEXT DEFAULT NULL,
  `created_by` INT(11) UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_invoice_number` (`invoice_number`),
  INDEX `idx_client` (`client_id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_due_date` (`due_date`),
  FOREIGN KEY (`quote_id`) REFERENCES `quotes`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: invoice_items (Lignes de facture)
-- =====================================================
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` INT(11) UNSIGNED NOT NULL,
  `service_name` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `quantity` DECIMAL(10,2) DEFAULT 1.00,
  `unit_price` DECIMAL(10,2) DEFAULT 0.00,
  `total_price` DECIMAL(10,2) DEFAULT 0.00,
  `sort_order` INT(5) DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `idx_invoice` (`invoice_id`),
  FOREIGN KEY (`invoice_id`) REFERENCES `invoices`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: projects (Projets liés aux devis)
-- =====================================================
CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(200) NOT NULL,
  `quote_id` INT(11) UNSIGNED DEFAULT NULL,
  `client_id` INT(11) UNSIGNED NOT NULL,
  `description` TEXT DEFAULT NULL,
  `phase` ENUM('onboarding', 'production', 'delivery', 'completed', 'cancelled') DEFAULT 'onboarding',
  `start_date` DATE DEFAULT NULL,
  `end_date` DATE DEFAULT NULL,
  `budget` DECIMAL(10,2) DEFAULT 0.00,
  `status` ENUM('active', 'on_hold', 'completed', 'cancelled') DEFAULT 'active',
  `assigned_user_id` INT(11) UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_client` (`client_id`),
  INDEX `idx_phase` (`phase`),
  INDEX `idx_status` (`status`),
  FOREIGN KEY (`quote_id`) REFERENCES `quotes`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`assigned_user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: tasks (Tâches CRM)
-- =====================================================
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `priority` ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
  `status` ENUM('pending', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
  `due_date` DATE DEFAULT NULL,
  `client_id` INT(11) UNSIGNED DEFAULT NULL,
  `project_id` INT(11) UNSIGNED DEFAULT NULL,
  `assigned_user_id` INT(11) UNSIGNED DEFAULT NULL,
  `created_by` INT(11) UNSIGNED DEFAULT NULL,
  `completed_at` DATETIME DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_priority` (`priority`),
  INDEX `idx_status` (`status`),
  INDEX `idx_due_date` (`due_date`),
  INDEX `idx_assigned` (`assigned_user_id`),
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`assigned_user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: automation_rules (Règles d'automatisation)
-- =====================================================
CREATE TABLE IF NOT EXISTS `automation_rules` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rule_name` VARCHAR(100) NOT NULL,
  `rule_type` ENUM('invoice_reminder', 'quote_followup', 'project_milestone', 'custom') NOT NULL,
  `trigger_condition` VARCHAR(255) DEFAULT NULL COMMENT 'ex: days_after_due_date=10',
  `action_type` ENUM('create_task', 'send_email', 'change_status', 'notification') NOT NULL,
  `action_params` TEXT DEFAULT NULL COMMENT 'JSON params',
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_rule_type` (`rule_type`),
  INDEX `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: portal_tokens (Accès Portail Client)
-- =====================================================
CREATE TABLE IF NOT EXISTS `portal_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` INT(11) UNSIGNED NOT NULL,
  `token_hash` VARCHAR(64) NOT NULL UNIQUE COMMENT 'SHA256 hash',
  `expires_at` DATETIME DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT 1,
  `last_accessed` DATETIME DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_token` (`token_hash`),
  INDEX `idx_client` (`client_id`),
  INDEX `idx_active` (`is_active`),
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Données de test (Optionnel - Supprimer en production)
-- =====================================================

-- Compte admin par défaut
-- Mot de passe: Admin@2026 (hash bcrypt)
INSERT INTO `users` (`username`, `email`, `password_hash`, `role`, `is_active`) VALUES
('admin', 'admin@clicom.ch', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 1);

-- Règle d'automatisation par défaut (Relance facture impayée J+10)
INSERT INTO `automation_rules` (`rule_name`, `rule_type`, `trigger_condition`, `action_type`, `action_params`, `is_active`) VALUES
('Relance facture impayée J+10', 'invoice_reminder', 'days_after_due_date=10', 'create_task', '{"task_title":"Relancer le client pour facture impayée","priority":"high"}', 1);

COMMIT;

-- =====================================================
-- Fin du Schema
-- =====================================================
