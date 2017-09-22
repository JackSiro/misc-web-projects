
CREATE TABLE IF NOT EXISTS `items` (
  `itemid` smallint unsigned NOT NULL auto_increment,
  `datein` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `partno` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL DEFAULT '-',
  `description` varchar(50) NOT NULL DEFAULT '-',
  `dateout` date NOT NULL,
  `broughtby` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `takenby` varchar(50) NOT NULL DEFAULT '-',
  `givenby` varchar(50) NOT NULL DEFAULT '-',
  `state` varchar(50) NOT NULL DEFAULT '-',
  `catid` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY     (itemid)
);

CREATE TABLE IF NOT EXISTS `status` (
  `statusid` smallint unsigned NOT NULL auto_increment,
  `created` date NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY     (statusid)
);

CREATE TABLE IF NOT EXISTS `categorys` (
  `catid` smallint unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `created` datetime NOT NULL,  
  PRIMARY KEY     (catid)
);
