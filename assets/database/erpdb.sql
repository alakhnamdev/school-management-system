-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 08:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `class and subjects`
--

CREATE TABLE `class and subjects` (
  `id` int(11) NOT NULL,
  `class` varchar(12) NOT NULL,
  `subject 1` varchar(57) DEFAULT NULL,
  `subject 2` varchar(57) DEFAULT NULL,
  `subject 3` varchar(57) DEFAULT NULL,
  `subject 4` varchar(57) DEFAULT NULL,
  `subject 5` varchar(57) DEFAULT NULL,
  `subject 6` varchar(57) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class and subjects`
--

INSERT INTO `class and subjects` (`id`, `class`, `subject 1`, `subject 2`, `subject 3`, `subject 4`, `subject 5`, `subject 6`) VALUES
(1, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(2, 'Class 2', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(3, 'Class 3', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(4, 'Class 4', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(5, 'Class 5', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(6, 'Class 6', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(7, 'Class 7', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(8, 'Class 8', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(9, 'Class 9', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(10, 'Class 10', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(11, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(12, 'Class 11 COM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(13, 'Class 11 PCM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(14, 'Class 12 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(15, 'Class 12 COM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(16, 'Class 12 PCM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `id` int(11) NOT NULL,
  `coordinator id` varchar(20) NOT NULL,
  `coordinator name` varchar(70) DEFAULT NULL,
  `subject id` varchar(6) DEFAULT NULL,
  `subject name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`id`, `coordinator id`, `coordinator name`, `subject id`, `subject name`) VALUES
