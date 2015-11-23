<?php
						
class ThemeHouse_AddUserToAttac_ControllerPublic_Attachment extends XFCP_ThemeHouse_AddUserToAttac_ControllerPublic_Attachment
{
	/**
	 * Viewing an attachment.
	 *
	 * @return XenForo_ControllerResponse_Abstract
	 */
	public function actionIndex()
	{
		/* @var $response XenForo_ControllerResponse_View */
		$response = parent::actionIndex();
		
		if (get_class($response) == 'XenForo_ControllerResponse_View')
		{
			/* @var $xenOptions XenForo_Options */
			$xenOptions = XenForo_Application::get('options');
			
			$visitor = XenForo_Visitor::getInstance()->toArray();
			
			/* @var $userModel XenForo_Model_User */
			$userModel = XenForo_Model::create('XenForo_Model_User');
			
			$userGroupIds = array_keys($xenOptions->th_addUserToAttach_userGroups);
			foreach ($userGroupIds as $userGroupId)
			{
				if ($userModel->isMemberOfUserGroup($visitor, $userGroupId))
				{
					$response->params['attachment']['filename'] = '['.$visitor['username'].']'.$response->params['attachment']['filename'];
					break;
				}
			}
		}
				
		return $response;
	}
}