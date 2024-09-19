-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 19, 2024 at 08:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobhunt2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`email`, `password`) VALUES
('youremailhere', 'yourpasswordhere');

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE `companyprofile` (
  `uid` int(11) NOT NULL,
  `aboutus` mediumtext NOT NULL,
  `establisheddate` date NOT NULL,
  `noofemployees` int(11) NOT NULL,
  `location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`uid`, `aboutus`, `establisheddate`, `noofemployees`, `location`) VALUES
(6, 'ABC\r\nDEF\r\nGHI', '2023-04-30', 345345, 'Kuala Lumpur'),
(25, ' Petronas, a leading multinational oil and gas company based in Malaysia. With over 40 years of experience, we are committed to providing innovative and sustainable energy solutions to meet the growing demand for energy worldwide.\r\n', '1974-12-08', 1908, 'Kuala Lumpur, Malaysia'),
(26, 'We are Steam, a digital distribution platform for video games and software. With over 120 million active users, I am one of the largest and most popular gaming platforms in the world.\r\n', '1998-09-12', 2983, 'Washington, United States'),
(27, 'renown fastfood chain ', '1955-12-05', 12492, 'Chicago, United States'),
(28, 'We are Intel, a leading technology company that designs and manufactures innovative computer hardware, software, and services. For over 50 years, I have been at the forefront of technological innovation and have played a significant role in shaping the digital world we live in today.\r\n', '1968-05-18', 0, 'California, United States'),
(29, 'We are IKEA, a Swedish multinational furniture retailer known for my innovative and affordable home furnishings. For over 75 years, I have been helping people all over the world create beautiful and functional living spaces.\r\n', '1943-05-28', 12354, 'Delft , Netherlands'),
(30, 'We are Facebook, the world largest social media platform with over 2.8 billion active users. For over 15 years, I have been connecting people from all over the world, and empowering them to share their stories, connect with friends and family, and discover new ideas and perspectives\r\n', '2004-02-04', 121412, 'California, United States'),
(31, 'We are Sony, a multinational technology company known for my innovative and high-quality electronics, entertainment, and gaming products. For over 75 years, I have been at the forefront of technological innovation, creating products that have become a staple in households and industries worldwide..\r\n', '2001-12-02', 2312, 'Tokyo, Japan'),
(32, 'We are Honda, a Japanese multinational corporation known for my highquality automobiles, motorcycles, and power equipment. For over 70 years, I have been committed to creating products that enhance people lives and contribute to the betterment of society.\r\n', '1948-09-24', 64564, 'Tokyo, Japan'),
(33, 'We are Apple, a multinational technology company known for my innovative and high-quality electronics, software, and services. For over 45 years, I have been at the forefront of technological innovation, creating products that have become iconic and beloved around the world.\r\n', '1976-04-01', 35345, 'California, United States');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `workmode` varchar(255) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `dateposted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `uid`, `title`, `salary`, `type`, `workmode`, `location`, `dateposted`) VALUES
(1, 6, 'Senior Software Developer', 5000, 'Part-Time', 'Physical', 'Subang Jaya', '2023-04-11'),
(22, 25, 'Senior Manager', 15000, 'Full-Time', 'Physical', 'Kuala Selangor, Selangor', '2023-04-18'),
(23, 25, 'Retail Assistant', 6000, 'Temporary', 'Hybrid', 'Kuala Selangor, Selangor', '2023-04-18'),
(24, 25, 'Adminstrator', 12000, 'Contract', 'Remote', 'Kuala Selangor, Selangor', '2023-04-18'),
(25, 25, 'Intern', 1000, 'Internship', 'Physical', 'Kuala Selangor, Selangor', '2023-04-18'),
(26, 25, 'Technician ', 7500, 'Full-Time', 'Physical', 'Kuala Selangor, Selangor', '2023-04-18'),
(27, 26, 'Animator', 10000, 'Part-Time', 'Remote', 'Shah Alam, Selangor', '2023-04-18'),
(28, 26, 'Effect Artist', 9500, 'Full-Time', 'Remote', 'Shah Alam, Selangor', '2023-04-18'),
(29, 26, 'Game Development', 12000, 'Full-Time', 'Remote', 'Shah Alam, Selangor', '2023-04-18'),
(30, 26, 'Software Engineer ', 23750, 'Full-Time', 'Remote', 'Shah Alam, Selangor', '2023-04-18'),
(31, 26, 'Audio Software Engineer', 8000, 'Part-Time', 'Physical', 'Shah Alam, Selangor', '2023-04-18'),
(34, 27, 'Crew Trainer', 3000, 'Contract', 'Physical', 'Klang, Selangor', '2023-04-18'),
(35, 27, 'Assistant Manager', 4500, 'Full-Time', 'Hybrid', 'Klang, Selangor', '2023-04-18'),
(36, 27, 'Department Manager', 6000, 'Temporary', 'Physical', 'Klang, Selangor', '2023-04-18'),
(37, 27, 'Operations Consultant', 8000, 'Full-Time', 'Remote', 'Klang, Selangor', '2023-04-18'),
(38, 27, 'Manager', 9500, 'Full-Time', 'Physical', 'Klang, Selangor', '2023-04-18'),
(39, 28, 'Design Engineer', 12000, 'Full-Time', 'Hybrid', 'Georgetown, Penang', '2023-04-18'),
(40, 28, 'Marketing Manager', 6000, 'Part-Time', 'Physical', 'Georgetown, Penang', '2023-04-18'),
(42, 28, 'Data Scientist', 5000, 'Contract', 'Physical', 'Georgetown, Penang', '2023-04-18'),
(43, 28, 'Senior Developer', 14500, 'Full-Time', 'Remote', 'Georgetown, Penang', '2023-04-18'),
(44, 28, 'Intern', 1000, 'Internship', 'Remote', 'Georgetown, Penang', '2023-04-18'),
(45, 29, 'Interior Designer ', 8000, 'Part-Time', 'Hybrid', 'Petaling Jaya, Selangor', '2023-04-18'),
(46, 29, 'Visual Planner ', 3000, 'Full-Time', 'Physical', 'Petaling Jaya, Selangor', '2023-04-18'),
(47, 29, 'Food Assistant ', 2500, 'Full-Time', 'Physical', 'Petaling Jaya, Selangor', '2023-04-18'),
(48, 29, 'Associate', 1500, 'Full-Time', 'Physical', 'Petaling Jaya, Selangor', '2023-04-18'),
(49, 29, 'Manager', 3000, 'Part-Time', 'Physical', 'Petaling Jaya, Selangor', '2023-04-18'),
(50, 30, 'UX Designer ', 6000, 'Full-Time', 'Remote', 'Neo Damansara, Selangor', '2023-04-18'),
(51, 30, 'Head of Marketing', 6700, 'Contract', 'Physical', 'Neo Damansara, Selangor', '2023-04-18'),
(52, 30, 'Associate', 1600, 'Part-Time', 'Hybrid', 'Neo Damansara, Selangor', '2023-04-18'),
(53, 30, 'Intern', 950, 'Internship', 'Hybrid', 'Neo Damansara, Selangor', '2023-04-18'),
(54, 30, 'Software Engineer ', 5040, 'Temporary', 'Remote', 'Neo Damansara, Selangor', '2023-04-18'),
(55, 31, 'Graphic Engineer ', 6000, 'Part-Time', 'Remote', 'Muar, Johor', '2023-04-18'),
(56, 31, 'Maintenance Mechanic ', 3400, 'Full-Time', 'Physical', 'Muar, Johor', '2023-04-18'),
(57, 31, 'Sales Specialist', 2000, 'Full-Time', 'Physical', 'Muar, Johor', '2023-04-18'),
(58, 31, 'Research Engineer ', 4500, 'Full-Time', 'Physical', 'Muar, Johor', '2023-04-18'),
(59, 31, 'Lead Consultant', 6000, 'Temporary', 'Physical', 'Muar, Johor', '2023-04-18'),
(60, 32, 'System Project Management', 7600, 'Full-Time', 'Hybrid', 'Ipoh, Perak', '2023-04-18'),
(61, 32, 'Clerk', 3000, 'Part-Time', 'Physical', 'Ipoh, Perak', '2023-04-18'),
(62, 32, 'Sales Manager', 4500, 'Temporary', 'Physical', 'Ipoh, Perak', '2023-04-18'),
(63, 32, 'Human Resource Operations', 3400, 'Full-Time', 'Physical', 'Ipoh, Perak', '2023-04-18'),
(64, 32, 'Retail Assistant', 3400, 'Part-Time', 'Physical', 'Ipoh, Perak', '2023-04-18'),
(65, 33, 'Senior Manager', 6000, 'Part-Time', 'Physical', 'Bangsar, Kuala Lumpur', '2023-04-18'),
(67, 33, 'Operations Consultant', 5600, 'Contract', 'Physical', 'Bangsar, Kuala Lumpur', '2023-04-18'),
(68, 33, 'Intern', 1000, 'Internship', 'Hybrid', 'Bangsar, Kuala Lumpur', '2023-04-18'),
(69, 33, 'Store Manager', 6000, 'Full-Time', 'Physical', 'Bangsar, Kuala Lumpur', '2023-04-18'),
(70, 33, 'Business Expert ', 7000, 'Full-Time', 'Physical', 'Bangsar, Kuala Lumpur', '2023-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `jid` int(11) NOT NULL,
  `benefits` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `noofcandidates` int(11) NOT NULL,
  `requirements` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`jid`, `benefits`, `description`, `noofcandidates`, `requirements`, `skills`) VALUES
