<?php
include "../../middleware/getBusinessChanceRequest.php";
include "../../database/DB.module.php";
include "../../services/auth/jwt.Module.php";

    /**
     * select Customer Oportunities Controller
     */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    checkAuth();
    $businessChance = getBusinessChanceRequest();

    $customerResp = getCustomerOportunitiesByNameAndYear($businessChance);

    echo json_encode($customerResp);
}
