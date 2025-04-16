<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    /**
     * Select BusinessChances By CustomerId Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        
        $businessChance=getBusinessChanceRequest();

        $businessChancesResp=selectBusinessChancesByCustomerId($businessChance);

        echo json_encode($businessChancesResp);
    }
?>