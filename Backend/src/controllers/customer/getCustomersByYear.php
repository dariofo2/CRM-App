<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    
    /**
     * Select Customers By Year Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        $customer=getCustomerRequest();

        $customersResp=selectCustomersByYear($customer);

        echo json_encode($customersResp);
    }
?>