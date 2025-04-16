<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    /**
     * Update BusinessChance Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        
        $businessChance=getBusinessChanceRequest();

        updateBusinessChance($businessChance);
    }
?>