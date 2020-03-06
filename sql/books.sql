CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT, 
  `ref_host` varchar(50) NOT NULL,
  `ref_room` varchar(150) NOT NULL,
  `ref_user` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `in` date NOT NULL,
  `out` date NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;