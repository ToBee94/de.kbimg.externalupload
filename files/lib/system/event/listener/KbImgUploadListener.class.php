<?php
// wcf imports
require_once (WCF_DIR . 'lib/system/event/EventListener.class.php');

/** 
 * @author 	Tobias Vorwachs
 * @copyright 	2012 Tobias Vorwachs
 * @license	LGPL
 * @package	de.kbimg.externalupload
 */
class KbImgUploadListener implements EventListener {
	/**
	 * @see	Eventlistener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if(!MODULE_KBIMG_UPLOAD) return;
		if(!WCF::getUser()->getPermission('user.message.kbimgupload.canUse')) return;
		
		$tabCode = '<li id="kbimgUploadTab">';
		$tabCode .= '<a onclick="tabbedPane.openTab(\'kbimgUpload\');">';
		$tabCode .= '<span>' . WCF::getLanguage()->get('wcf.upload.kbimgupload.title') . '</span>';
		$tabCode .= '</a></li>';
		
		WCF::getTPL()->append(array(
			'additionalTabs' => $tabCode,
			'additionalSubTabs' => WCF::getTPL()->fetch('kbimgUpload')
		));
	}
}
?>