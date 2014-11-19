<?php
/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');


class TawkWidgetTableTawkWidget extends JTable {
	function __construct(&$db) {
		parent::__construct('#__tawkwidget', 'id', $db);
	}
}