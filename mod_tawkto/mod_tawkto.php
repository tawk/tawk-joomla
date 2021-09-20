<?php
/*------------------------------------------------------------------------
# mod_tawkto - tawk.to
# ------------------------------------------------------------------------
# version 3.0.3
# author tawk.to
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://tawk.to
# Technical Support: http://tawk.to
-------------------------------------------------------------------------*/

// No direct access.
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

// Main code.
$document = JFactory::getDocument();

if (strcmp($params->get('tawkto_siteid'),'')!=0)
{
	$tawkto_siteid = $params->get('tawkto_siteid');
	$tawkto_widget = strtolower($params->get('tawkto_widget'));

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

?>