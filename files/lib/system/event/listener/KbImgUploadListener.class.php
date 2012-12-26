<?php
// wcf imports
require_once (WCF_DIR . 'lib/system/event/EventListener.class.php');

/** 
 * @author 	Tobias Vorwachs
 * @copyright 	2012 Tobias Vorwachs
 * @license	LGPL
 * @package	de.kbimg.uploader
 */
class KbImgUploadListener implements EventListener {
	
	/**
	 * @var string
	 */
	protected $template = 'kbimgupload';
	
	/**
	 * @var string
	 */
	protected $permissions = 'user.message.kbimgupload.canUse';

	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if(!KBIMGUPLOAD_MODULEACTIVATION) return;
		if(!WCF::getUser()->getPermission($this->permissions)) return;
		
		$tabCode = '<li id="kbimguploadTab">';
		$tabCode .= '<a onclick="tabbedPane.openTab(\'kbimgupload\');">';
		$tabCode .= '<span>' . WCF::getLanguage()->get('wcf.upload.kbimgupload.title') . '</span>';
		$tabCode .= '</a></li>';
		
		WCF::getTPL()->append(array(
			
			'additionalTabs' => $tabCode,
			'additionalSubTabs' => WCF::getTPL()->fetch($this->template)
		));
	
	}
}
?>