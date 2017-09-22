
CREATE TABLE IF NOT EXISTS `libusers` (
  `libuserid` smallint unsigned NOT NULL auto_increment,
  `registered` date NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY     (libuserid)
);

CREATE TABLE IF NOT EXISTS `tenantss` (
  `tenantsid` smallint unsigned NOT NULL auto_increment,
  `registered` date NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `tenantno` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `field1` varchar(50) NOT NULL,
  `field2` varchar(50) NOT NULL,
  `field3` varchar(50) NOT NULL,
  `field4` varchar(50) NOT NULL,
  PRIMARY KEY     (tenantsid)
);