<?php
    include "../../middleware/getUserRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        $user=getUserRequest();

        $users=selectUsers($user);

        echo json_encode($users);
    }
?>