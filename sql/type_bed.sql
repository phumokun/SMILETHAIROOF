CREATE TABLE `type_bed` (
  `id` int(10) NOT NULL AUTO_INCREMENT, 
  `type_bed` varchar(250) NOT NULL, 
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;