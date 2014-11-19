<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
jimport('joomla.application.component.table');
JTable::addIncludePath(JPATH_SITE . '/plugins/system/tawkwidget/tables');

class TawkWidgetModelTawkWidget extends JModelItem {
	protected $widget;

	public function getTable($type = 'TawkWidget', $prefix = 'TawkWidgetTable', $config = array()) {
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getWidget() {
		if(isset($this->widget)) {
			return $this->widget;
		}

		$this->widget = $this->getTable();
		$this->widget->load(1);

		return $this->widget;
	}
}