CREATE TABLE `uploads_multi_images` (
  `id_images_ho` int(10) NOT NULL AUTO_INCREMENT, 
  `ref_host` varchar(50) NOT NULL,
  `type_bed` varchar(50) NOT NULL,
  `picture_hotel` varchar(250) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id_images_ho`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;