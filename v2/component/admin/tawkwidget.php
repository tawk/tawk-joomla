<?php

/**
 * @package Tawk.to Widget for Joomla! 2.5
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

$controller = JController::getInstance('TawkWidget');

$task = JFactory::getApplication()->input->getCmd('task');

$controller->execute($task);

$controller->redirect();