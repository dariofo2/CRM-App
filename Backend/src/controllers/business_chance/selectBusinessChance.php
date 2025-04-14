<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();

        $businessChance=getBusinessChanceRequest();

        $businessChanceResp=selectBusinessChance($businessChance);

        if ($businessChanceResp) echo json_encode($businessChanceResp);
        else throw new Exception("BusinessChance not Found");
    }
?>