<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BbiiController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
//	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $bbii_breadcrumbs=array();
	
	/**
	 * Determine whether user has administrator authorization rights
	 * @return boolean
	 */
	public function isAdmin() {
		$userId = Yii::app()->user->id;
		if($userId === null) {
			return false;		// not authenticated
		} else {
			if($this->module->adminId && $this->module->adminId == $userId) {
				return true;	// by module parameter assigned admin
			}
			if(Yii::app()->authManager && Yii::app()->user->checkAccess('admin')) {
				return true;	// rbac role "admin"
			}
		}
		return false;
	}
	
	/**
	 * Determine whether user has administrator authorization rights
	 * @return boolean
	 */
	public function isModerator() {
		$userId = Yii::app()->user->id;
		if($userId === null) {
			return false;		// not authenticated
		} else {
			if($this->isAdmin()) {
				return true;
			}
			if(Yii::app()->authManager && Yii::app()->user->checkAccess('moderator')) {
				return true;	// rbac role "moderator"
			}
			if(BbiiMember::model()->cache(900)->moderator()->exists("id = $userId")) {
				return true;	// member table moderator value set
			}
		}
		return false;
	}
}