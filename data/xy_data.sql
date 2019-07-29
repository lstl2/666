CREATE TABLE `manage_user` (
  `mg_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(30) NOT NULL,
  `user_pw` text NOT NULL,
  `modi_date` datetime NOT NULL,
  PRIMARY KEY  (`mg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


CREATE TABLE `sys_info` (
  `sys_id` int(11) NOT NULL auto_increment,
  `sys_note1` text NOT NULL,
  `sys_note2` text NOT NULL,
  `modi_date` datetime NOT NULL,
  PRIMARY KEY  (`sys_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE `ly` (
  `ly_id` int(11) NOT NULL auto_increment,
  `head` text NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `hf_content` text NOT NULL,
  `modi_date` datetime NOT NULL,
  PRIMARY KEY  (`ly_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;