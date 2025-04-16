<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    /**
     * Select BusinessChances Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        
        $businessChance=getBusinessChanceRequest();

        $businessChancesResp=selectBusinessChances($businessChance);

        echo json_encode($businessChancesResp);
    }
?>