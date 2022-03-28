<?php

require_once "Session.php";

function is_logged()
{
    return isset($_SESSION['token_user']) ? $_SESSION['token_user'] : false;
}
function set_logged($username)
{
    ss_set('token_user', $username);
}
function doLogout()
{
    if (isset($_SESSION['token_user'])) {
        unset($_SESSION['token_user']);
    }
}
