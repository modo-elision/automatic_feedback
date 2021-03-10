-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 05:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `h_no` varchar(70) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `applyed_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `responce` int(11) NOT NULL,
  `cv_location` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `required_experience` int(3) NOT NULL,
  `pay` int(10) NOT NULL,
  `brief_description` text NOT NULL,
  `skilles_required` text NOT NULL,
  `post_date` date NOT NULL,
  `post_expires` date NOT NULL,
  `post_comments` text NOT NULL,
  `posted_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `company_name`, `required_experience`, `pay`, `brief_description`, `skilles_required`, `post_date`, `post_expires`, `post_comments`, `posted_by`) VALUES
(1, 'Business Development Manager - Agency', 'HDFC LIFE INSURANCE COMPANY LIMITED4.0(2482 Reviews)', 2, 100000, 'Roles and Responsibilities\r\nBe a part of a noble profession like Insurance sales that provides financial protection to families when they need it the most!\r\n\r\nBe a part of our HDFC Life Sales Team and join us in our mission of protecting India with pride!\r\n\r\nIn the Business Development Manager role, you will be\r\nRecruiting and Building a high performing distribution network of Financial Consultants (FCs)\r\nTraining, motivating and driving these certified financial consultants (agents) to sell insurance\r\nMeeting prospective customers with FCs to sell insurance solutions\r\nProviding pre and post sales support (e.g. claim settlement)\r\nEnsuring quality of business and persistency (renewals of premium)\r\nEnabling FCs to use latest digital platforms', 'Who Should Apply?\r\nEducation : Graduate\r\nExperience : Sales experience of 2+ years\r\nAge : Between 24 to 35 years\r\nOne with a pleasant personality, good communication skills and a go getter attitude\r\nOne who loves the challenge of chasing and meeting sales targets\r\nFind out more about us on www.hdfclife.com/hdfc-careers/', '2021-03-04', '2021-03-31', 'Follow us on linkedin.com/company/hdfc-life\r\n\r\nHDFC Life is committed to provide equal opportunity in all aspects of employment and a workplace free from any form of discrimination (including Gender, Physical disability, LGBT)', 1),
(2, 'Magento Full stack Lead', 'RCPC', 8, 0, 'Roles and Responsibilities\r\nMagento Full stack Lead - A210114\r\nKey Responsibility:\r\n• Designing and leading B2B, B2C, multi-site and multi-country, end-to-end implementations of eCommerce platforms\r\n\r\n• Contribute effectively in defining the architecture/design of solution and implementation\r\n\r\n• Independently handle all modular designs and has the ability to see through modular issues', 'Desired Skill:\r\n\r\n• Minimum of 4+ years of experience in PHP/MySql and at least 1+ years of experience in Magento eCommerce platform\r\n\r\n• Advanced Experience with Magento and Magento theming\r\n\r\n• Experience in designing and leading B2B, B2C, multi-site and multi-country, end-to-end implementations of eCommerce platforms\r\n\r\n• Strong coding experience using PHP(both front end and back end) ,Jquery,HTML, CSS, MySql in a LAMP environment\r\n\r\n• Build custom functionality and integrations with first and third party software\r\n\r\n• Develop and maintain code for custom extensions to be released as third party add-ons\r\n\r\n• Create and maintain technical documentation using defined technical documentation templates\r\n\r\n• Recognize and evaluate performance critical areas\r\n\r\n• Produce clean, well-documented, efficient, and standards compliant code from written technical specifications\r\n\r\n• Strong analytical & debugging skills along with Query Tuning, Code profiling is recommended\r\n\r\n• Must have done at least one enterprise level implementation of Magento\r\n\r\n• Should be able to quickly analyze the fitment of the Magento Commerce for the business problem, identify gaps and suggest solution around Magento with minimum customization\r\n\r\n• Should be passionate about coding and able to mentor the junior team members as part of execution\r\n\r\n• Should have rich experience in data migration and working in a highly integrated enterprise application\r\n\r\n• Must be able to contribute effectively in defining the architecture/design of solution and implementation\r\n\r\n• Must be able to independently handle all modular designs and has the ability to see through modular issues.\r\n\r\n• Must be able to work with the project manager in mapping the project lifecycle, outlining the WBS & overall schedule, and set / review the overall quality of deliverables', '2021-03-01', '2021-03-31', 'Soft Skills:\r\n\r\nGood communication, analytical and presentation skills, problem solving skills and learning attitude\r\n\r\n\r\n\r\nWork Experience Required- 8+ Years', 1),
(3, 'Senior Web PHP Developer', 'Synactive India Private Limited', 6, 0, 'We have a urgent requirement for Web PHP Developer,\r\nExp : 6 + yrs,\r\nNp : Immediate or Less than 30 Days,\r\nLocation : Hyderabad .\r\nJD :', '• Hands on experience required in design patterns and OOP design practices\r\n• Building web applications in core PHP and also using Codeigniter framework\r\n• Using JavaScript, AJAX in building single page applications\r\n• Proficient knowledge in Node JS is add on advantage\r\n• JQuery, HTML/HTML5, CSS/CSS3, Bootstrap,\r\n• Working knowledge of Windows and Linux OSs\r\n• Knowledge on GSP (global server pages) and CGI (common gateway interfaces is a plus)\r\nNote : Work from Home is available for Few Months.', '2021-03-01', '2021-03-31', 'Qualification - BTech (CSE / IT), MCA or any computer background only', 1),
(4, 'Hiring For PHP Developers - Chennai', 'Novac Technology Solutions4.0(56 Reviews)', 0, 0, 'Greetings from Novac!\r\nNOVAC Technology Solution is currently hiring for PHP Developers who can join with us immediately or within 1 month\r\n\r\n\r\nExperience : 0 - 5 Years, Fresher with certification in PHP can apply\r\n\r\nLocation: Perungudi, Chennai.', 'Core Skills requirement:\r\nMust have experience in PHP, MYSQL, Web Service, API\r\nMust have experience in Mobile/Web services\r\nExperience in MVC structure code and basic knowledge code version control is an advantage\r\nKnowledge of front-end technologies including CSS3, JavaScript, and HTML5.\r\n', '2021-03-01', '2021-03-31', 'Responsibilities:\r\n\r\nConducting analysis of website and application requirements\r\nWriting back-end code and building efficient PHP modules\r\nDeveloping back-end portals with an optimized database\r\nIntegrating data storage solutions\r\nResponding to integration requests from front-end developers\r\nFinalizing back-end features and testing web applications\r\nUpdating and altering application features to enhance performance.', 1),
(5, 'Senior PHP Developer - Web Applications - LAMP Stack', 'Admedia\r\nHiring for Leading Client', 5, 0, '- We are looking for a Sr. PHP developer- LAMP Stack. We are looking at all the candidates who are willing to relocate to Delhi NCR from other parts of India. Someone who has a proficient understanding of client-side scripting and JavaScript frameworks, including jQuery, etc.\r\n\r\n\r\n\r\n- Admedia India is seeking a Senior PHP Developer to join our high-growth, creative organization at our offices in New Delhi. This position is responsible for developing and maintaining projects in PHP utilizing industry standards and best practices.\r\n\r\n\r\n\r\n- Candidates will be tasked with taking a finished design and create functional PHP software to be deployed in LAMP environments. The position will require expert knowledge of all main components of the LAMP environment.', 'Required Qualifications :\r\n\r\n\r\n- Expert knowledge of PHP, MySQL, Apache and Linux servers along with frontend development using Javascript, jQuery and other libraries.\r\n\r\n- Knowledge of design patterns, composition and object-oriented development.\r\n\r\n- Experience working with APIs, both integrating a third-party API and creating your own when necessary. Oauth, Facebook, Twitter, Google API experience preferred. Ability to build custom EST APIs.\r\n\r\n- Experience designing relational databases and queries.\r\n\r\n- Experience in Memcache, Redis or similar caching technology.\r\n\r\n- Experience integrating PHP into a full stack environment. Ability to write some JS/HTML/CSS.\r\n\r\n- Advanced knowledge of building Content Management Systems, either from your own design or from frameworks using Code Igniter.\r\n\r\nDesired Qualifications :\r\n\r\n\r\n- Additional advanced JavaScript experience is strongly desired.\r\n\r\n- Experience with build systems such as Grunt/Node.js, Google Closure, or ANT.\r\n\r\n- Linux shell scripting\r\n\r\n- Some experience with Node.js, or Python\r\n\r\n- Experience writing unit tests for your work', '2021-03-01', '2021-03-31', ' Detailed portfolio that clearly demonstrates your current abilities. A decade of experience is less important than a functional portfolio with excellent examples.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `verify_code` int(11) NOT NULL,
  `verify_flag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email_id`, `password`, `full_name`, `phone_number`, `created_on`, `last_login`, `type`, `verify_code`, `verify_flag`) VALUES
