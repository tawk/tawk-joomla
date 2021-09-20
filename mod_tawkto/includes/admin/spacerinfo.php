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
defined('_JEXEC') or die('Direct access to this location is not allowed.');

jimport('joomla.form.formfield');

JHtml::_('jquery.framework');

class JFormFieldSpacerinfo extends JFormField
{
	protected $type = 'Spacerinfo';

	public function getInput()
	{
		$output = "";
		$output .= '<style type="text/css">
		#jform_params_tawkto_siteid-lbl,
		#jform_params_tawkto_siteid,
		#jform_params_tawkto_widget-lbl,
		#jform_params_tawkto_widget{
			display:none;
		}

		.tawk_header{
			width:100%;
		}
		.tawk_logo{
			float:left;
			width:10%;
			min-width: 75px;
			max-width: 75px;
		}
		.tawk_logo img{
			width:75px;
			height:80px;
		}
		.tawk_headertxt{
		    float: left;
		    font-size: 1.7rem;
		    padding-left: 25px;
		    padding-top: 25px;
		    width: 90%;
		}
		.tawk_links{
			margin:25px 0;
			float: left;
			width:100%;
		}
		.tawkto_link{
			color: #7fb06f;
    		text-decoration: none;
		}
		.tawkto_link:hover{
    		text-decoration: none;
		}
		</style>';

		$output .= '
		<div class="tawk_header">

			<div class="tawk_logo">
			<img src="../modules/mod_tawkto/includes/images/logo.png"/>
			</div>

			<div class="tawk_headertxt">
				tawk.to Module Settings
			</div>
			<div class="tawk_links">
				Having trouble and need some help? Check out our <a class="tawkto_link" target="_blank" href="https://www.tawk.to/knowledgebase/">Knowledge Base</a>.
			</div>

		</div>

		<iframe
			id="tawkIframe"
			src=""
			style="min-height: 300px; width : 100%; border: none">
		</iframe>

		<script type="text/javascript">
			jQuery(function( $ ) {
				var currentHost = window.location.protocol + "//" + window.location.host;
				var currentsideId = jQuery("#jform_params_tawkto_siteid").val();
				var currentwidgetId = jQuery("#jform_params_tawkto_widget").val();
				var url = "'.$this->getBaseUrl().'/generic/widgets/?currentPageId="+currentsideId+"&currentWidgetId="+currentwidgetId+"&pltf=joomla&parentDomain=" + currentHost;

				jQuery("#tawkIframe").attr("src", url);
			});

			window.addEventListener("message", function(e) {
				if(e.origin === "'.$this->getBaseUrl().'") {

					if(e.data.action === "setWidget") {
						setWidget(e);
					}

					if(e.data.action === "removeWidget") {
						removeWidget(e);
					}

					if(e.data.action === "reloadHeight") {
						reloadIframeHeight(e.data.height);
					}
				}
			});

			function setWidget(e) {
				jQuery("#jform_params_tawkto_siteid").val(e.data.pageId);
				jQuery("#jform_params_tawkto_widget").val(e.data.widgetId);
				e.source.postMessage({action: "setDone"}, "'.$this->getBaseUrl().'");
			}

			function removeWidget(e) {
				jQuery("#jform_params_tawkto_siteid").val("");
				jQuery("#jform_params_tawkto_widget").val("");
				e.source.postMessage({action: "removeDone"}, "'.$this->getBaseUrl().'");
			}

			function reloadIframeHeight(height) {
				if (!height) {
					return;
				}

				var iframe = jQuery("#tawkIframe");
				if (height === iframe.height()) {
					return;
				}

				iframe.height(height);
			}
		</script>
		';

		return $output;
	}

	public function getBaseUrl() {
		return 'https://plugins.tawk.to';
	}
}
?>