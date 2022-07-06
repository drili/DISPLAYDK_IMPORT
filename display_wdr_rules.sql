-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Vært: mysql108.unoeuro.com
-- Genereringstid: 11. 04 2022 kl. 07:30:56
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
(5, 1, 0, 1, 'Test', 4, NULL, '{\"1\":{\"type\":\"products\",\"method\":\"in_list\",\"value\":[\"2947\",\"2947\"],\"product_variants\":[],\"product_variants_for_sale_badge\":[]}}', '[]', '{\"cart_label\":\"\"}', '[]', '[]', '[]', '{\"operator\":\"product_cumulative\",\"ranges\":{\"1\":{\"from\":\"1\",\"to\":\"2\",\"type\":\"percentage\",\"value\":\"5\",\"label\":\"1-2\"},\"2\":{\"from\":\"3\",\"to\":\"5\",\"type\":\"percentage\",\"value\":\"8\",\"label\":\"3-5\"},\"3\":{\"from\":\"6\",\"to\":\"10\",\"type\":\"percentage\",\"value\":\"10\",\"label\":\"6-10\"},\"4\":{\"from\":\"11\",\"to\":\"\",\"type\":\"percentage\",\"value\":\"12.4513\",\"label\":\"11+\"}},\"cart_label\":\"\"}', '{\"cart_label\":\"\"}', NULL, NULL, NULL, 0, '[]', NULL, '{\"condition_relationship\":\"and\"}', NULL, '[]', 'wdr_bulk_discount', '[]', 1, '2022-04-07 09:29:32', 1, '2022-04-08 09:56:03');

INSERT INTO `display_wdr_rules` (
`id`, --- 1
`enabled`, --- 2
`deleted`, --- 3
`exclusive`, --- 4
`title`, --- 5
`priority`, --- 6
`apply_to`, --- 7
`filters`, --- 8
`conditions`, --- 9
`product_adjustments`, --- 10 
`cart_adjustments`, --- 11
`buy_x_get_x_adjustments`, --- 12 
`buy_x_get_y_adjustments`, --- 13
`bulk_adjustments`, --- 14
`set_adjustments`, --- 15
`other_discounts`, --- 16
`date_from`, --- 17
`date_to`, --- 18
`usage_limits`, --- 19
`rule_language`, --- 20
`used_limits`, --- 21
`additional`, --- 22
`max_discount_sum`, --- 23
`advanced_discount_message`, --- 24 
`discount_type`, --- 25
`used_coupons`, --- 26
`created_by`, --- 27
`created_on`, --- 28
`modified_by`, --- 29
`modified_on`) --- 30
VALUES
(5, --- 1
1, --- 2
0, --- 3
1, --- 4
'Test', --- 5
4, --- 6
NULL, --- 7
'{\"1\":{\"type\":\"products\",\"method\":\"in_list\",\"value\":[\"2947\",\"2947\"],\"product_variants\":[],\"product_variants_for_sale_badge\":[]}}', --- 8
'[]', --- 9
'{\"cart_label\":\"\"}', --- 10
'[]', --- 11
'[]', --- 12
'[]', --- 13
'{\"operator\":\"product_cumulative\",\"ranges\":{\"1\":{\"from\":\"1\",\"to\":\"2\",\"type\":\"percentage\",\"value\":\"5\",\"label\":\"1-2\"},\"2\":{\"from\":\"3\",\"to\":\"5\",\"type\":\"percentage\",\"value\":\"8\",\"label\":\"3-5\"},\"3\":{\"from\":\"6\",\"to\":\"10\",\"type\":\"percentage\",\"value\":\"10\",\"label\":\"6-10\"},\"4\":{\"from\":\"11\",\"to\":\"\",\"type\":\"percentage\",\"value\":\"12.4513\",\"label\":\"11+\"}},\"cart_label\":\"\"}', --- 14
'{\"cart_label\":\"\"}', --- 15
NULL, --- 16
NULL, --- 17
NULL, --- 18
0, --- 19
'[]', --- 20
NULL, --- 21
'{\"condition_relationship\":\"and\"}', --- 22
NULL, --- 23
'[]', --- 24
'wdr_bulk_discount', --- 25
'[]', --- 26
1, --- 27
'2022-04-07 09:29:32', --- 28
1, --- 29
'2022-04-08 09:56:03'); --- 30

INSERT INTO `display_wdr_rules` (
`enabled`, 
`deleted`, 
`exclusive`, 
`title`, 
`priority`, 
`apply_to`, 
`filters`, 
`conditions`, 
`product_adjustments`, 
`cart_adjustments`,
`buy_x_get_x_adjustments`,
`buy_x_get_y_adjustments`,
`bulk_adjustments`, 
`set_adjustments`, 
`other_discounts`, 
`date_from`, 
`date_to`, 
`usage_limits`, 
`rule_language`, 
`used_limits`, 
`additional`, 
`max_discount_sum`, 
`advanced_discount_message`, 
`discount_type`, 
`used_coupons`, 
`created_by`, 
`created_on`, 
`modified_by`, 
`modified_on`) 
VALUES
(1, 
0, 
1, 
'Test NEW', 
4, 
NULL, 
'{\"1\":{\"type\":\"products\",\"method\":\"in_list\",\"value\":[\"2947\",\"2947\"],\"product_variants\":[],\"product_variants_for_sale_badge\":[]}}', 
'[]', 
'{\"cart_label\":\"\"}', 
'[]', 
'[]', 
'[]', 
'{\"operator\":\"product_cumulative\",\
"ranges\":
{\"1\":{\"from\":\"1\",\"to\":\"3\",\"type\":\"percentage\",\"value\":\"5\",\"label\":\"1-2\"},
\"2\":{\"from\":\"4\",\"to\":\"5\",\"type\":\"percentage\",\"value\":\"8\",\"label\":\"3-5\"},
\"3\":{\"from\":\"6\",\"to\":\"20\",\"type\":\"percentage\",\"value\":\"10\",\"label\":\"6-10\"},
\"4\":{\"from\":\"21\",\"to\":\"\",\"type\":\"percentage\",\"value\":\"12.4513\",\"label\":\"11+\"}},
\"cart_label\":\"\"}', 
'{\"cart_label\":\"\"}', 
NULL, 
NULL, 
NULL, 
0, 
'[]', 
NULL, 
'{\"condition_relationship\":\"and\"}', 
NULL, 
'[]', 
'wdr_bulk_discount', 
'[]', 
1, 
'2022-04-07 09:29:32', 
1, 
'2022-04-08 09:56:03');
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
