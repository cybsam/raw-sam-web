-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 07:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `message_contact`
--

CREATE TABLE `message_contact` (
  `msg_id` int(11) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `msg_subject` varchar(255) NOT NULL,
  `msg_desp` text NOT NULL,
  `msg_status` int(11) NOT NULL,
  `insert_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `site_blog`
--

CREATE TABLE `site_blog` (
  `blog_id` int(11) NOT NULL,
  `post_name` text NOT NULL,
  `post_short_text` text NOT NULL,
  `post_keyword` varchar(255) NOT NULL,
  `post_category_name` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_picture` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_author_id` int(11) NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_identity` int(11) NOT NULL,
  `post_archives` date NOT NULL,
  `post_insert` datetime NOT NULL,
  `post_last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_blog`
--

INSERT INTO `site_blog` (`blog_id`, `post_name`, `post_short_text`, `post_keyword`, `post_category_name`, `post_category_id`, `post_picture`, `post_description`, `post_author`, `post_author_id`, `post_status`, `post_identity`, `post_archives`, `post_insert`, `post_last_update`) VALUES
(1, 'A Loving Heart is the Truest Wisdom', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'Fashion', 1, '1.jpg', 'Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\nTemporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\nTemporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\n', 'sam', 1, 0, 1, '0000-00-00', '2020-07-21 22:17:33', '0000-00-00 00:00:00'),
(4, 'Great Things Never Came from Comfort Zone', 'Great Things Never Came from Comfort Zone', 'Great Things Never Came from Comfort Zone', 'Fashion', 1, '4.jpg', 'Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\nMolestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\nMolestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\nMolestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\nMolestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\nMolestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!\r\n\r\n', 'sam', 1, 0, 2, '0000-00-00', '2020-07-21 22:21:51', '0000-00-00 00:00:00'),
(5, 'Paths Are Made by Walking', 'Paths Are Made by WalkingPaths Are Made by Walking', 'Paths Are Made by Walking', 'Travel', 3, '5.jpg', 'Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\nTemporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\nTemporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\nTemporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\n', 'sam', 1, 0, 1, '0000-00-00', '2020-07-21 22:22:39', '0000-00-00 00:00:00'),
(6, 'The Secret of Getting Ahead is Getting Started', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'The Secret of Getting Ahead is Getting Started', 'Technology', 2, '6.jpg', 'Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.\r\n\r\nQuisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.\r\n\r\nQuisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.\r\n\r\nQuisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.\r\n\r\n', 'sam', 1, 0, 2, '0000-00-00', '2020-07-21 22:23:30', '0000-00-00 00:00:00'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'pturi deleniti dolor repellendus et accusantium', 'tur excepturi deleniti dolor repellendus ', 'Food', 4, '7-blog.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.', 'shuvo', 27, 0, 1, '0000-00-00', '2020-07-22 14:43:59', '0000-00-00 00:00:00'),
(8, 'Nemo quod repellat consequatur excepturi deleniti dolorest.', 'pturi deleniti dolor repellendus et accusantium', 'tur excepturi deleniti dolor repellendus ', 'Photography', 5, '8-article.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam iure nemo perspiciatis quam recusandae, alias sunt. Nemo quod repellat consequatur excepturi deleniti dolor repellendus et accusantium tempora harum! Atque, est.', 'parrot', 28, 0, 2, '0000-00-00', '2020-07-22 14:56:03', '0000-00-00 00:00:00'),
(9, 'test blog 1,test blog 1,test blog 1,', 'test blog 1,test blog 1,test blog 1test blog 1,test blog 1,test blog 1', 'test blog 1,test blog 1,test blog 1,', 'Technology', 2, '9-blog.png', 'test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,test blog 1,', 'shuvo', 27, 0, 1, '0000-00-00', '2020-08-02 18:38:08', '0000-00-00 00:00:00'),
(10, 'test blog 2,test blog 2,test blog 2,', 'test blog 2,test blog 2,test blog 2,test blog 2,', 'test blog 2,test blog 2,test blog 2,', 'Food', 4, '10-article.png', 'test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,test blog 2,', 'shuvo', 27, 0, 2, '0000-00-00', '2020-08-02 18:38:51', '0000-00-00 00:00:00'),
(11, 'aarticle 1,aarticle 1,aarticle 1,aarticle 1,', 'aarticle 1,aarticle 1,aarticle 1,aarticle 1,', 'aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,', 'Photography', 5, '11-article.png', 'aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,aarticle 1,', 'shuvo', 27, 0, 2, '0000-00-00', '2020-08-02 18:39:36', '0000-00-00 00:00:00'),
(12, 'article 2,article 2,article 2,article 2,article 2', 'article 2,article 2,article 2,arti', 'article 2,article 2,article ', 'Technology', 2, '12-article.png', 'article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2article 2,article 2,article 2,article 2,article 2', 'shuvo', 27, 0, 2, '0000-00-00', '2020-08-02 18:41:10', '0000-00-00 00:00:00'),
(13, 'this is sam web,this is sam web,', 'this is sam web,', 'this is sam web,this is sam web,this is sam web,this is sam web,', 'Photography', 5, '13-blog.png', 'this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,this is sam web,', 'shuvo', 27, 0, 1, '0000-00-00', '2020-08-02 18:41:50', '0000-00-00 00:00:00'),
(14, 'sam-web,sam-web,sam-web,sam-web', 'sam-websam-websam-web', 'sam-websam-websam-websam-web', 'Travel', 3, '14-article.png', 'sam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-websam-web', 'shuvo', 27, 0, 2, '0000-00-00', '2020-08-02 19:03:47', '0000-00-00 00:00:00'),
(15, 'tetst dbas djhsadb sahdb asd bsahdb ', 'sam-websam-websam-web', 'sam-websam-websam-websam-web', 'Travel', 3, '15-article.png', 'tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb tetst dbas djhsadb sahdb asd bsahdb ', 'shuvo', 27, 0, 2, '0000-00-00', '2020-08-02 23:10:44', '0000-00-00 00:00:00'),
(16, 'hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,', 'hare krishno, hare ram,hare krishno, hare ram,', 'hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,', 'Food', 4, '16-blog.png', 'hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,hare krishno, hare ram,', 'shuvo', 27, 0, 1, '0000-00-00', '2020-08-02 23:12:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_category`
--

CREATE TABLE `site_category` (
  `cate_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `ins_usr_nem` varchar(255) NOT NULL,
  `ins_usr_id` int(11) NOT NULL,
  `cate_status` int(11) NOT NULL,
  `del_uer_nem` varchar(255) NOT NULL,
  `insert_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_category`
--

INSERT INTO `site_category` (`cate_id`, `category_name`, `ins_usr_nem`, `ins_usr_id`, `cate_status`, `del_uer_nem`, `insert_time`) VALUES
(1, 'Fashion', 'sam', 1, 0, '', '2020-07-22 01:59:44'),
(2, 'Technology', 'sam', 1, 0, '', '2020-07-22 01:59:50'),
(3, 'Travel', 'sam', 1, 0, '', '2020-07-22 01:59:56'),
(4, 'Food', 'sam', 1, 0, '', '2020-07-22 02:00:03'),
(5, 'Photography', 'sam', 1, 0, '', '2020-07-22 02:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `site_information`
--

CREATE TABLE `site_information` (
  `info_id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_copyright_link` varchar(255) NOT NULL,
  `site_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_information`
--

INSERT INTO `site_information` (`info_id`, `site_title`, `site_copyright`, `site_copyright_link`, `site_icon`) VALUES
(1, 'Sam Web', 'sam-web', 'https://sam-web.tk', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_value` int(11) NOT NULL,
  `page_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`page_id`, `page_name`, `page_value`, `page_status`) VALUES
(1, 'index.php', 1, 0),
(2, 'travel.php', 2, 0),
(3, 'about.php', 3, 0),
(4, 'contact.php', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_dlt` int(11) NOT NULL,
  `user_reje` int(11) NOT NULL,
  `insert_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`admin_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_picture`, `user_status`, `user_dlt`, `user_reje`, `insert_at`, `update_at`) VALUES
(1, 'sam', 'sam@gmail.com', '$2y$10$IG5wBl18M3Fw1KW2EJPRh.NSBOqE.T1iuTmQuVxVkhxim20WfmjRu', 'male', 'sam.jpg', 1, 0, 0, '2020-07-16 02:43:45', '0000-00-00 00:00:00'),
(2, 'purnita', 'purnita@gmail.com', '$2y$10$y3chlaPYkhEU/tE6HlUef.slERoLNGasY.o/0.hmd9bIcVY7YCADi', 'female', 'purnita.jpg', 2, 0, 0, '2020-07-16 02:46:35', '0000-00-00 00:00:00'),
(3, 'ratan', 'ratan@hal.com', '$2y$10$4xj0MSnjpsHzwo9zvvYhiOTn4LJsD2zXuv9.J3iF/AwTEIlAnZZkG', 'male', 'ratan.jpg', 2, 0, 0, '2020-07-16 03:12:39', '0000-00-00 00:00:00'),
(4, 'shikha', 'shikha@hal.com', '$2y$10$M4Pq2vT12.sfGa6qP0Z9vO5nTgJPE8z47M95nw1WIxFcRdvkiSR0e', 'female', 'shikha.jpg', 2, 0, 0, '2020-07-16 03:12:55', '0000-00-00 00:00:00'),
(5, 'lol', 'sadasda@fasfsa.com', '$2y$10$yjn..Yyqakk6skVpMfMN5e7zdY9BDdymZefjQueCwV9aZM8eX/aEm', 'male', 'lol.jpg', 2, 0, 0, '2020-07-16 07:00:04', '0000-00-00 00:00:00'),
(6, 'asasadsadas', 'dsadada@hbfjhas.com', '$2y$10$QkahjEwDBED4LVElSJQc..7MfuTzfTEe61cJILbUWbGTDq0StY7zm', 'female', 'asasadsadas.png', 2, 0, 0, '2020-07-16 07:00:31', '0000-00-00 00:00:00'),
(7, 'dsadsadsadsa', 'dsadsadsadsa@dsadsadsadsa.cc', '$2y$10$FweM9ILZW1EOH3mBJ4kLV.KkZ.4XNXGcqbtc3Z4RC0XOUl3UFiKEi', 'other', 'dsadsadsadsa.jpg', 2, 0, 0, '2020-07-16 07:01:15', '0000-00-00 00:00:00'),
(8, 'sdfsdfsdfsdfs', 'sdfsdfsdfsdfs@sdfsdfsdfsdfs.jj', '$2y$10$rdtV5PMJsC8v10Sxxb9q9OZMjjYIV2wXIfre95PRZpD1fD8q.EGjO', 'male', 'sdfsdfsdfsdfs.jpg', 2, 0, 0, '2020-07-16 07:02:14', '0000-00-00 00:00:00'),
(9, 'fsdfsdfds', 'fsdfsdfds@vv.ff', '$2y$10$4jWYC2NR5L558W.bc8gcLe8hIHGA6ccP4Av5OVsrgxU5C0KEPSlmO', 'female', 'fsdfsdfds.jpg', 2, 0, 0, '2020-07-16 07:02:37', '0000-00-00 00:00:00'),
(10, 'lol1', 'lol@lol.com', '$2y$10$IajTTWcNJHfTsIxS/J05q.Fou5JcP1JkeQ1CanZFYmPxlfYEobpDK', 'other', 'lol1.jpg', 2, 0, 0, '2020-07-17 06:12:40', '0000-00-00 00:00:00'),
(11, 'huuuuuudasd', 'huuuuuudasd@huuuuuudasd.c', '$2y$10$lTARTTFz3WP/GwXoBqqdG.Pu2uE04j51CPDE.SJaWzobJhBR1lX8e', 'female', 'huuuuuudasd.jpg', 2, 0, 0, '2020-07-17 06:14:28', '0000-00-00 00:00:00'),
(13, 'lol2', 'lol2@lol2.cc', '$2y$10$wTovkmEdQFXLaFBVbZ6rl.UR9rHo52NV1mIMLLzi5HELq1sac0Yk2', 'male', 'lol2.jpg', 2, 0, 0, '2020-07-17 07:09:48', '0000-00-00 00:00:00'),
(14, 'hunter', 'hunter@forrest.com', '$2y$10$r/QqCYvuji5DmtJ6.xTYlO38hChZUk7akPR0IrvE0sFq/E8y.Ewe2', 'male', 'hunter.jpg', 2, 0, 0, '2020-07-17 07:44:36', '0000-00-00 00:00:00'),
(15, 'dasdsadsadef', 'dasdsadsadef@dasdsadsadef.hgh', '$2y$10$IdRmzTbgsLjE8rDfe4nyDuxfKP6SlAy8TOZ0249J/C3cix2i0JWJi', 'other', 'dasdsadsadef.jpg', 2, 0, 0, '2020-07-18 01:36:54', '2020-07-18 02:37:06'),
(16, 'gdfgdsgdsgdg', 'gdsgdaga@gdfgfdg.hhfg', '$2y$10$poxYSEg2DJkDa8e2lrTIpu2UdQbcqB.Nwr5Fa4J5jUCaT0hp3aiPe', 'other', 'gdfgdsgdsgdg.jpg', 2, 0, 0, '2020-07-18 01:37:16', '2020-07-18 23:34:24'),
(18, 'dsadsadasd', 'dsadsadasd@fsdfs.gsdg', '$2y$10$JgN5zouCz1qi/gSKqcG3X.uA8cFMyI8qqkod.N8OIGq6CYiWhdqD6', 'other', 'dsadsadasd.jpg', 2, 1, 0, '2020-07-18 01:37:57', '2020-07-18 02:41:05'),
(20, 'sdfsdfsdfdsfdsf', 'sdfsdfsdfdsfdsf@fdsfs.hfdgfdgds', '$2y$10$QCjgj7ApePMhJqjLwwg5wOcNj6zfklRdU/qcC0HnmuM0E8UqvJRL.', 'female', 'sdfsdfsdfdsfdsf.jpg', 0, 0, 0, '2020-07-18 01:40:47', '2020-07-18 02:44:36'),
(21, 'df dsfre fregreg erg', 'fsdfsdfs@gfdgdfg.hfdgfdg', '$2y$10$8pRdeZrlBu8mrTATxS5fC.dXlVRHNZaMvyeEL4iepe5zdtPSO9L6O', 'female', 'df dsfre fregreg erg.jpg', 0, 0, 0, '2020-07-18 01:41:03', '0000-00-00 00:00:00'),
(22, 'Ashik', 'ashik@gmail.com', '$2y$10$q93vRmW3KXWQf5ou56tG7uzGQsAqmoX0LzJOvwUaWHrofoKlVke56', 'male', 'Ashik.jpg', 0, 0, 0, '2020-07-18 10:59:09', '2020-07-18 23:01:05'),
(23, 'ashik vai', 'ashik@vai.com', '$2y$10$/8xneg8WrEovib5VSb1lPOYYFUyBFZT1.0LAsf.lHnnfHzBnHAr/a', 'male', 'ashik vai.jpg', 2, 0, 0, '2020-07-18 23:07:23', '2020-07-19 02:01:56'),
(24, 'helal', 'helal@misti.com', '$2y$10$ILfIc.ObZjUfEBRb84DNUebB/cEHJpqRRIi.rtxmbrNVpGDCayBy.', 'male', 'helal.jpg', 2, 1, 0, '2020-07-18 11:09:57', '2020-07-19 02:17:49'),
(25, 'asdasdasdasdasda', 'asdasdasdasdasdaW@dad.dasd', '$2y$10$.3fH97HvltsmwEwdvG0X8OZLzrG0jMETCk6BSb.zb5SogTzMrtYxe', 'female', 'asdasdasdasdasda.jpg', 0, 3, 1, '2020-07-18 23:49:22', '0000-00-00 00:00:00'),
(26, 'ha ha ha ha', 'hahahaha@haha.com', '$2y$10$kvwvMclXI1RC9N445cJOwO.QzA4lJZlMDMJQzSvpUHRhoTwb9UmRi', 'other', 'ha ha ha ha.png', 0, 0, 0, '2020-07-19 02:06:53', '0000-00-00 00:00:00'),
(27, 'shuvo', 'shuvo@gmail.com', '$2y$10$/a1STz0OZJl3umKhKCCmKePHE6Hi6BAfh4Dl6pQLsROPHc8FRO3l6', 'male', 'shuvo.jpg', 1, 0, 0, '2020-07-22 18:33:53', '2020-07-22 18:34:26'),
(28, 'parrot', 'parrot@parrot.com', '$2y$10$iYFI6Qlh4Amki.RAu5Aov.AvSKc2JYGASPoo9gw9qsbH3mOh0Anfa', 'other', 'parrot.jpg', 2, 0, 0, '2020-07-22 18:38:12', '2020-07-22 18:38:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message_contact`
--
ALTER TABLE `message_contact`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `site_blog`
--
ALTER TABLE `site_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `site_category`
--
ALTER TABLE `site_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `site_information`
--
ALTER TABLE `site_information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message_contact`
--
ALTER TABLE `message_contact`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_blog`
--
ALTER TABLE `site_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `site_category`
--
ALTER TABLE `site_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_information`
--
ALTER TABLE `site_information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
