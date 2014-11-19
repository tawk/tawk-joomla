--
-- @package Tawk.to Widget for Joomla! 3.2
-- @author Tawk.to
-- @copyright (C) 2014- Tawk.to
-- @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
--


DROP TABLE IF EXISTS `#__tawkwidget`;

CREATE TABLE `#__tawkwidget` (
	`id` int(10) NOT NULL,
	`page_id` varchar(50),
	`widget_id` varchar(50),
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;