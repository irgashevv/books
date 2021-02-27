<?php

include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class AuthController
{
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

	public function check()
	{
	    $email = htmlspecialchars($_POST['login']);
	    $password = htmlspecialchars($_POST['password']);
        $user = (new User())->getByEmail($email);


	    if (!$this->securityService->checkPassword($user, $password))
	    {
	        throw new Exception('Incorrect Login or Password', 403);
        }
	    // TODO Fix User Data
	    UserService::saveUserData(
	        [
                'id' => $user['id'],
                'login' => $user['email'],
                'role' => json_encode($user['roles'], true)
            ]);
	    SecurityService::redirectToStartPage();
    }
}