<?php

include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class AuthController
{
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

	public function check()
	{
	    $login = htmlspecialchars($_POST['login']);
	    $password = htmlspecialchars($_POST['password']);

	    // TODO Get user from DB

	    if (!$this->securityService->checkPassword($login, $password))
	    {
	        throw new Exception('Incorrect Login or Password', 403);
        }
	    // TODO Fix User Data
	    UserService::saveUserData(
	        [
                'id' => 1,
                'login' => $login,
                'role' => 'guest'
            ]);
	    SecurityService::redirectToStartPage();
    }
}