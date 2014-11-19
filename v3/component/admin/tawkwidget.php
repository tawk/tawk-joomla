<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

$controller = JControllerLegacy::getInstance('TawkWidget');

$task = JFactory::getApplication()->input->getCmd('task');

$controller->execute($task);

$controller->redirect();