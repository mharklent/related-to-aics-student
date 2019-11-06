create database relatedtoaics;

use relatedtoaics;

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL auto_increment,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY  (`studentid`)
);