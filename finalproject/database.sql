SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
---
--- Database: `database`
---

--- ----------------------------------


--
-- Table structure for table `product`
--
CREATE TABLE `product` (
  `productId` int(12) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` decimal(4.2) NOT NULL,
  `madeDate` datetime NOT NULL DEFAULT current_timestamp()
)
--
-- Dumping data for table `product`
--
INSERT INTO `product` (`productId`, `name`, `price`, `madeDate`) VALUES
(1, 'blank', 5, '2022-04-17 21:03:26'),
(2, 'blank', 6, '2022-04-17 21:20:58'),
(3, 'blank', 6, '2022-04-17 21:22:07'),
(4, 'blank', 6, '2022-04-17 21:23:05');

