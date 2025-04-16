<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    
    /**
     * Select Customers Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        $customer=getCustomerRequest();

        $customersResp=selectCustomers($customer);

        echo json_encode($customersResp);
    }
?>