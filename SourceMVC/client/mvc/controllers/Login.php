<?php
class Login extends Controller
{
    function handleLogin()
    {
        $account = $this->model("AccountModel");
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!$account->checkAccount($username)) {
            echo 'notvalid';
        } else if ($password != $account->checkAccount($username)['password']) {
            echo 'error';
        } else {
            $user = array(
                'username' => $username,
            );
            set_logged($user);
            echo 'user';
        }
    }
    function Logout()
    {
        doLogout();
        header("Location: http://localhost/SmartLedSystem/SourceMVC/client/");
    }
}
