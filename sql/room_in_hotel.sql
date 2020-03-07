CREATE TABLE `room_in_hotel` (
  `id` int(10) NOT NULL AUTO_INCREMENT, 
  `ref_id` varchar(50) NOT NULL,
  `name_room` varchar(250) NOT NULL,
  `price_adult` varchar(250) NOT NULL,
  `price_kid` varchar(250) NOT NULL,
  `type_bed` varchar(50) NOT NULL,
  `no_bed` varchar(50) NOT NULL,
  `detail_room` varchar(1000) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `option_room` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;