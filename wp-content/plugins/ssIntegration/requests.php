<?php

require_once "ssIntegration.php";

if($_POST['type'] == "login"){
    check_credentials();
}
elseif($_POST['type'] == "logout"){
    logout();
}