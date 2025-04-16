<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    
    /**
     * Insert Customer Controller
     */
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        checkAuth();
       $customer=getCustomerRequest();

        insertCustomer($customer);
    }
?>