<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    include "config_local.php";
}else{
    include "config_online.php";
}

?>