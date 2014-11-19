<?php
/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die();

class PlgSystemTawkwidgetInstallerScript
{

	public function install ($parent) {

		$query = "update #__extensions set enabled=1 where type = 'plugin' and element = 'tawkwidget'";

		$db = JFactory::getDBO();
		$db->setQuery($query);
		$db->query();
	}

	public function update ($parent){}

	public function uninstall ($parent){}

	public function preflight ($type, $parent){}

	public function postflight ($type, $parent){}

	private function run ($query){}
}