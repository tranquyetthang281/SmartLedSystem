<?php
class Account extends Controller
{
    public $data = array();

    function __construct()
    {
        $this->data['render'] = 'Account';
    }
    function Show()
    {
        if (is_logged()) {
            $account = $this->model("AccountModel");
            $account = $account->checkAccount(is_logged()['username']);
            $this->data['userInfo'] = $account;
            $this->view("Main", $this->data);
        } else echo 'ERROR';
    }
}
