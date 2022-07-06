-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Vært: mysql108.unoeuro.com
-- Genereringstid: 11. 04 2022 kl. 14:45:42
-- Serverversion: 5.7.37-40-log
-- PHP-version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hybridclients_dk_db`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `display_wdr_rules`
--

CREATE TABLE `display_wdr_rules` (
  `id` int(11) NOT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  `exclusive` tinyint(1) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `apply_to` text COLLATE utf8mb4_unicode_520_ci,
  `filters` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `conditions` text COLLATE utf8mb4_unicode_520_ci,
  `product_adjustments` text COLLATE utf8mb4_unicode_520_ci,
  `cart_adjustments` text COLLATE utf8mb4_unicode_520_ci,
  `buy_x_get_x_adjustments` text COLLATE utf8mb4_unicode_520_ci,
  `buy_x_get_y_adjustments` text COLLATE utf8mb4_unicode_520_ci,
  `bulk_adjustments` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `set_adjustments` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `other_discounts` text COLLATE utf8mb4_unicode_520_ci,
  `date_from` int(11) DEFAULT NULL,
  `date_to` int(11) DEFAULT NULL,
  `usage_limits` int(11) DEFAULT NULL,
  `rule_language` text COLLATE utf8mb4_unicode_520_ci,
  `used_limits` int(11) DEFAULT NULL,
  `additional` text COLLATE utf8mb4_unicode_520_ci,
  `max_discount_sum` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `advanced_discount_message` text COLLATE utf8mb4_unicode_520_ci,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `used_coupons` text COLLATE utf8mb4_unicode_520_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Data dump for tabellen `display_wdr_rules`
--

INSERT INTO `display_wdr_rules` (`id`, `enabled`, `deleted`, `exclusive`, `title`, `priority`, `apply_to`, `filters`, `conditions`, `product_adjustments`, `cart_adjustments`, `buy_x_get_x_adjustments`, `buy_x_get_y_adjustments`, `bulk_adjustments`, `set_adjustments`, `other_discounts`, `date_from`, `date_to`, `usage_limits`, `rule_language`, `used_limits`, `additional`, `max_discount_sum`, `advanced_discount_message`, `discount_type`, `used_coupons`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(9, 1, 0, 0, 'Mobil Opslagstavle med filt 200×100 Sort', 9, NULL, '{\"1\":{\"type\":\"all_products\"},\"2\":{\"type\":\"product_sku\",\"method\":\"in_list\",\"value\":[\"PROD1174\"],\"product_variants\":[]}}', '{\"2\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"reseller\"]}},\"3\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"ean\"]}}}', '{\"cart_label\":\"\"}', '[]', '[]', '[]', '{\"operator\":\"product_cumulative\",\"ranges\":{\"1\":{\"from\":\"1\",\"to\":\"5\",\"type\":\"percentage\",\"value\":\"10\",\"label\":\"Prisgruppe 1\"},\"2\":{\"from\":\"6\",\"to\":\"10\",\"type\":\"percentage\",\"value\":\"20\",\"label\":\"Prisgruppe 2\"}},\"cart_label\":\"\"}', '{\"cart_label\":\"\"}', NULL, NULL, NULL, 0, '[]', NULL, '{\"condition_relationship\":\"and\"}', NULL, '{\"display\":\"0\",\"badge_color_picker\":\"#ffffff\",\"badge_text_color_picker\":\"#000000\",\"badge_text\":\"\"}', 'wdr_bulk_discount', '[]', 1, '2022-04-11 15:11:11', 1, '2022-04-11 16:45:24');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `display_wdr_rules`
--
ALTER TABLE `display_wdr_rules`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `display_wdr_rules`
--
ALTER TABLE `display_wdr_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7997;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
