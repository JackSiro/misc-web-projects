
CREATE TABLE IF NOT EXISTS `pupils` (
  `pupilid` smallint unsigned NOT NULL auto_increment,
  `joined` date NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `admno` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `pterm` varchar(50) NOT NULL,
  `pclass` varchar(50) NOT NULL,
  `math` varchar(50) NOT NULL DEFAULT '-',
  `eng` varchar(50) NOT NULL DEFAULT '-',
  `kisw` varchar(50) NOT NULL DEFAULT '-',
  `sci` varchar(50) NOT NULL DEFAULT '-',
  `sos` varchar(50) NOT NULL DEFAULT '-',
  `cre` varchar(50) NOT NULL DEFAULT '-',
  `avrg` varchar(50) NOT NULL DEFAULT '-',
  `tot` varchar(50) NOT NULL DEFAULT '-',
  `code` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY     (pupilid)
);

CREATE TABLE IF NOT EXISTS `schools` (
  `schoolid` smallint unsigned NOT NULL auto_increment,
  `created` date NOT NULL,
  `schoolname` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `subcounty` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY     (schoolid)
);