(1, 'Medical, Dental, Vision, Life Insurance, 401(k), Paid Time Off, Paid Holidays, Employee Discount, Employee Referral Bonus, Employee Stock Purchase Plan, Tuition Reimbursement, and many more.', 'As a Senior Web Designer, you will be responsible for designing and developing websites and web applications. You will be working closely with the development team to ensure that the design is implemented correctly and that the end product is visually appealing and user-friendly. You will also be responsible for creating wireframes and prototypes for new projects. Test', 5, 'Education: graduate Age: 25+ Language: English, Malay Experience: 3+ years Have Own Transport', 'HTML CSS JavaScript PHP MySQL Python'),
(22, 'free RM100 worth of RON95 petrol monthly\r\n', 'oversee the entire management \r\n', 2, '\r\nDegree in Managing\r\n', 'oversee the entire management \r\n'),
(23, 'free RM100 worth of RON95 petrol monthly\r\n', 'Retail Assist', 1, 'Degree in Business and Communications\r\n', 'serving customers, arranging merchandise and processing sales transactions\r\n'),
(24, 'free RM100 worth of RON95 petrol monthly\r\n', 'Admin management', 2, 'Diploma in Adminstration or any diploma with revelant field\r\n', 'performs clerical duties to help an office run smoothly and efficiently\r\n'),
(25, 'free RM100 worth of RON95 petrol monthly\r\n', 'internship experience', 3, 'Diploma/degree in Engineering\r\n', 'Accepts designated, business-focus projects to research, propose ideas and solutions, and present final project during the internship.\r\n'),
(26, 'free RM100 worth of RON95 petrol monthly\r\n', 'Techician with strong basic fundamentals', 1, 'Diploma in Enginnering \r\n', 'Repair, install, replace, and service different systems and equipment\r\n'),
(27, 'Health insurance and Vision insurance\r\n', 'create content', 3, 'Diploma in Animation\r\n', 'Conceptualizing ideas for characters, scenes, backgrounds and other animation elements\r\n'),
(28, 'Health insurance and Vision insurance\r\n', 'create visual effects', 1, 'Diploma in Animation\r\n', 'create computer-generated animations and special effects and add them to movies, TV shows, and computer games\r\n'),
(29, 'Health insurance and Vision insurance\r\n', 'develop games for steam and other steam related apps', 2, 'Degree in Game Design, 3 years of experience\r\n', 'responsible for designing and developing video games for PC, console, and mobile applications.\r\n'),
(30, 'Health insurance and Vision insurance\r\n', 'create new software and design software', 1, 'Degree in Software Engineering, 5 years of experience \r\n', 'designs, develops and maintains computer software at a company.\r\n\r\n'),
(31, 'Health insurance and Vision insurance\r\n', 'create audio designs for development apps\r\n', 1, 'Degree in Software Engineering, 5 years of experience \r\n', 'designs, develops and maintains audio software at a company.\r\n'),
(34, '30 off your orders at participating mcd restaurants nationwide\r\n', 'train and manage', 5, 'High experience with training staffs\r\n\r\n', 'responsible for instructing new employees on how to perform their job duties\r\n'),
(35, '30% off your orders at participating McDonalds restaurants nationwide\r\n', 'Assistant the manager and perform duty', 2, 'Degree in Business and Communications\r\n', 'verify employee schedules and ensure new hires understand their roles and duties.\r\n'),
(36, '30% off your orders at participating McDonalds restaurants nationwide\r\n', 'Manage the entire staff of the selected store', 1, 'Degree in Management\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(37, '30% off your orders at participating McDonalds restaurants nationwide\r\n', 'consult operations to the selected manager', 1, 'Degree in Management\r\n\r\n', 'consult the functioning and productivity of a company division.\r\n'),
(38, '30% off your orders at participating McDonalds restaurants nationwide\r\n', 'Managering', 1, 'Degree in Business and Communications\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(39, 'Annual and quarterly bonuses\r\n', 'design backend ', 2, 'Degree in Business and Communications\r\n', 'research and develop designs for projects in a range of sectors, from construction to software, medical equipment and manufacturing\r\n'),
(42, 'Annual and quarterly bonuses\r\n', 'observe backend data science', 4, 'Diploma in IT\r\n', 'interprets the raw data and extracts valuable meaning out of it\r\n'),
(43, 'Annual and quarterly bonuses\r\n', 'manage the developing phase', 1, 'Degree in Software Engineering, 5 years of experience \r\n', 'responsible for designing, testing, and implementing new and updated software programs\r\n'),
(44, 'monthly bonuses', 'learn on the job internship ', 5, 'Diploma/degree in IT\r\n', 'Accepts designated, business-focus projects to research, propose ideas and solutions, and present final project during the internship.\r\n'),
(45, 'Ikea in-store discounts\r\n', 'design ikea store location interiors', 4, 'Diploma/degree in Interior Design\r\n', 'oversees the design and decorative process for both working and living areas from start to finish.\r\n'),
(46, 'Ikea in-store discounts\r\n', 'plans the company listings', 2, 'Diploma in Communications\r\n', 'Plan, create and execute overall business visual merchandising strategy.\r\n'),
(47, 'Ikea in-store discounts\r\n', 'assistant in curating foods', 5, '3 years of work experience in a professional kitchen\r\n', 'prepares and serves large amounts of food and maintains a safe and clean work environment in a health care setting\r\n'),
(48, 'Ikea in-store discounts\r\n', 'assist with office work', 5, 'Diploma in Business and Communications\r\n', 'work in collaboration with others to complete daily tasks and offer support to their team\r\n'),
(49, 'Ikea in-store discounts\r\n', 'Manage the store system ', 1, 'Degree in Managing\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(50, 'Health insurance and Vision insurance\r\n', '.', 1, 'Degree/Diploma in UX design \r\n', 'turn applications into something that people like and want to use\r\n'),
(51, 'Health insurance and Vision insurance\r\n', 'marketing head ', 1, 'Degree in Business and Communications\r\n', 'developing plans to help establish our brand, allocating resources to different projects\r\n'),
(52, 'Health insurance and Vision insurance\r\n', 'work with office stations', 4, 'Diploma in Business and Communications\r\n', 'work in collaboration with others to complete daily tasks and offer support to their team\r\n'),
(53, 'Health insurance and Vision insurance\r\n', 'internship experience', 4, 'Diploma/degree in IT\r\n', 'Accepts designated, business-focus projects to research, propose ideas and solutions, and present final project during the internship.\r\n'),
(54, 'Health insurance and Vision insurance\r\n', 'engineer software for facebook related apps', 2, 'Degree in Software Engineering, 5 years of experience \r\n', 'familiar with html css java phyton\r\n'),
(55, 'Sony in-store discounts\r\n', 'graphic engineering products', 2, 'Degree in Software Engineering, 5 years of experience \r\n', 'uses hardware and software to create digital models, plans and sketches.\r\n'),
(56, 'Sony in-store discounts\r\n', 'mantian products enginneering ', 1, 'Degree in Engineering \r\n', 'install, repair, and maintain machinery and equipment\r\n'),
(57, 'Sony in-store discounts\r\n', 'manage sales patterns', 1, 'Degree in Business and Communications\r\n', 'develops and implements sales strategy, new business/membership/client development, retention of clients/members, negotiation of contracts, and identification of entrepreneurial enterprises and relationship management strategies.\r\n'),
(58, 'Sony in-store discounts\r\n', 'researching sony products', 1, 'Degree in Business and Communications\r\n', 'develops and implements sales strategy, new business/membership/client development, retention of clients/members, negotiation of contracts, and identification of entrepreneurial enterprises and relationship management strategies.\r\n'),
(59, 'Sony in-store discounts\r\n', 'consultancy sony', 1, 'Degree in Engineering \r\n', 'finding solutions to client needs, delegating tasks to your team, and ensuring that the rest of your staff stays on course and within the budget.\r\n'),
(60, 'Company cars for outstations\r\n', 'manage rpojects for honda', 2, 'Degree in Managing\r\n', 'in charge of the planning, scheduling, budgeting, execution, and delivery of software and web projects.\r\n'),
(61, 'Company cars for outstations\r\n', 'office work', 2, 'Degree in Managing\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(62, 'Company cars for outstations\r\n', 'manages sales in honda', 4, 'Degree in Managing\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(63, 'Company cars for outstations\r\n', 'operate and oversee the human resource departnment ', 1, 'Degree in Business and Communications\r\n', 'reviewing and approving budgets, implementing new company policies and maintaining internal HR systems.\r\n'),
(64, 'Company cars for outstations\r\n', 'assist in retail management ', 1, 'Degree in Business and Communications \r\n', 'verify employee schedules and ensure new hires understand their roles and duties.\r\n'),
(67, 'Apple products for employee workstations\r\n', 'consultancy', 1, 'Degree in Consultancy, 2 years of experience\r\n', 'hired by clients to support them with improving the efficiency of their value chain.\r\n'),
(68, 'Apple products for employee workstations\r\n', 'internship experience', 4, 'Diploma/degree in IT\r\n', 'Accepts designated, business-focus projects to research, propose ideas and solutions, and present final project during the internship.\r\n'),
(69, 'Apple products for employees workstations\r\n', 'manage store sites', 2, 'Degree in Finance, 3 years of experience\r\n', 'oversee the functioning and productivity of a company division.\r\n'),
(70, 'Apple products for employee workstations\r\n', 'oversee and predict business plans', 1, 'Degree in Business and Communications, 5 years experience\r\n', 'advises, provides information, provides insight and provides recommendations to help clients reach their goals and solve problems.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jobhunter`
--

CREATE TABLE `jobhunter` (
  `hid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `salary` int(11) NOT NULL,
  `dateposted` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobhunter`
--

INSERT INTO `jobhunter` (`hid`, `uid`, `title`, `location`, `salary`, `dateposted`, `type`, `experience`) VALUES
(1, 5, 'Junior Software Engineer', 'Bandar Utama', 10000, '2023-04-11', 'Part-Time', 10),
(6, 17, 'Data Scientist', 'Georgetown, Penang', 5000, '2023-04-18', 'Full-Time', 2),
(7, 18, 'Store Manager', 'Kuala Lumpur, Malaysia', 6000, '2023-04-18', 'Part-Time', 4),
(8, 19, 'Marketing Manager', 'Penang, Malaysia', 6000, '2023-04-18', 'Part-Time', 1),
(9, 20, 'Animator', 'Shah Alam, Selangor', 10000, '2023-04-18', 'Full-Time', 2),
(10, 21, 'Audio Software Engineer', 'Melaka, Malaysia', 8000, '2023-04-18', 'Part-Time', 2),
(11, 22, 'Maintenance Mechanic ', 'Muar, Johor', 3400, '2023-04-18', 'Full-Time', 2),
(12, 23, 'Senior UI Designer', 'Sabah, Malaysia', 15000, '2023-04-18', 'Contract', 2),
(13, 23, 'UI Designer', 'Sabah, Malaysia', 7000, '2023-04-18', 'Contract', 2),
(14, 24, 'Retail Assistant', 'Ipoh, Perak', 3400, '2023-04-18', 'Temporary', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobhunterdetails`
--

CREATE TABLE `jobhunterdetails` (
  `hid` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobhunterdetails`
--

INSERT INTO `jobhunterdetails` (`hid`, `description`) VALUES
(1, 'Hello'),
(6, 'As a Data Scientist seeking new job opportunities, I am a highly analytical and detail-oriented professional with expertise in collecting, analyzing, and interpreting complex data to drive business insights and decision-making. I am skilled in programming languages such as Python and R, as well as in machine learning algorithms and statistical analysis techniques. With a passion for data-driven problem-solving and a strong ability to communicate technical findings to non-technical stakeholders, I am committed to delivering actionable insights and driving success in any data science-focused role.\r\n'),
(7, 'As a Store Manager searching for new job opportunities, I am a seasoned retail professional with a track record of success in managing store operations and driving sales growth. I am skilled in recruiting and training staff, optimizing inventory levels, and delivering exceptional customer service. With strong leadership and communication skills, I am committed to fostering a positive and productive work environment and achieving business objectives.\r\n'),
(8, 'As a Marketing Manager searching for new job opportunities, I am a strategic and results-driven professional with extensive experience in developing and implementing successful marketing campaigns across various channels. I am skilled in conducting market research, analyzing data, and collaborating with cross-functional teams to drive brand awareness, lead generation, and revenue growth. With strong communication and leadership skills, I am committed to delivering exceptional results and driving success in any marketing-focused role.\r\n'),
(9, 'As an Animator seeking new job opportunities, I am a highly creative and skilled professional with a passion for bringing characters and stories to life through animation. I excel in collaborating with cross-functional teams, creating visually stunning animations, and delivering high-quality work on time and within budget. With expertise in software such as Adobe After Effects, Maya, and Cinema 4D, I am confident in my ability to drive innovation and success in any animation-focused role.\r\n'),
(10, 'As an Audio Software Engineer seeking new job opportunities, I am a highly skilled and innovative professional with expertise in developing and implementing cutting-edge audio software solutions for various platforms. I excel in collaborating with cross-functional teams, conducting research, and developing innovative algorithms that enhance sound quality and user experience. With a passion for music and sound technology, I am committed to delivering high-quality products and driving success in any audio software development-focused role\r\n'),
(11, 'As a Maintenance Mechanic searching for new job opportunities, I am a skilled and experienced professional with expertise in diagnosing, troubleshooting, and repairing various types of equipment and machinery. I am skilled in conducting preventative maintenance, ensuring compliance with safety regulations, and maximizing machine efficiency. With a strong attention to detail and a commitment to quality workmanship, I am confident in my ability to contribute to any maintenance-focused team and drive success in any industrial setting.\r\n'),
(12, 'As a Senior UI Designer seeking new job opportunities, I am a highly creative and skilled professional with expertise in designing intuitive and visually stunning user interfaces for web and mobile applications. I excel in collaborating with cross-functional teams, conducting user research, and delivering engaging user experiences that meet business objectives. With a strong portfolio of successful projects and a passion for staying up-to-date with design trends and emerging technologies, I am confident in my ability to drive innovation and success in any UI-focused role.\r\n'),
(13, 'As a ]UI Designer seeking new job opportunities, I am a highly creative and skilled professional with expertise in designing intuitive and visually stunning user interfaces for web and mobile applications. I excel in collaborating with cross-functional teams, conducting user research, and delivering engaging user experiences that meet business objectives. With a strong portfolio of successful projects and a passion for staying up-to-date with design trends and emerging technologies, I am confident in my ability to drive innovation and success in any UI-focused role.\r\n'),
(14, 'As an assistant searching for new job opportunities, I am a driven and adaptable professional with a strong work ethic and a desire to learn and grow. I am skilled in collaborating with team members, managing projects, and delivering results that meet business objectives. With a positive attitude and a willingness to take on new challenges, I am confident in my ability to contribute to any dynamic work environment and drive success in any role..\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accounttype` int(11) NOT NULL,
  `profilepicture` varchar(1000) DEFAULT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `name`, `password`, `accounttype`, `profilepicture`, `token`) VALUES
(5, 'test@mail.com', 'JobHunter', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643ccea496fbe2.02921946.jpg', 'e466bb2c28d8100c2e571eccadf695a5'),
(6, 'test2@mail.com', 'Company 2', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643cbb0df39148.15556667.png', ''),
(17, 'rajveersingh@mail.com', 'Rajveer Singh', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e96c287ec99.31608322.jpg', '7e299ea5f25a86fc13025dc55d548628'),
(18, 'alikumar@mail.com', 'Ali Kumar', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e977ec5b2a5.18967262.jpg', '735b47da4030e0a6be46fbf45896d892'),
(19, 'caseyloung@mail.com', 'Casey Loung', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e981d1e7f32.75047527.jpg', 'b013b57ee36552860302e3c69c1a63cc'),
(20, 'gabrielkwan@mail.com', 'Gabriel Liew', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e989f1189e7.53369021.jpg', 'dacd4e732ad367f1b3a22aa9ca75e28e'),
(21, 'neshansuresh@mail.com', 'Neshan Suresh', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e999653c8d5.09991362.jpg', '2b3cdcb57747989a810430935a75740f'),
(22, 'danielkim@mail.com', 'Daniel Kim', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e9a28984c42.64292421.jpg', 'bcbd55e0519b9227a6c950ae98a444d4'),
(23, 'sarahlee@mail.com', 'Sarah Lee', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e9acd5f5ab2.65426442.jpg', 'f189b02a03c2cfa74d2325477ff3b804'),
(24, 'kristinwu@mail.com', 'Kristin Wu', '098f6bcd4621d373cade4e832627b4f6', 1, 'IMG-643e9b469a5b63.57693757.jpg', 'f2392e8df6fd46032aae09ea0a9692f8'),
(25, 'petronas@mail.com', 'Petronas', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643e9c585226b1.78068740.jpg', '82d8f3dfc299889c1132aba2c450aa48'),
(26, 'steam@mail.com', 'Steam', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643e9e4260ddc5.08382428.png', '4d527c5db42f6eabe4cc73292d6723f9'),
(27, 'mcdonalds@mail.com', 'McDonalds', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643ea0103b2b98.66019422.png', 'b4ce9e68dbd41a7c8c90f71038f85c41'),
(28, 'intel@mail.com', 'Intel', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643ea46aad0a86.77883543.png', '4cb7e6f46b9cdacaa475ca6b2995dd44'),
(29, 'ikea@mail.com', 'Ikea', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643ea631ce37b4.76306416.png', '852826eb34bc4069c3332a4144925ee2'),
(30, 'facebook@mail.com', 'Facebook', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643ea8451b2c66.68416889.png', '855102bdc729ede8484633bec22caaaf'),
(31, 'sony@mail.com', 'Sony', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643ea9cb3122b6.72913879.png', '644775fd96e184bd032441fe4fd502b6'),
(32, 'honda@mail.com', 'Honda', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643eab0c682631.88597137.jpg', '8d10a76b87b73924f654f0ee00f4177d'),
(33, 'apple@mail.com', 'Apple', '098f6bcd4621d373cade4e832627b4f6', 2, 'IMG-643eac77afeb61.36088325.png', '6caef06a70932eb2c09e271db97cf379'),
(34, 'testtest@mail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 1, 'profileicon.png', '8950f375c62d7194ac0a61546622f431');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `uid` int(11) NOT NULL,
  `education` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  `aboutus` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `lifeexperience` int(11) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `resume` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`uid`, `education`, `skills`, `aboutus`, `location`, `lifeexperience`, `birthdate`, `resume`) VALUES
(5, 'sunway', 'dying', 'I am a fresh grad currently seeking to get my first internship', 'Malaysia', 3, '2005-02-01', 'PDF-643f656cd978d0.87633675.pdf'),
(17, 'Diploma in IT\r\n', 'Fluent in IT\r\nHardworking, Creative, Solver', 'Hello, my name is Rajveer Singh and I am currently looking for a new job opportunity. I am a 30 year old male with experience in IT. \r\n', 'Johor,Malaysia', 0, '1982-02-12', 'sample.pdf'),
(18, 'Degree in Finance \r\n', 'Financing\r\nwork well in groups and a leader at heart', 'Hello, my name is Ali Kumar and I am currently looking for a new job opportunity. I am a 21 year old male with 2 years of experience in finance. \r\n', 'Penang, Malaysia', 0, '2002-12-02', 'sample.pdf'),
(19, 'Degree in Management\r\n', 'Managment Skills\r\nA born leader, Hardworking, Risktaker', 'Hello, my name is Casey Loung and I am currently looking for a new job opportunity. I am a 22 year old male specializing in management. \r\n', 'Selangor,Malaysia', 4, '2004-12-02', 'sample.pdf'),
(20, 'Degree in Animation\r\n', 'Animation skills\r\nfluent in modern day animation apps\r\nworked on multiple past projects ', 'Hello, my name is Gabriel Kwan and I am currently looking for a new job opportunity. I am a 25 year old female with 3 of experience in arts. \r\n', 'Penang, Malaysia', 2, '2005-02-04', 'sample.pdf'),
(21, 'Degree in Software Engineering \r\n', 'fluent on most coding apps like c++, java, pyhton', 'Hello, my name is Neshan Suresh and I am currently looking for a new job opportunity. I am a 24 year old male with 2 of experience in software engineering. \r\n', 'Kuala Lumpur, Malaysia', 1, '1998-08-17', 'sample.pdf'),
(22, 'Degree in Engineering\r\n', 'Engineering Tools are fluent and can communicate in groups and work well with leaders', 'Hello, my name is Daniel Kim and I am currently looking for a new job opportunity. I am a 24 year old male with 2 years of experience in engineering. \r\n', 'Degree in Engineering', 0, '2003-05-22', 'sample.pdf'),
(23, 'Degree in UI design\r\n', 'hardworker and passionate', 'Hello, my name is Sarah Lee and I am currently looking for a new job opportunity. I am a 27 year old female with 4 of experience in software development. \r\n', 'Johor,Malaysia', 0, '1997-03-07', 'sample.pdf'),
(24, 'Degree in Accounting\r\n', 'ready to learn more, teamplayer', 'Hello, my name is Kristin Wu and I am currently looking for a new job opportunity. I am a 22 year old female with 2 years of experience in accounting. \r\n', 'Selangor,Malaysia', 2, '2001-02-03', 'sample.pdf'),
(34, 'Edit your education', 'Edit your skills', 'Edit your description', 'Edit your location', 0, '2023-04-19', 'sample.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `uid_job` (`uid`);

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `jobhunter`
--
ALTER TABLE `jobhunter`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `uid_jobhunter` (`uid`);

--
-- Indexes for table `jobhunterdetails`
--
ALTER TABLE `jobhunterdetails`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `jobhunter`
--
ALTER TABLE `jobhunter`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD CONSTRAINT `uid_companyprofile` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `uid_job` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD CONSTRAINT `jid_jobdetails` FOREIGN KEY (`jid`) REFERENCES `job` (`jid`);

--
-- Constraints for table `jobhunter`
--
ALTER TABLE `jobhunter`
  ADD CONSTRAINT `uid_jobhunter` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `jobhunterdetails`
--
ALTER TABLE `jobhunterdetails`
  ADD CONSTRAINT `hid_jobhunterdetails` FOREIGN KEY (`hid`) REFERENCES `jobhunter` (`hid`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `uid_userprofile` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
