<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $businessChance=getBusinessChanceRequest();

        updateBusinessChance($businessChance);
    }
?>