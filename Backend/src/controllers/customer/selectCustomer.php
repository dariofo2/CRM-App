<?php
    include "../../middleware/getCustomerRequest.php";
    include "../../database/DB.module.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $customer=getCustomerRequest();

        $customerResp=selectCustomer($customer);

        if ($customerResp) echo json_encode($customerResp);
        else throw new Exception("Customer not Found");
    }
?>