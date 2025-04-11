<?php
    include "../../middleware/getBusinessChanceRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $businessChance=getBusinessChanceRequest();

        $businessChanceResp=selectBusinessChance($businessChance);

        if ($businessChanceResp) echo json_encode($businessChanceResp);
        else throw new Exception("BusinessChance not Found");
    }
?>