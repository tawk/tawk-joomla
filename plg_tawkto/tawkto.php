<?php
/*------------------------------------------------------------------------
# plg_tawkto - tawk.to
# ------------------------------------------------------------------------
# version 3.0.3
# author tawk.to
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://tawk.to
# Technical Support: http://tawk.to
-------------------------------------------------------------------------*/

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgSystemtawkto extends JPlugin
{
	function __construct( &$subject, $params )
	{
		parent::__construct($subject, $params);

	}

	function onBeforeCompileHead()
	{
		$document = JFactory::getDocument();

		if (strcmp(substr(JURI::base(), -15), "/administrator/")!=0)	// Apply tawk.to script only to front-end.
		{
			if (strcmp($this->params->get('tawkto_siteid'),'')!=0)
			{
				$tawkto_siteid = $this->params->get('tawkto_siteid');
				$tawkto_widget = strtolower($this->params->get('tawkto_widget'));
				$script = '
					var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
					(function(){
					var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
					s1.async=true;
					s1.src="https://embed.tawk.to/'.$tawkto_siteid.'/'.$tawkto_widget.'";
					s1.charset="UTF-8";
					s1.setAttribute("crossorigin","*");
					s0.parentNode.insertBefore(s1,s0);
					})();
				';
				$document->addScriptDeclaration($script);
			}
		}
	}
}
