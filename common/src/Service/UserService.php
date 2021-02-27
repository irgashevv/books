<?php 


class UserService
{
	public static function getCurrentUser()
	{
	    $user = $_SESSION['current_user'] ?? null;

	    return  !empty($user) ? unserialize($user) : [];

	}

	public static function saveUserData($user)
    {
        $_SESSION['current_user'] = serialize($user);
    }

}