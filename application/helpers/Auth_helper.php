<?php
defined('BASEPATH') OR exit('no direct access');

    function isLogin($sessionType)
    {
        if(empty($_SESSION[$sessionType])){
            redirect(base_url('Welcome/'));
        }

    }

