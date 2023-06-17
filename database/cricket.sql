-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 02:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `created_at`) VALUES
(1, 'danish', 'dani12', '2022-01-28 21:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(30) NOT NULL,
  `player_role` varchar(20) NOT NULL,
  `player_desc` varchar(500) NOT NULL,
  `player_runs` int(8) NOT NULL,
  `player_wickets` int(8) NOT NULL,
  `player_dp` varchar(500) NOT NULL,
  `player_batting` varchar(30) NOT NULL,
  `player_bowling` varchar(30) NOT NULL,
  `player_series` int(8) NOT NULL,
  `player_matches` int(8) NOT NULL,
  `player_innings` int(11) NOT NULL,
  `player_not_out` int(11) NOT NULL,
  `player_balls` int(11) NOT NULL,
  `player_six` int(11) NOT NULL,
  `player_four` int(11) NOT NULL,
  `player_dot_balls` int(11) NOT NULL,
  `player_overs` int(11) NOT NULL,
  `player_bowling_runs` int(11) NOT NULL,
  `player_batting_ranking` int(3) NOT NULL,
  `player_bowling_ranking` int(3) NOT NULL,
  `player_all-rounder_ranking` int(3) NOT NULL,
  `player_dob` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_role`, `player_desc`, `player_runs`, `player_wickets`, `player_dp`, `player_batting`, `player_bowling`, `player_series`, `player_matches`, `player_innings`, `player_not_out`, `player_balls`, `player_six`, `player_four`, `player_dot_balls`, `player_overs`, `player_bowling_runs`, `player_batting_ranking`, `player_bowling_ranking`, `player_all-rounder_ranking`, `player_dob`, `created_at`) VALUES
(8, 'Adil Iqbal', 'Fielder', 'Adil Iqbal is very courageous player. His fielding is very good. He can play with both left and right hand bat and bowl', 0, 0, '1645972474_adil.jpg', 'Right / Left Hand Bastman', 'Right / Left Arm Spin Bowler', 1, 4, 1, 0, 0, 0, 0, 0, 1, 16, 23, 23, 23, '1995-04-07', '2022-03-01 22:16:04'),
(9, 'Ahmed Javaid', 'Fielder', 'Ahmed Javaid is child player of FSL. Very rare chances of his batting and bowling', 0, 0, '1645972361_ahmed.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 4, 1, 0, 0, 0, 0, 0, 0, 0, 22, 22, 22, '2002-02-04', '2022-02-27 19:32:41'),
(10, 'Usama Sajjad', 'All-Rounder', 'Usama Sajjjad is All-Rounder and Fast Watta Bowler. Usama improved his game very much. Now he is also one of the best All-Rounder in FSL. He also tops in bowling rankings.', 23, 5, '1646041157_usama.jpg', 'Right Hand Bastman', 'Right Hand Watta Bowler', 1, 4, 3, 1, 16, 0, 3, 6, 4, 48, 12, 1, 1, '1999-03-20', '2022-03-01 21:10:16'),
(11, 'Mohsin Ali', 'All-Rounder', 'Mohsin Ali is a Right Handed Bastman and Right Arm Fast Bowler. His pair is very high. He is finest All-Rounder. His bowling is very fast. He also scored 50 runs in FSL.', 14, 1, '1646041062_moshin.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 3, 2, 1, 12, 1, 1, 7, 3, 28, 16, 16, 15, '1998-03-18', '2022-03-01 21:14:06'),
(13, 'Kashan Iqbal', 'All-Rounder', 'Kashan Iqbal is the most demanded player in Family Super League. He is very brilliant All-Rounder. He always tops the Leading Board', 68, 2, '1645957809_kashan.jpg', 'Left Hand Bastman', 'LeftHand Fast Bowler', 1, 4, 3, 1, 24, 4, 5, 4, 4, 32, 3, 12, 8, '1999-11-28', '2022-03-01 21:23:01'),
(14, 'Salman Iqbal', 'All-Rounder', 'Salman Iqbal is highly Pair Player. His pair is very demanded. Salman Iqbal is always looking for his Batting and Bowling. He is little bit Selfish Player', 47, 3, '1645799082_salman.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 5, 4, 0, 23, 5, 1, 4, 5, 64, 6, 6, 3, '2001-09-21', '2022-03-01 21:30:08'),
(15, 'Saqib Iqbal', 'All-Rounder', 'Saqib Iqbal is All Rounder player in FSL. He is one the old player of FSL. He is the entertaining player of FSL. He is the big fan of ABD Villears.', 21, 3, '1645957589_saqi.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 4, 2, 0, 18, 2, 0, 12, 4, 50, 13, 5, 5, '1998-05-17', '2022-03-01 21:35:02'),
(16, 'Tahir Mehmood', 'Bastman', 'Tahir Mahmood is of the wise and calm caption of FSL. He is Right Handed Bastman and smashes all over 6s When his team needs', 60, 2, '1645970674_mahmood.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 4, 2, 1, 31, 4, 4, 10, 3, 23, 4, 11, 9, '1983-04-10', '2022-03-01 21:41:18'),
(17, 'Tariq Farooq', 'Bastman', 'Tariq Farooq is very good caption. Because he always chances to all his team members to bat whether he is bastman or bowler. He is also good bastman. His nickname is King of Swing.', 57, 0, '1645970880_tariq.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 4, 3, 1, 25, 5, 2, 8, 0, 0, 5, 21, 17, '1980-02-08', '2022-03-01 21:46:24'),
(18, 'Waris Iqbal', 'All-Rounder', 'Waris Iqbal is very good bowler and Waris Iqbal is very moody player. His mood is off when  he get runs and other used to advice him but he take it serious and sad', 45, 2, '1645971044_waris.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 3, 1, 2, 23, 4, 2, 9, 3, 28, 7, 10, 10, '1996-10-28', '2022-03-01 21:50:31'),
(19, 'Zain Ramzan', 'Bastman', 'Zain Ramzan is power hitter bastman. His 6s is enjoyable to watch. He plays like Azam Khan.', 37, 1, '1645971165_zain.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 2, 1, 2, 12, 5, 1, 3, 1, 11, 8, 15, 14, '2007-01-07', '2022-03-01 22:00:39'),
(21, 'Atif Iqbal', 'All-Rounder', 'Atif Iqbal is very moody player. When he wants to play good then he performs good otherwise hiss performance is not meet the requirements of the match', 26, 2, '1645971419_atif.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 4, 3, 1, 16, 3, 0, 8, 4, 66, 11, 9, 11, '1995-05-23', '2022-03-01 22:10:04'),
(22, 'Zahid Ali', 'Bastman', 'Zahid Ali is senior player of FSL. HIs shots sometimes are same as charo shots. His captionacy is also good because he give chances to bat to all his team members.', 19, 0, '1645971544_zahid.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 2, 1, 0, 15, 0, 1, 5, 0, 0, 14, 20, 19, '1980-05-31', '2022-03-01 21:53:40'),
(24, 'Shahbaz Shad', 'Bastman', 'Shahbaz Shad is also senior player of FSL. He is very good bastman. He also scored 50 Runs in 1 match. When he was the caption he always looking good pairs for his team.', 4, 0, '1645971930_shahbaz.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 2, 1, 1, 7, 0, 0, 5, 1, 8, 19, 19, 21, '1983-12-10', '2022-03-01 22:12:21'),
(25, 'Bilal Sajjad', 'Bowler', 'Bilal Sajjad is very supportive player. He never greedy for his batting or bowling. He always thinks for his team.', 1, 1, '1645972113_bilal.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 5, 1, 1, 3, 0, 0, 2, 3, 41, 20, 14, 16, '1992-10-27', '2022-03-01 22:15:26'),
(28, 'Amir Majeed', 'Bastman', 'Amir Majeed is newly added player in FSL. He is very hardworking player and very good player', 10, 0, '1645971715_amir.jpg', 'Right Hand Bastman', 'Right Hand Watta Bowler', 1, 4, 1, 1, 7, 1, 0, 4, 1, 25, 18, 18, 20, '2001-05-02', '2022-03-01 21:57:25'),
(29, 'Sadaqat Ali', 'Bastman', 'Sadaqat Ali is one of the senior player of FSL. He is also manager of FSL. All things of FSL is managed by Sadaqat Ali. He plays like power hitter for his team', 36, 0, '1645971300_sadaqat.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 4, 3, 0, 20, 3, 1, 9, 3, 45, 9, 17, 18, '1983-09-06', '2022-03-01 22:05:41'),
(30, 'Aqib Ali', 'Bastman', 'Aqib Ali is a Power Hitter Bastman. He is very demanded player .He always tops the chart of Batting Rankings. His strike rate is also very impressive always. Aqib Ali is used to show the stars in the day. His 6s is very long. He scored 50 just in 16 Balls that is record of fastest 50 in FSL.', 120, 1, '1646041504_aqib.jpg', 'Right Hand Bastman', 'Right Arm Spin Bowler', 1, 4, 2, 2, 40, 13, 5, 9, 1, 8, 1, 13, 13, '1996-12-29', '2022-03-01 20:56:57'),
(31, 'Shaharyar ', 'All-Rounder', 'Shaharyar Shahid is a very fast bowler of FSL. His bowling speed is fast. He always comes first in bargining. Overall Shaharyar is talented player.', 13, 3, '1646041246_shaharyar.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 3, 1, 1, 12, 0, 2, 6, 3, 29, 17, 4, 6, '1998-12-04', '2022-03-01 21:03:12'),
(32, 'Javaid Ali', 'All-Rounder', 'Javaid Ali is valuable player of FSL. He improved his batting very much. His batting shots are very watchable. Now he is also demanded player. He also made  the logo of FSL.', 91, 2, '1646041714_javaid.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 5, 1, 4, 36, 8, 5, 10, 5, 55, 2, 8, 7, '2001-02-17', '2022-03-01 20:58:10'),
(33, 'Haider Ali', 'All-Rounder', 'Haider Ali is an All-Rounder player. His bowling speed is slow but he used to bowl with line and length. His batting is also very good. He is an entertaining player of FSL.', 15, 4, '1646121754_haider.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 4, 4, 0, 10, 1, 2, 4, 4, 54, 15, 2, 2, '1996-01-12', '2022-03-01 23:15:14'),
(34, 'Rafaqat Ali', 'Bowler', 'Rafaqat Ali is old and senior player of Family Super League. He is very experienced player in FSL. His bowling line and length is  very good and batting technique is also very good. His captaincy is also onn point. He leads his team very well. He also always fair', 0, 2, '1646040966_rafaqat.jpg', 'Right Hand Bastman', 'Right Hand Medium Bowler', 1, 4, 1, 0, 0, 0, 0, 0, 3, 40, 21, 7, 12, '1971-06-10', '2022-03-01 21:17:31'),
(35, 'Danish Ali', 'All-Rounder', 'Danish Ali is All-Rounder player of FSL. He also made this website that you use. Danish Ali holds the records of first ever hat-trick in FSL. He also scored the 50 Runs. There was a time when Danish Ali always tops the bowling chart and his bowling speed is the fastest in FSL. But after injury he does not perform very well. ', 32, 3, '1646384095_danish.jpg', 'Right Hand Bastman', 'Right Hand Fast Bowler', 1, 4, 2, 2, 18, 2, 2, 7, 4, 66, 10, 3, 4, '2000-10-20', '2022-03-04 13:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stats_id` int(11) NOT NULL,
  `total_matches` int(10) NOT NULL,
  `total_overs` int(10) NOT NULL,
  `total_runs` int(10) NOT NULL,
  `total_wickets` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`stats_id`, `total_matches`, `total_overs`, `total_runs`, `total_wickets`) VALUES
(1, 6, 64, 781, 38);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_report`
--

CREATE TABLE `weekly_report` (
  `week_id` int(11) NOT NULL,
  `batting_stats` varchar(50) NOT NULL,
  `bowling_stats` varchar(50) NOT NULL,
  `fund_details` varchar(50) NOT NULL,
  `points_table` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekly_report`
--

INSERT INTO `weekly_report` (`week_id`, `batting_stats`, `bowling_stats`, `fund_details`, `points_table`, `created_at`) VALUES
(5, '1646229948_batting_stats.jpg', '1646229948_bowling_stats.jpg', '1646229948_fund.jpg', '1646229948_points_table.jpg', '2022-03-02 19:05:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stats_id`);

--
-- Indexes for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD PRIMARY KEY (`week_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weekly_report`
--
ALTER TABLE `weekly_report`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
