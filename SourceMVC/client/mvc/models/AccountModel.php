<?php
class AccountModel extends Database
{
    function checkAccount($username)
    {
        $sql = "SELECT * FROM app_user WHERE username ='$username'";
        return $this->get_one($sql);
    }
}
