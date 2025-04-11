<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $customer=getCustomerRequest();

        $customersResp=selectCustomers($customer);

        echo json_encode($customersResp);
    }
?>