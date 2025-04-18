<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    include "../../dto/businessChanceCountStatus.dto.php";

    /**
     * Select BusinessChances Count By Status
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        
        $businessChance=getBusinessChanceRequest();

        $businessChancesResp=selectBusinessChancesCountByStatus();

        echo json_encode($businessChancesResp);
    }
?>