(1, 'testing@gmail.com', 'test123', 'test 1', 123456789, '2021-03-02 22:16:15', '2021-03-02 22:16:15', 'admin', 664382, 1),
(2, 'skn124@student.aru.ac,uk', '1947626', '', 0, '2021-03-03 18:29:06', '2021-03-03 18:29:10', 'admin', 0, 1),
(3, 'sm2436@student.aru.ac.uk', '1945469', '', 0, '2021-03-02 18:29:14', '2021-03-02 18:29:17', 'admin', 0, 1),
(4, 'sv388@student.aru.ac.uk', '1950468', '', 0, '2021-03-03 18:30:19', '2021-03-03 18:30:22', 'admin', 0, 1),
(5, 'nrs128@student.aru.ac.uk', '1939536', '', 0, '2021-03-03 18:30:27', '2021-03-03 18:30:32', 'admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responce`
--

CREATE TABLE `responce` (
  `responce_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `type_of_template` varchar(50) NOT NULL,
  `responce_from` int(11) NOT NULL,
  `free_comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_data_id` int(10) NOT NULL,
  `login_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL,
  `cv_location` text NOT NULL,
  `designation` varchar(70) NOT NULL,
  `brief_description` text NOT NULL,
  `total_experience` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `responce`
--
ALTER TABLE `responce`
  ADD PRIMARY KEY (`responce_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responce`
--
ALTER TABLE `responce`
  MODIFY `responce_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_data_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
