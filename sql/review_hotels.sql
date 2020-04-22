CREATE TABLE `review_hotels` (
  `id_review` int(10) NOT NULL AUTO_INCREMENT, 
  `ref_hotel` varchar(150) NOT NULL,
  `ref_user` varchar(250) NOT NULL,
  `comment_ho` varchar(2000) NOT NULL,
  `score_cl` varchar(10) NOT NULL,
  `score_es` varchar(10) NOT NULL,
  `score_st` varchar(10) NOT NULL,
  `score_fa` varchar(10) NOT NULL,
  `score_to` varchar(10) NOT NULL,
  `create_date_co` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id_review`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;