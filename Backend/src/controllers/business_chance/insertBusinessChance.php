<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";

    /**
     * Insert BusinessChance Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        
       $businessChance=getBusinessChanceRequest();

        insertBusinessChance($businessChance);
    }
?>