<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorlds View
 */
class TawkWidgetViewTawkWidget extends JViewLegacy {
	/**
	 * HelloWorlds view display method
	 * @return void
	 */
	function display($tpl = null) {
			$this->addToolBar();
			parent::display($tpl);
	}

	public function getBaseUrl() {
		return 'https://plugins.tawk.to';
	}

	public function getIframeUrl() {
		$model = parent::getModel('TawkWidget', 'TawkWidgetModel', array('ignore_request' => true));

		$widget = $model->getWidget();

		return "https://plugins.tawk.to/generic/widgets"
			."?currentPageId=".$widget->page_id
			."&currentWidgetId=".$widget->widget_id;
	}

	protected function addToolBar() {
		JToolBarHelper::title('Tawk.to widget');
	}
}