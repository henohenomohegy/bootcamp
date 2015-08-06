-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2015 年 8 月 04 日 18:22
-- サーバのバージョン： 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `user_id`, `name`, `created`, `modified`) VALUES
(1, NULL, '日記', '2015-08-05 08:08:44', '2015-08-05 08:08:44'),
(2, NULL, '趣味', '2015-08-05 08:09:29', '2015-08-05 08:09:29'),
(3, NULL, 'グルメ', '2015-08-05 08:09:38', '2015-08-05 08:09:38'),
(4, NULL, '書評', '2015-08-05 08:09:45', '2015-08-05 08:09:45');
-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created`, `modified`) VALUES
(1, 'testuser1', 'dd51629f43ea493556687e93ac1b590a46bf335a', 'テスト太郎１', NULL, now(), now());
INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created`, `modified`) VALUES
(2, 'testuser2', 'db677061dcfd3dc4cc36fb984736e999511a2f9b', 'テスト太郎２', NULL, now(), now());

--
-- Indexes for dumped tables
--

--
-- テーブルの構造 `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_topics_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `blog`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_posts_category_id`
    FOREIGN KEY (`category_id`)
    REFERENCES `blog`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `topics` (`id`, `title`, `body`, `category_id`, `created`, `modified`, `user_id`) VALUES
(1, '記事タイトル記事タイトル', 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト', 1, '2015-08-05 00:00:00', '0000-00-00 00:00:00', 1),
(2, '記事タイトル２', 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト', 1, '2015-08-05 00:00:00', '2015-08-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `comment_name` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_comments_topic_id`
    FOREIGN KEY (`topic_id`)
    REFERENCES `blog`.`topics` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `comments` (`id`, `topic_id`, `title`, `comment`, `created`, `modified`, `comment_name`) VALUES
(1, 1, 'コメントタイトル１', 'こめんとこめんとこめんと', '2015-08-06 00:00:00', '2015-08-06 00:00:00', 'テスト太郎'),
(2, 1, 'こめんとたいとる２', 'コメント２コメント２コメント２コメント２コメント２コメント２コメント２コメント２コメント２コメント２コメント２コメント２', '2015-08-06 00:00:00', '2015-08-06 00:00:00', 'コメント太郎２');

-- --------------------------------------------------------
