DROP TABLE IF EXISTS `{#}load_average_peak`;
CREATE TABLE `{#}load_average_peak` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` tinyint(1) unsigned DEFAULT NULL,
  `date_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date_pub` (`date_pub`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
