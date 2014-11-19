<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JModelLegacy::addIncludePath(JPATH_SITE . '/plugins/system/tawkwidget/models');

class plgSystemTawkwidget extends JPlugin {

	private $tawkWidgetShown = false;

	function onBeforeCompileHead() {
		$model = JModelLegacy::getInstance('TawkWidget', 'TawkWidgetModel', array('ignore_request' => true));
		$widget = $model->getWidget();

		if(!$widget->page_id || !$widget->widget_id) {
			return;
		}

		$this->showWidget($widget);
	}

	private function getEmbedUrl($widget) {
		return 'https://embed.tawk.to/'.$widget->page_id.'/'.$widget->widget_id;
	}

	private function showWidget($widget) {
		if($this->tawkWidgetShown) {
			return;
		}

		$app = JFactory::getApplication();

		if($app->isAdmin()) {
			return;
		}

		$this->tawkWidgetShown = true;

		$document = JFactory::getDocument();

		$script = '
			var $_Tawk_API={},$_Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src="' . $this->getEmbedUrl($widget) .'";
			s1.charset="UTF-8";
			s1.setAttribute("crossorigin","*");
			s0.parentNode.insertBefore(s1,s0);
			})();';

		$document->addScriptDeclaration($script);
	}
}