(1, '24SCHCRD0', 'None', 'SUB001', 'English'),
(2, '24SCHCRD1', NULL, 'SUB002', 'Hindi'),
(3, '24SCHCRD2', NULL, 'SUB003', 'Sanskrit'),
(4, '24SCHCRD3', NULL, 'SUB004', 'Mathematics'),
(5, '24SCHCRD4', NULL, 'SUB005', 'Environmental Studies'),
(6, '24SCHCRD5', NULL, 'SUB006', 'Art & Craft'),
(7, '24SCHCRD6', NULL, 'SUB007', 'Physical Education'),
(8, '24SCHCRD7', NULL, 'SUB008', 'Computer Science'),
(9, '24SCHCRD8', NULL, 'SUB009', 'Science'),
(10, '24SCHCRD9', NULL, 'SUB010', 'Physics'),
(11, '24SCHCRD10', NULL, 'SUB011', 'Chemistry'),
(12, '24SCHCRD11', NULL, 'SUB012', 'Biology'),
(13, '24SCHCRD12', NULL, 'SUB013', 'Social Science'),
(14, '24SCHCRD13', NULL, 'SUB014', 'History'),
(15, '24SCHCRD14', NULL, 'SUB015', 'Geography'),
(16, '24SCHCRD15', NULL, 'SUB016', 'Political Science'),
(17, '24SCHCRD16', NULL, 'SUB017', 'Economics'),
(18, '24SCHCRD17', NULL, 'SUB018', 'Information Technology'),
(19, '24SCHCRD18', NULL, 'SUB019', 'Computer Science'),
(20, '24SCHCRD19', NULL, 'SUB020', 'Accountancy'),
(21, '24SCHCRD20', NULL, 'SUB021', 'Business Studies'),
(22, '24SCHCRD21', NULL, 'SUB022', 'Psychology'),
(23, '24SCHCRD22', NULL, 'SUB023', 'Fine Arts'),
(24, '24SCHCRD23', NULL, NULL, NULL),
(25, '24SCHCRD24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`id`, `username`, `password`, `role`) VALUES
(1, '24SCHCRD0', '$2y$10$NOv7MkJyKgjjNhLlvi3.cON0dF2cY6t3psFzNRIPXWAM1HPqOgSRe', 'coordinator'),
(2, '24SCHSTD0', '$2y$10$EWkcwfRW0GIj/U5dd8n.seGnm5s.z.UNhxneEGiVVrYqoyDqgLWbu', 'student'),
(3, '24SCHCRD1', '$2y$10$60HSDzLFAIyi7pqEYHFqaO9Fh6yaEa8jFC928D6RlK7KG6dqH/TXS', 'coordinator'),
(4, '24SCHSTD1', '$2y$10$HoX5oAE8IS8bcxi87U3cXenweont4CawACzDmzALoKh.NP3yCmG8q', 'student'),
(5, '24SCHSTD2', '$2y$10$DUxwv6/Wvw/qYru10Zy1O.UvE8COCe5QLVf8EYOuG8l874MuDt.0C', 'student'),
(7, '24SCHSTD3', '$2y$10$1cDX2PGpQ.9rcWexRNQRYu0XC8V9uRka2w1TtpyNLpNLT2n098mhK', 'student'),
(8, 'admin', '$2y$10$ojwjPwKw.6ZGFkkLUc/Ki.I8oX0FfjU4k7QP2c.XBhLxnLZAQOOVe', 'admin'),
(9, '24SCHSTD4', '$2y$10$vM2bfcbeF/K5wiXhcAHICu3/V9nmrm8Oawk2JJK2.5awnAZadvw5q', 'student'),
(10, '24SCHCRD2', '$2y$10$/XtukbHA1FFmm9axl9uK6.jCAQ71Fi7aiR/G9de9/OoK7hKxTxjGu', 'coordinator'),
(11, '24SCHCRD3', '$2y$10$rQQ02g3pzhW5pSQFBZmNI.sj2VYjLrMfnO2umZgzjIoeba2HLLMG.', 'coordinator'),
(12, '24SCHCRD4', '$2y$10$EejzJDWlMoLkhLxC/lVdOuSGmPzPgf1Yecu7GyNBjPBSKUdxq8P3q', 'coordinator'),
(13, '24SCHCRD5', '$2y$10$DKtfmanhtd25rwSww9G.S.fCjPBSltSMwjRQG8PUVZlSEnl9wG31i', 'coordinator'),
(14, '24SCHSTD5', '$2y$10$EX6mHZ7KNJccDvmVZsK0PedskF0XQ3zSmrE.gXwH8faD7cBuLFiEO', 'student'),
(15, '24SCHSTD6', '$2y$10$4PUrwi5bLeFsrPlWpGuMgOkXYzntHvTQc6ezEHe/B89F/bjq627AG', 'student'),
(16, '24SCHSTD7', '$2y$10$VHlfS2/4V3hyWlfP4XjaT.KUutkfrYbxOerOxJsZMzj04b5HUzBIO', 'student'),
(19, '24SCHSTD8', '$2y$10$IjnXI6CozwtbduB4lGJA7ewClfn59G6UUA5fl1AwTKm3rlWEULwBS', 'student'),
(20, '24SCHSTD9', '$2y$10$nY.F2RYkvOTUGVjO96yEJ.n51ci8KDJmblVRvHNkf89dLQYq4.PCS', 'student'),
(23, '24SCHSTD10', '$2y$10$fhGLlIWS1oSH.VdHhs8Qf.NC2tb0TkGz0aAFaF5xQ4iNltI6hup1m', 'student'),
(24, '24SCHSTD11', '$2y$10$2Vh0t8Zi87lH6ZuKNsBuZessQjYtCbd6M6V/.rWAs0HmHzZVx9GPO', 'student'),
(25, '24SCHSTD12', '$2y$10$L2eb9oky1jDDZaA6/zPBU.faTHoQLohmZ53x58Tg8GUtV71hCJ6h.', 'student'),
(26, '24SCHSTD13', '$2y$10$TQ3LpfDUAyHFYNnxbWcVtOMlYTZOKQqBsXSl4mlKA7EgCQ0hHhiD.', 'student'),
(27, '24SCHSTD14', '$2y$10$IE5N9R0LV38msnxV/6/4I.GGxLctAjoelqX6jypQtUOf6NorrJOvi', 'student'),
(28, '24SCHCRD6', '$2y$10$Tzr0JnI8M4AdWOKO0vPVSun/zfF7rAgZhUYdqTZ7AvG.3nJl0dRW6', 'coordinator'),
(29, '24SCHSTD15', '$2y$10$Zi8NXiav/g3.H46U2tpybuxo8zStgDeoXCJc04zodjg9OgFwNmOFS', 'student'),
(30, '24SCHSTD16', '$2y$10$6sqX8cvzR6bvrBjBTar0Ee1v/GfcLUxhXMLy0/Z/.Lb/VnEBT79Q6', 'student'),
(31, '24SCHSTD17', '$2y$10$ObTzvD2d5/FdrwT6H8521OskugQW.hjuBhXWwrHl3HiB2MdLh.Hi2', 'student'),
(32, '24SCHCRD7', '$2y$10$WuDEA3/.S/Tux1CmQIYdhu8W5RtkojfOVKJ2zQnd5EYpnHN7YJNXu', 'coordinator'),
(33, '24SCHCRD8', '$2y$10$FVB7HIkWcf/YEWf3FhOqEOuums/S5PEjj0wdG8hXs.JHy0zKrca9a', 'coordinator'),
(34, '24SCHCRD9', '$2y$10$jC1ICsa/NA1CVFlI5NzDAuUGjVMB7A.HWV/AcAoboL7k3.oTBN3US', 'coordinator'),
(35, '24SCHCRD10', '$2y$10$qIrhb0BYXZMFNodNtzvEVeHhV89e4WDipqXbn9Kk6NhmiIbTR89aK', 'coordinator'),
(36, '24SCHSTD18', '$2y$10$2EcIMna6SGlm/qlTMjw39.HkdC2dUJoLgIbbBPYfEtYojnzF4qYtm', 'student'),
(37, '24SCHCRD11', '$2y$10$8cNmaVGICFkZ5qBzyIf55.idGycA2kbbDfw7itd7UwONOCe5D2m.G', 'coordinator'),
(38, '24SCHSTD19', '$2y$10$bvQIi9xFx2T8yw5CkM8HpuiratwKrxdzCw2VCj9/Gzo.EcJknZYzm', 'student'),
(39, '24SCHCRD12', '$2y$10$y8JwtYYKJLsENKqEmotGo.7fxNyJ298NHdraWM9O5cJ35C030ikgu', 'coordinator'),
(40, '24SCHCRD13', '$2y$10$qs10uvXzRv8WSpNtgKSQKOC6yV495A7.3Uo7M8Om3gfzOo/piwvm.', 'coordinator'),
(41, '24SCHCRD14', '$2y$10$f7hGG.0ZV5Gg1qOyMfIiaOrMcEptPRh5Wzbm/QUw/MVWAT8pk8wwW', 'coordinator'),
(42, '24SCHCRD15', '$2y$10$rT5vhwgXf7rC5G7hkVEvJuhyOQxgdZMFmEXZYxfOGEoRmaJteHs/u', 'coordinator'),
(43, '24SCHCRD16', '$2y$10$mmsV/u1PGh2hCXaCEx/.rO9cEyDVrzIY/.f6qLY1juWOWqF.54AKa', 'coordinator'),
(44, '24SCHCRD17', '$2y$10$pAkzf.W9Ncu9Cwp3HBlJBuSiE52zFMPClQjYD1p1OwcJP2607Td1G', 'coordinator'),
(45, '24SCHCRD18', '$2y$10$fSn0zxH/ee8No7LFSCvpHueqj09EKc.wyFpEgbVzVZlYfgG58r1ze', 'coordinator'),
(46, '24SCHCRD19', '$2y$10$1KUw9YUX.TOTdkYaHWNkcO2MvrwnOYdJfRyQdMVGDxd5/1ajwaOza', 'coordinator'),
(47, '24SCHCRD20', '$2y$10$o7grqBj.Ex4WIa1KkrFWXeH06unIADdP6l/qykaG5Vz7afCTSmwZm', 'coordinator'),
(48, '24SCHCRD21', '$2y$10$ieXsYfKsCBsQPTbEdb6hjukOWfDr3FzNGfS5/4Tz8dwi0c3t5.slK', 'coordinator'),
(49, '24SCHCRD22', '$2y$10$bOSGkJxiwWtUxKrauQmake/gBEu9qTlLCj5WRSAHkzf7BY5rcLypu', 'coordinator'),
(50, '24SCHCRD23', '$2y$10$iQ2ryB7gUp5Oq0CdIXo/NOK84VSeAhbmJwNVbjeO.8gvhIxOwt1PO', 'coordinator'),
(51, '24SCHSTD20', '$2y$10$fWjiPn4VwtbiUbrc3yxkqOSXsOmxblq14HEzYl7bPM6UjI/FxXkf.', 'student'),
(52, '24SCHSTD21', '$2y$10$81EJnu7Vo.hAmoKanpy5D.UxltVEajIBDBLpnWD/Qiz5VUV49VeLu', 'student'),
(53, '24SCHSTD22', '$2y$10$3bNFiHnQXiWW9Y3FisWRRu8afFWNxcFm6Wp4kN65LVwjQueQhHSLy', 'student'),
(54, '24SCHSTD23', '$2y$10$FHCHKdnbqx/eFZW3gg0DEOCxe35uJf93jf4YRA5p5ypQu9T36..Dy', 'student'),
(55, '24SCHSTD24', '$2y$10$4D3dGxPccMoGztpGdYO9ce4j8D4DnLBBPDc18M0Ux6o1jFRB1tQfK', 'student'),
(56, '24SCHSTD25', '$2y$10$C6SLFnQ3vJLbzvHS6cyKdu/f66fDC0.KjS/zulDzksoB/SOJ.1mc2', 'student'),
(58, '24SCHSTD26', '$2y$10$rkPPWw7nb/P30ph2RkvK4uO9VOUpUA0fKLWUCkfdzxhSEHZklU5CK', 'student'),
(59, '24SCHCRD24', '$2y$10$hrDgB3Tjwm0ycy9H3QPShOnhKkYesoldSOVg8./hDBThvzxea9pgO', 'coordinator'),
(60, '24SCHSTD27', '$2y$10$UmuaQw260qWW746./lwHtuYE68sfHYgmI..2ij0fA8LqJh0Lgy1ra', 'student'),
(61, '24SCHSTD28', '$2y$10$vvk.5kwtGbBFe/Tou.sj3uTs.DALDNxg2zM1aOl.ZWc2HFPYyxn0q', 'student'),
(62, '24SCHSTD29', '$2y$10$5PNOOHE1wT.9GDVprTpzDeOunkjYrrH7D1sT9U3hDFVwe9oUc.v7O', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `body` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`, `body`, `date`) VALUES
(2, 'first notice', 'this is the first notice', '2024-11-28 23:44:04'),
(4, 'Second Notice', 'this is second notice', '2024-12-11 13:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `Academic Session` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `Academic Session`) VALUES
(1, '2024-2025'),
(2, '2025-2026'),
(3, '2026-2027'),
(4, '2027-2028'),
(5, '2028-2029'),
(6, '2029-2030');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) NOT NULL,
  `student name` varchar(70) DEFAULT NULL,
  `class` varchar(12) DEFAULT NULL,
  `subject 1` varchar(10) DEFAULT NULL,
  `subject 2` varchar(10) DEFAULT NULL,
  `subject 3` varchar(10) DEFAULT NULL,
  `subject 4` varchar(10) DEFAULT NULL,
  `subject 5` varchar(10) DEFAULT NULL,
  `subject 6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student id`, `student name`, `class`, `subject 1`, `subject 2`, `subject 3`, `subject 4`, `subject 5`, `subject 6`) VALUES
(1, '24SCHSTD0', 'None', 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(2, '24SCHSTD1', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(3, '24SCHSTD2', NULL, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(4, '24SCHSTD3', NULL, 'Class 5', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(5, '24SCHSTD4', NULL, 'Class 6', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(6, '24SCHSTD5', NULL, 'Class 3', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(7, '24SCHSTD6', NULL, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(8, '24SCHSTD7', NULL, 'Class 7', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(10, '24SCHSTD8', NULL, 'Class 8', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(11, '24SCHSTD9', NULL, 'Class 9', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(12, '24SCHSTD10', NULL, 'Class 10', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(13, '24SCHSTD11', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(14, '24SCHSTD12', NULL, 'Class 11 COM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(15, '24SCHSTD13', NULL, 'Class 11 PCM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(16, '24SCHSTD14', NULL, 'Class 12 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(17, '24SCHSTD15', NULL, 'Class 12 COM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(18, '24SCHSTD16', NULL, 'Class 6', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(19, '24SCHSTD17', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(20, '24SCHSTD18', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(21, '24SCHSTD19', NULL, 'Class 12 PCM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(22, '24SCHSTD20', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(23, '24SCHSTD21', NULL, 'Class 10', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(24, '24SCHSTD22', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(25, '24SCHSTD23', NULL, 'Class 11 COM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(26, '24SCHSTD24', NULL, 'Class 11 PCM', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(27, '24SCHSTD25', NULL, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(28, '24SCHSTD26', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(29, '24SCHSTD27', NULL, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006'),
(30, '24SCHSTD28', NULL, 'Class 11 ART', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB014'),
(31, '24SCHSTD29', NULL, 'Class 1', 'SUB001', 'SUB002', 'SUB003', 'SUB004', 'SUB005', 'SUB006');

-- --------------------------------------------------------

--
-- Table structure for table `sub001`
--

CREATE TABLE `sub001` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub001`
--

INSERT INTO `sub001` (`id`, `student id`, `attendance`, `marks`) VALUES
(6, '24SCHSTD0', 2, 100),
(7, '24SCHSTD1', 1, 100),
(8, '24SCHSTD2', 2, 98),
(9, '24SCHSTD3', 1, 1),
(10, '24SCHSTD4', 1, 1),
(11, '24SCHSTD5', 1, 1),
(12, '24SCHSTD6', 2, 97),
(13, '24SCHSTD7', 1, 1),
(14, '24SCHSTD8', 1, 1),
(15, '24SCHSTD9', 1, 1),
(16, '24SCHSTD10', 1, 1),
(17, '24SCHSTD11', 1, 1),
(18, '24SCHSTD12', 1, 1),
(19, '24SCHSTD13', 1, 1),
(20, '24SCHSTD14', 1, 1),
(21, '24SCHSTD15', 1, 1),
(22, '24SCHSTD16', 1, 1),
(23, '24SCHSTD17', 1, 1),
(24, '24SCHSTD18', 1, 1),
(25, '24SCHSTD19', 1, 1),
(26, '24SCHSTD20', 1, 1),
(27, '24SCHSTD21', 1, 1),
(28, '24SCHSTD22', 1, 1),
(29, '24SCHSTD23', 1, 1),
(30, '24SCHSTD24', 1, 1),
(31, '24SCHSTD25', 2, 96),
(32, '24SCHSTD26', 1, 1),
(33, '24SCHSTD27', 1, 95),
(34, '24SCHSTD28', 1, 1),
(35, '24SCHSTD29', 1, 94);

-- --------------------------------------------------------

--
-- Table structure for table `sub002`
--

CREATE TABLE `sub002` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub002`
--

INSERT INTO `sub002` (`id`, `student id`, `attendance`, `marks`) VALUES
(6, '24SCHSTD0', 2, 98),
(7, '24SCHSTD1', 1, 1),
(8, '24SCHSTD2', 2, 95),
(9, '24SCHSTD3', 1, 1),
(10, '24SCHSTD4', 1, 1),
(11, '24SCHSTD5', 1, 1),
(12, '24SCHSTD6', 2, 97),
(13, '24SCHSTD7', 1, 1),
(14, '24SCHSTD8', 1, 1),
(15, '24SCHSTD9', 1, 1),
(16, '24SCHSTD10', 1, 1),
(17, '24SCHSTD11', 1, 1),
(18, '24SCHSTD12', 1, 1),
(19, '24SCHSTD13', 5, 1),
(20, '24SCHSTD14', 1, 1),
(21, '24SCHSTD15', 1, 1),
(22, '24SCHSTD16', 1, 1),
(23, '24SCHSTD17', 1, 1),
(24, '24SCHSTD18', 1, 1),
(25, '24SCHSTD19', 1, 1),
(26, '24SCHSTD20', 1, 1),
(27, '24SCHSTD21', 1, 1),
(28, '24SCHSTD22', 1, 1),
(29, '24SCHSTD23', 1, 1),
(30, '24SCHSTD24', 5, 1),
(31, '24SCHSTD25', 2, 1),
(32, '24SCHSTD26', 1, 1),
(33, '24SCHSTD27', 1, 1),
(34, '24SCHSTD28', 1, 1),
(35, '24SCHSTD29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub003`
--

CREATE TABLE `sub003` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub003`
--

INSERT INTO `sub003` (`id`, `student id`, `attendance`, `marks`) VALUES
(6, '24SCHSTD0', 1, 1),
(7, '24SCHSTD1', 1, 1),
(8, '24SCHSTD2', 1, 1),
(9, '24SCHSTD3', 1, 1),
(10, '24SCHSTD4', 1, 1),
(11, '24SCHSTD5', 1, 1),
(12, '24SCHSTD6', 1, 1),
(13, '24SCHSTD7', 1, 1),
(14, '24SCHSTD8', 1, 1),
(15, '24SCHSTD9', 1, 1),
(16, '24SCHSTD10', 1, 1),
(17, '24SCHSTD11', 1, 1),
(18, '24SCHSTD12', 1, 1),
(19, '24SCHSTD13', 1, 1),
(20, '24SCHSTD14', 1, 1),
(21, '24SCHSTD15', 1, 1),
(22, '24SCHSTD16', 1, 1),
(23, '24SCHSTD17', 1, 1),
(24, '24SCHSTD18', 1, 1),
(25, '24SCHSTD19', 1, 1),
(26, '24SCHSTD20', 1, 1),
(27, '24SCHSTD21', 1, 1),
(28, '24SCHSTD22', 1, 1),
(29, '24SCHSTD23', 1, 1),
(30, '24SCHSTD24', 1, 1),
(31, '24SCHSTD25', 1, 1),
(32, '24SCHSTD26', 1, 1),
(33, '24SCHSTD27', 1, 1),
(34, '24SCHSTD28', 1, 1),
(35, '24SCHSTD29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub004`
--

CREATE TABLE `sub004` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub004`
--

INSERT INTO `sub004` (`id`, `student id`, `attendance`, `marks`) VALUES
(6, '24SCHSTD0', 1, 1),
(7, '24SCHSTD1', 1, 1),
(8, '24SCHSTD2', 1, 1),
(9, '24SCHSTD3', 1, 1),
(10, '24SCHSTD4', 1, 1),
(11, '24SCHSTD5', 1, 1),
(12, '24SCHSTD6', 1, 1),
(13, '24SCHSTD7', 1, 1),
(14, '24SCHSTD8', 1, 1),
(15, '24SCHSTD9', 1, 1),
(16, '24SCHSTD10', 1, 1),
(17, '24SCHSTD11', 1, 1),
(18, '24SCHSTD12', 1, 1),
(19, '24SCHSTD13', 1, 1),
(20, '24SCHSTD14', 1, 1),
(21, '24SCHSTD15', 1, 1),
(22, '24SCHSTD16', 1, 1),
(23, '24SCHSTD17', 1, 1),
(24, '24SCHSTD18', 1, 1),
(25, '24SCHSTD19', 1, 1),
(26, '24SCHSTD20', 1, 1),
(27, '24SCHSTD21', 1, 1),
(28, '24SCHSTD22', 1, 1),
(29, '24SCHSTD23', 1, 1),
(30, '24SCHSTD24', 1, 1),
(31, '24SCHSTD25', 1, 1),
(32, '24SCHSTD26', 1, 1),
(33, '24SCHSTD27', 1, 1),
(34, '24SCHSTD28', 1, 1),
(35, '24SCHSTD29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub005`
--

CREATE TABLE `sub005` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub005`
--

INSERT INTO `sub005` (`id`, `student id`, `attendance`, `marks`) VALUES
(6, '24SCHSTD0', 1, 1),
(7, '24SCHSTD1', 1, 1),
(8, '24SCHSTD2', 1, 1),
(9, '24SCHSTD3', 1, 1),
(10, '24SCHSTD4', 1, 1),
(11, '24SCHSTD5', 1, 1),
(12, '24SCHSTD6', 1, 1),
(13, '24SCHSTD7', 1, 1),
(14, '24SCHSTD8', 1, 1),
(15, '24SCHSTD9', 1, 1),
(16, '24SCHSTD10', 1, 1),
(17, '24SCHSTD11', 1, 1),
(18, '24SCHSTD12', 1, 1),
(19, '24SCHSTD13', 1, 1),
(20, '24SCHSTD14', 1, 1),
(21, '24SCHSTD15', 1, 1),
(22, '24SCHSTD16', 1, 1),
(23, '24SCHSTD17', 1, 1),
(24, '24SCHSTD18', 1, 1),
(25, '24SCHSTD19', 1, 1),
(26, '24SCHSTD20', 1, 1),
(27, '24SCHSTD21', 1, 1),
(28, '24SCHSTD22', 1, 1),
(29, '24SCHSTD23', 1, 1),
(30, '24SCHSTD24', 1, 1),
(31, '24SCHSTD25', 1, 1),
(32, '24SCHSTD26', 1, 1),
(33, '24SCHSTD27', 1, 1),
(34, '24SCHSTD28', 1, 1),
(35, '24SCHSTD29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub006`
--

CREATE TABLE `sub006` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub006`
--

INSERT INTO `sub006` (`id`, `student id`, `attendance`, `marks`) VALUES
(5, '24SCHSTD0', 1, 1),
(6, '24SCHSTD2', 1, 1),
(7, '24SCHSTD3', 1, 1),
(8, '24SCHSTD4', 1, 1),
(9, '24SCHSTD5', 1, 1),
(10, '24SCHSTD6', 1, 1),
(11, '24SCHSTD7', 1, 1),
(12, '24SCHSTD8', 1, 1),
(13, '24SCHSTD9', 1, 1),
(14, '24SCHSTD10', 1, 1),
(15, '24SCHSTD12', 1, 1),
(16, '24SCHSTD13', 1, 1),
(17, '24SCHSTD14', 1, 1),
(18, '24SCHSTD15', 1, 1),
(19, '24SCHSTD16', 1, 1),
(20, '24SCHSTD19', 1, 1),
(21, '24SCHSTD21', 1, 1),
(22, '24SCHSTD23', 1, 1),
(23, '24SCHSTD24', 1, 1),
(24, '24SCHSTD25', 1, 1),
(25, '24SCHSTD27', 1, 1),
(26, '24SCHSTD29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub007`
--

CREATE TABLE `sub007` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub008`
--

CREATE TABLE `sub008` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub009`
--

CREATE TABLE `sub009` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub010`
--

CREATE TABLE `sub010` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub011`
--

CREATE TABLE `sub011` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub012`
--

CREATE TABLE `sub012` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub013`
--

CREATE TABLE `sub013` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub014`
--

CREATE TABLE `sub014` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub014`
--

INSERT INTO `sub014` (`id`, `student id`, `attendance`, `marks`) VALUES
(2, '24SCHSTD1', 1, 1),
(3, '24SCHSTD11', 1, 1),
(4, '24SCHSTD17', 1, 1),
(5, '24SCHSTD18', 1, 1),
(6, '24SCHSTD20', 1, 1),
(7, '24SCHSTD22', 1, 1),
(8, '24SCHSTD26', 1, 1),
(9, '24SCHSTD28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub015`
--

CREATE TABLE `sub015` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub016`
--

CREATE TABLE `sub016` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub017`
--

CREATE TABLE `sub017` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub018`
--

CREATE TABLE `sub018` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub019`
--

CREATE TABLE `sub019` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub020`
--

CREATE TABLE `sub020` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub021`
--

CREATE TABLE `sub021` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub022`
--

CREATE TABLE `sub022` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub023`
--

CREATE TABLE `sub023` (
  `id` int(11) NOT NULL,
  `student id` varchar(20) DEFAULT NULL,
  `attendance` int(3) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject id` varchar(6) NOT NULL,
  `subject name` varchar(50) NOT NULL,
  `coordinator id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject id`, `subject name`, `coordinator id`) VALUES
(1, 'SUB001', 'English', '24SCHCRD0'),
(2, 'SUB002', 'Hindi', '24SCHCRD1'),
(3, 'SUB003', 'Sanskrit', '24SCHCRD2'),
(4, 'SUB004', 'Mathematics', '24SCHCRD3'),
(5, 'SUB005', 'Environmental Studies', '24SCHCRD4'),
(6, 'SUB006', 'Art & Craft', '24SCHCRD5'),
(7, 'SUB007', 'Physical Education', '24SCHCRD6'),
(8, 'SUB008', 'Computer Science', '24SCHCRD7'),
(9, 'SUB009', 'Science', '24SCHCRD8'),
(10, 'SUB010', 'Physics', '24SCHCRD9'),
(11, 'SUB011', 'Chemistry', '24SCHCRD10'),
(12, 'SUB012', 'Biology', '24SCHCRD11'),
(13, 'SUB013', 'Social Science', '24SCHCRD12'),
(14, 'SUB014', 'History', '24SCHCRD13'),
(15, 'SUB015', 'Geography', '24SCHCRD14'),
(16, 'SUB016', 'Political Science', '24SCHCRD15'),
(17, 'SUB017', 'Economics', '24SCHCRD16'),
(18, 'SUB018', 'Information Technology', '24SCHCRD17'),
(19, 'SUB019', 'Computer Science', '24SCHCRD18'),
(20, 'SUB020', 'Accountancy', '24SCHCRD19'),
(21, 'SUB021', 'Business Studies', '24SCHCRD20'),
(22, 'SUB022', 'Psychology', '24SCHCRD21'),
(23, 'SUB023', 'Fine Arts', '24SCHCRD22');

-- --------------------------------------------------------

--
-- Table structure for table `subject sessions`
--

CREATE TABLE `subject sessions` (
  `id` int(11) NOT NULL,
  `subject id` varchar(6) NOT NULL,
  `session` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject sessions`
--

INSERT INTO `subject sessions` (`id`, `subject id`, `session`) VALUES
(1, 'SUB001', 2),
(2, 'SUB002', 2),
(3, 'SUB003', NULL),
(4, 'SUB004', NULL),
(5, 'SUB005', NULL),
(6, 'SUB006', NULL),
(7, 'SUB007', NULL),
(8, 'SUB008', NULL),
(9, 'SUB009', NULL),
(10, 'SUB010', NULL),
(11, 'SUB011', NULL),
(12, 'SUB012', NULL),
(13, 'SUB013', NULL),
(14, 'SUB014', NULL),
(15, 'SUB015', NULL),
(16, 'SUB016', NULL),
(17, 'SUB017', NULL),
(18, 'SUB018', NULL),
(19, 'SUB019', NULL),
(20, 'SUB020', NULL),
(21, 'SUB021', NULL),
(22, 'SUB022', NULL),
(23, 'SUB023', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercount`
--

CREATE TABLE `usercount` (
  `student id` varchar(8) NOT NULL DEFAULT '24SCHSTD',
  `coordinator id` varchar(8) NOT NULL DEFAULT '24SCHCRD',
  `student` int(11) NOT NULL,
  `coordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercount`
--

INSERT INTO `usercount` (`student id`, `coordinator id`, `student`, `coordinator`) VALUES
('24SCHSTD', '24SCHCRD', 30, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class and subjects`
--
ALTER TABLE `class and subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class` (`class`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinator id` (`coordinator id`),
  ADD UNIQUE KEY `subject id` (`subject id`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Academic Session` (`Academic Session`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`student id`);

--
-- Indexes for table `sub001`
--
ALTER TABLE `sub001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub002`
--
ALTER TABLE `sub002`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub003`
--
ALTER TABLE `sub003`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub004`
--
ALTER TABLE `sub004`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub005`
--
ALTER TABLE `sub005`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub006`
--
ALTER TABLE `sub006`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub007`
--
ALTER TABLE `sub007`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub008`
--
ALTER TABLE `sub008`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub009`
--
ALTER TABLE `sub009`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub010`
--
ALTER TABLE `sub010`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub011`
--
ALTER TABLE `sub011`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub012`
--
ALTER TABLE `sub012`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub013`
--
ALTER TABLE `sub013`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub014`
--
ALTER TABLE `sub014`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub015`
--
ALTER TABLE `sub015`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub016`
--
ALTER TABLE `sub016`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub017`
--
ALTER TABLE `sub017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub018`
--
ALTER TABLE `sub018`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub019`
--
ALTER TABLE `sub019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub020`
--
ALTER TABLE `sub020`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub021`
--
ALTER TABLE `sub021`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub022`
--
ALTER TABLE `sub022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub023`
--
ALTER TABLE `sub023`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject id` (`subject id`);

--
-- Indexes for table `subject sessions`
--
ALTER TABLE `subject sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class and subjects`
--
ALTER TABLE `class and subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub001`
--
ALTER TABLE `sub001`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub002`
--
ALTER TABLE `sub002`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub003`
--
ALTER TABLE `sub003`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub004`
--
ALTER TABLE `sub004`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub005`
--
ALTER TABLE `sub005`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub006`
--
ALTER TABLE `sub006`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sub007`
--
ALTER TABLE `sub007`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub008`
--
ALTER TABLE `sub008`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub009`
--
ALTER TABLE `sub009`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub010`
--
ALTER TABLE `sub010`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub011`
--
ALTER TABLE `sub011`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub012`
--
ALTER TABLE `sub012`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub013`
--
ALTER TABLE `sub013`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub014`
--
ALTER TABLE `sub014`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub015`
--
ALTER TABLE `sub015`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub016`
--
ALTER TABLE `sub016`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub017`
--
ALTER TABLE `sub017`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub018`
--
ALTER TABLE `sub018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub019`
--
ALTER TABLE `sub019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub020`
--
ALTER TABLE `sub020`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub021`
--
ALTER TABLE `sub021`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub022`
--
ALTER TABLE `sub022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub023`
--
ALTER TABLE `sub023`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subject sessions`
--
ALTER TABLE `subject sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
