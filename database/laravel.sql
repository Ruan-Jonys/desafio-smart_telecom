-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_02bfc0087f8579851eb25fd86216ce06','i:1;',1749211620),('laravel_cache_02bfc0087f8579851eb25fd86216ce06:timer','i:1749211620;',1749211620),('laravel_cache_1b6453892473a467d07372d45eb05abc2031647a','i:1;',1749163879),('laravel_cache_1b6453892473a467d07372d45eb05abc2031647a:timer','i:1749163879;',1749163879),('laravel_cache_2e9a28caad53069469cf175174fc2596','i:1;',1749216460),('laravel_cache_2e9a28caad53069469cf175174fc2596:timer','i:1749216460;',1749216460),('laravel_cache_65e092a0f87be3dee3a46c72520021a0','i:1;',1749207278),('laravel_cache_65e092a0f87be3dee3a46c72520021a0:timer','i:1749207278;',1749207278),('laravel_cache_c525a5357e97fef8d3db25841c86da1a','i:1;',1749216438),('laravel_cache_c525a5357e97fef8d3db25841c86da1a:timer','i:1749216438;',1749216438),('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0','i:1;',1749160841),('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0:timer','i:1749160841;',1749160841),('laravel_cache_ruan@gmail.com|127.0.0.1','i:1;',1749211620),('laravel_cache_ruan@gmail.com|127.0.0.1:timer','i:1749211620;',1749211620),('laravel_cache_ruanjonys031207@gmail.com|127.0.0.1','i:1;',1749207278),('laravel_cache_ruanjonys031207@gmail.com|127.0.0.1:timer','i:1749207278;',1749207278);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_05_19_215556_add_two_factor_columns_to_users_table',1),(5,'2025_05_19_215604_create_personal_access_tokens_table',1),(6,'2025_05_19_215637_create_teams_table',2),(7,'2025_05_19_215638_create_team_user_table',2),(8,'2025_05_19_215639_create_team_invitations_table',2),(9,'2025_05_23_121958_add_address_fields_to_users_table',3),(10,'2025_05_23_221846_create_planos_table',4),(11,'2025_05_23_225203_create_planos_table',5),(12,'2025_05_26_162148_rename_planos_to_plans_table',6),(13,'2025_05_26_220746_drop_plans_table',7),(14,'2025_05_26_220838_create_plans_table',8),(15,'2025_05_27_215735_add_role_to_users_table',9),(16,'2025_05_28_225039_add_status_to_plans_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('ruanjj281@gmail.com','$2y$12$FW43rNFDB9VqUX96PMtSjutDKuFvo8lj7QPMSWUFAUWX1JvVEo9De','2025-06-04 01:01:22');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `velocidade` int NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plans_team_id_index` (`team_id`),
  KEY `plans_user_id_index` (`user_id`),
  CONSTRAINT `plans_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (4,'Básico Simples','Mínimo de acesso',70,70.00,1,4,4,'2025-05-27 03:23:36','2025-06-03 03:12:36'),(5,'Intermédiario','mais ou menos',100,100.00,1,4,4,'2025-05-27 03:26:52','2025-05-29 03:51:29'),(31,'t','t',5,5.00,1,4,4,'2025-06-06 04:24:38','2025-06-06 04:24:38'),(41,'wq','qw',10,10.00,1,4,4,'2025-06-06 13:10:29','2025-06-06 13:10:29');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('RoskmUEd3Ff5IvLynStPH74Vk55oFFsqnZeWTBeC',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicDNqQU9tTElmSDlaUkdDZGdzb1ZXUE8xa0JGNUxjT2laMm9PTXlKNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749211560),('sPA5C3n7Fxlr7d0eqQ5f4UGKsWh9Z1EvGEm6i5RB',2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiekFXWFpseUdQaDV4M0NEbW9scTZZSWpaRXNHUzk3ZVR1elQ1cURhcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',1749215996),('YhRaZO0fiV9ph4JxaqS3M7zKR4NYUOViLrlbGtqk',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoib2Y0RG1kb2RncHI2QnBGMUs3b0hieVpTMlplMXFCU1g3VDd6V1BUSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=',1749217526);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_invitations`
--

LOCK TABLES `team_invitations` WRITE;
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,2,'Admin\'s Team',1,'2025-05-20 01:14:48','2025-05-20 01:14:48'),(3,3,'Ruan\'s Team',1,'2025-05-23 02:28:19','2025-05-23 02:28:19'),(4,4,'Ruan\'s Team',1,'2025-05-23 20:42:35','2025-05-23 20:42:35'),(5,5,'Test User\'s Team',1,'2025-05-28 01:05:04','2025-05-28 01:05:04'),(6,9,'Casas\'s Team',1,'2025-05-30 01:12:39','2025-05-30 01:12:39'),(7,10,'Americanas\'s Team',1,'2025-05-30 17:54:03','2025-05-30 17:54:03'),(8,11,'Kitana\'s Team',1,'2025-06-01 18:51:33','2025-06-01 18:51:33'),(9,11,'Sra. Abreu',0,'2025-06-01 19:03:59','2025-06-01 19:03:59'),(10,12,'Macavi\'s Team',1,'2025-06-02 17:47:12','2025-06-02 17:47:12'),(11,12,'Jhon',0,'2025-06-02 17:50:14','2025-06-02 17:50:14'),(19,13,'Infornet\'s Team',1,'2025-06-03 14:00:55','2025-06-03 14:00:55'),(21,15,'Dr. Isom Price\'s Team',1,'2025-06-06 16:22:00','2025-06-06 16:22:00'),(22,18,'Katarina Cruickshank\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(23,19,'Audreanne Crona\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(24,20,'Candace McLaughlin\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(25,21,'Opal Bernhard\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(26,22,'Reilly Lehner V\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(27,23,'Michael Abshire DDS\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(28,24,'Marlee Blanda\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(29,25,'Audie Dach\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(30,26,'Merlin Wiegand\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(31,27,'Test User\'s Team',1,'2025-06-06 16:25:39','2025-06-06 16:25:39');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'provedor',
  `cnpj` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Admin','admin@gmail.com','admin','',NULL,NULL,NULL,NULL,NULL,NULL,'$2y$12$hng4z/eKudEZoZUyc5uiP.bC6D.fEe/5IsPws4W/YI8i/iddtkOMW',NULL,NULL,NULL,'Hz5PssknsVpjLRsW8FAnbevuRtHWNe5zQemGzFY6T1sH5aVmiwYVR1P20Ch7',1,NULL,'2025-05-20 01:14:48','2025-06-06 00:59:48'),(4,'Ruan Jonys Sousa Abreu','ruanjj281@gmail.com','provedor','47.960.950/0001-21','Rua C, 66','Timbaúba dos Marinheiros','62875-000','Chorozinho','CE',NULL,'$2y$12$HsBQXNwFwfJx5Hc6A3t82OrWu8kmg.I2iaN5kVXhvIqOHAjBQElHu',NULL,NULL,NULL,'DtfTMZHC5dbMSIvl1XyU1iCAgtpcfjRQBty9uZgqJdTm9Ir8XVFGvK9aNJsq',4,'profile-photos/EudxCQiiOKHz4biCty6rNgQ9zXePlhsLQUekIzC1.png','2025-05-23 20:42:35','2025-06-06 13:36:29'),(17,'Administrador','admin@empresa.com','admin','12345678000199','Rua Exemplo, 100','Centro','01000-000','São Paulo','SP','2025-06-06 16:25:39','$2y$12$9DNUAAEOAzKKuxHON1db6.hmE5LbVcDVinjHw1tmdiNkTs6gS7wp.',NULL,NULL,NULL,'t3UWu4304h',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(18,'Katarina Cruickshank','mikayla.rohan@example.org','provedor','13.051.422/4347-43','19208 Buckridge Turnpike Suite 763','haven','71210','Wilkinsonshire','LA','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'uON7D9ty0l',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(19,'Audreanne Crona','dsimonis@example.org','provedor','62.764.992/7584-60','28311 Bayer Course Apt. 191','view','52245-51','Luisaville','GA','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'5OjsSXFpwK',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(20,'Candace McLaughlin','kirlin.karine@example.com','provedor','08.802.134/0146-64','232 Kerluke Hills Suite 941','berg','93222','Aaliyahchester','KS','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'vYDolFV24j',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(21,'Opal Bernhard','ashtyn.kessler@example.net','provedor','98.573.494/2866-45','885 Lonny Spring Suite 317','mouth','60453-85','Cartermouth','MN','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'wNfxveqFdL',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(22,'Reilly Lehner V','blick.wellington@example.org','provedor','11.738.900/5580-75','64241 Verda Courts','shire','40599-74','Ratkeview','UT','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'ebezGE9WS2',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(23,'Michael Abshire DDS','janick.rath@example.net','admin','55.006.696/4873-00','243 Wehner Well Suite 196','berg','63738','Ollieland','HI','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'s5cpVViiow',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(24,'Marlee Blanda','aisha57@example.com','admin','45.132.084/3186-60','566 Curt Creek','bury','09349-97','Gerlachstad','WV','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'TuKfFVkPCM',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(25,'Audie Dach','dayana51@example.org','admin','10.209.663/8621-73','955 Moen Dale Apt. 677','chester','43587-43','Gorczanybury','MO','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'q4xHZWmZT0',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(26,'Merlin Wiegand','zkuvalis@example.com','admin','82.518.357/9409-68','98110 Dickens Course','bury','89076','Port Torrance','KS','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'SpVIsBQiCU',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39'),(27,'Test User','test@example.com','provedor','92.092.712/0737-41','454 Linda Motorway','port','66452','Lake Lucienneburgh','NM','2025-06-06 16:25:39','$2y$12$G4hiqbQTcA7PhpOyHewVz.IETo8txq.wqIV8uPMX71QSckSu2HfAm',NULL,NULL,NULL,'djwqWuBX31',NULL,NULL,'2025-06-06 16:25:39','2025-06-06 16:25:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-06 10:52:31
