

CREATE TABLE IF NOT EXISTS `basic_info` (
  `basicinfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `networks` varchar(255) NOT NULL DEFAULT 'None',
  `interested_in` varchar(30) NOT NULL DEFAULT 'Women',
  `rel_stats` varchar(30) NOT NULL DEFAULT 'Single',
  `language` varchar(255) NOT NULL DEFAULT 'None',
  `religion` varchar(255) NOT NULL DEFAULT 'None',
  `rel_desc` text NOT NULL,
  `political_view` varchar(255) NOT NULL,
  `pol_desc` text NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`basicinfo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;



CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `to` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;


CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pri` varchar(12) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;



CREATE TABLE IF NOT EXISTS `subcomment` (
  `subc_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `subauthor` varchar(255) NOT NULL,
  `subcontent` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`subc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;


CREATE TABLE IF NOT EXISTS `user_info` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL unique,
  `pword` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;


CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
`member_id_one` int(11) NOT NULL,
 `member_id_two` int(11) NOT NULL,
 `friend_offical` ENUM("0","1") NOT NULL,
 `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

CREATE TABLE IF NOT EXISTS `like` (
`bookmark_id` int(11) NOT NULL AUTO_INCREMENT,
`fan_id` int(11) NOT NULL, 
`post_number` int(11) NOT NULL,
PRIMARY KEY (`bookmark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;


CREATE TABLE IF NOT EXISTS `dislike` (
`bookmark_id` int(11) NOT NULL AUTO_INCREMENT,
`fan_id` int(11) NOT NULL,
`post_number` int(11) NOT NULL,
PRIMARY KEY (`bookmark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;




CREATE TABLE IF NOT EXISTS `messages` (
`messageid` int(11) NOT NULL AUTO_INCREMENT,
`sender_id` int(11) NOT NULL,
`receiver_id` int(11) NOT NULL,
`message` varchar(5000) NOT NULL,
`date` datetime NOT NULL,
PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `member_notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `notice_txt` varchar(120) NOT NULL,
  `notice_time` datetime NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `member_warning` (
  `member_id` int(11) NOT NULL,
  `warning_txt` varchar(200) NOT NULL,
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(7) NOT NULL AUTO_INCREMENT,
  `member_id` int(7) NOT NULL,
  `feedback_txt` varchar(120) NOT NULL,
  `star` varchar(1) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(40) NOT NULL,
  `pword` varchar(60) NOT NULL,

  PRIMARY KEY (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10000 ;
