<?php

/**
 * @package Tawk.to Widget for Joomla! 3.2
 * @author Tawk.to
 * @copyright (C) 2014- Tawk.to
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>


<iframe
	id="tawkIframe"
	src=""
	style="min-height: 300px; width : 100%; border: none">
</iframe>

<script type="text/javascript">
	var currentHost = window.location.protocol + "//" + window.location.host;
	var url = "<?php echo $this->getIframeUrl() ?>&parentDomain=" + currentHost;

	jQuery('#tawkIframe').attr('src', url);

	var iframe = jQuery('#tawk_widget_customization')[0];

	window.addEventListener('message', function(e) {
		if(e.origin === '<?php echo $this->getBaseUrl() ?>') {

			if(e.data.action === 'setWidget') {
				setWidget(e);
			}

			if(e.data.action === 'removeWidget') {
				removeWidget(e);
			}
		}
	});

	function setWidget(e) {
		jQuery.post('index.php?option=com_tawkwidget&task=setwidget', {
			pageId : e.data.pageId,
			widgetId : e.data.widgetId
		}, function(r) {
			if(r.success) {
				e.source.postMessage({action: 'setDone'}, '<?php echo $this->getBaseUrl() ?>');
			} else {
				e.source.postMessage({action: 'setFail'}, '<?php echo $this->getBaseUrl() ?>');
			}
		});
	}

	function removeWidget(e) {
		jQuery.post('index.php?option=com_tawkwidget&task=removewidget', function(r) {
			if(r.success) {
				e.source.postMessage({action: 'removeDone'}, '<?php echo $this->getBaseUrl() ?>');
			} else {
				e.source.postMessage({action: 'removeFail'}, '<?php echo $this->getBaseUrl() ?>');
			}
		});
	}
</script>