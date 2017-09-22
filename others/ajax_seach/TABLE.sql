CREATE TABLE IF NOT EXISTS `auto_search_people` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `identification` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;



INSERT INTO `auto_search_people` (`id`, `fullname`, `username`, `email`, `password`, `location`, `photo`, `identification`) VALUES
(1, 'Vasplus Blog', 'great', 'info@servername.com', 'c079b6e3214b664413aa4018a31d916e', 'New York', 'c.jpg', 'normal'),
(2, 'Emy Nero', 'pretty', 'info@servername.com', 'c079b6e3214b664413aa4018a31d916e', 'United States', 'd.jpg', 'normal'),
(3, 'Victor Barack', 'barack', 'info@servername.com', 'c079b6e3214b664413aa4018a31d916e', 'Canada', 'b.jpg', 'page'),
(4, 'Kenneth Smith', 'smith', 'info@servername.com', 'c079b6e3214b664413aa4018a31d916e', 'Australia', 'a.jpg', 'page'),
(5, 'Sydney Odell', 'ney', 'example@yahoo.com', 'bd4fae4c48fe342d983a38218f97dad5', 'United Kingdom', 'e.jpg', 'normal'),
(6, 'Lilian Jackson', 'lilian', 'myemail@server.com', 'bd4fae4c48fe342d983a38218f97dad5', 'China', 'f.jpg', 'normal'),
(7, 'Angelina Jones', 'jones', 'jones@servername.com', 'ee7e4705dd4ac06adfe650c2cdc39bdd', 'Dallas Texas', 'g.jpg', 'normal');