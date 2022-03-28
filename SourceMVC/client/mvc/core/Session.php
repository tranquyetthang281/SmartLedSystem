<?php

session_start();
function ss_set($key, $item)
{
    $_SESSION[$key] = $item;
}
function ss_get($key)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
}

function ss_delete($key)
{
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}
