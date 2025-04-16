<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    
    /**
     * Select Customer Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
        $customer=getCustomerRequest();

        $customerResp=selectCustomer($customer);

        if ($customerResp) echo json_encode($customerResp);
        else throw new Exception("Customer not Found");
    }
?>