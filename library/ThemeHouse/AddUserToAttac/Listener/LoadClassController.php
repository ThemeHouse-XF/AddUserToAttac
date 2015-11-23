<?php
						
class ThemeHouse_AddUserToAttac_Listener_LoadClassController extends ThemeHouse_Listener_LoadClass
{
	public static function loadClassController($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_ControllerPublic_Attachment':
				self::_extend('ThemeHouse_AddUserToAttac_ControllerPublic_Attachment', $extend);
				break;
		}
	}
}