CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT, 
  `facebook_id` varchar(50) NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_user` varchar(20) NULL,
  `address` varchar(80) NULL,
  `about_me` varchar(500) NULL,
  `picture_users` varchar(250) NULL,
  `facebook` varchar(250) NULL,
  `twitter` varchar(250) NULL,
  `instagram` varchar(250) NULL,
  `userlevel` varchar(15) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;