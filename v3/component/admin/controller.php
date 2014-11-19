<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class TawkWidgetController extends JControllerLegacy {

	function display($cachable = false, $urlparams = false) {

		$model = parent::getModel('TawkWidget', 'TawkWidgetModel', array('ignore_request' => true));

		$widget = $model->getWidget();

		// set default view if not set
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'tawkwidget'));

		// call parent behavior
		parent::display(false);
	}

	function setwidget() {
		header('Content-Type: application/json');

		if(!isset($_POST['pageId']) || !isset($_POST['widgetId'])) {
			echo json_encode(array("success" => FALSE));
			die();
		}

		$model = parent::getModel('TawkWidget', 'TawkWidgetModel', array('ignore_request' => true));

		$model->setWidget($_POST['pageId'], $_POST['widgetId']);

		echo json_encode(array("success" => TRUE));
		die();
	}

	function removewidget() {
		header('Content-Type: application/json');

		$model = parent::getModel('TawkWidget', 'TawkWidgetModel', array('ignore_request' => true));

		$model->removeWidget();

		echo json_encode(array("success" => TRUE));
		die();
	}
}