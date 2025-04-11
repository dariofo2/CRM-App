<?php
    include "../../middleware/getUserRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $user=getUserRequest();

        insertUser($user);
    }
?>