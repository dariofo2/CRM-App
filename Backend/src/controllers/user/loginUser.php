<?php
    include "../../middleware/getUserRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $user=getUserRequest();
        
        $userResp=selectUserByEmailPassword($user);

        if ($userResp) echo json_encode($userResp);
        else throw new Exception("Incorrect User");
    }
?>