<?php

class SecurityService
{
    public function checkPassword($login, $password)
    {
        // TODO Check
        return true;
    }

    public static function redirectToStartPage()
    {
        header("location: http://localhost/shop/frontend/index.php");
        die();
    }

    public static function redirectToLoginPage()
    {
        header("location: http://localhost/shop/frontend/index.php?model=site&action=login");
        die();
    }
}