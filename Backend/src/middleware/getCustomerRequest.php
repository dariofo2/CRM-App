<?php
    //include (dirname(__FILE__) . "/../database/models/user.entity.php");

    /**
     * Gets a CustomerRequest and transform it into a Customer Object To interact
     * @return Customer The Customer Req Object Transformed
     */
    function getCustomerRequest () : Customer {
        $id=null;
        $name=null;
        $surname=null;
        $phone=null;
        $enterprise=null;
        $address=null;
        $date=null;

        if (isset($_POST['id'])) $id=$_POST['id'];
        if (isset($_POST['name'])) $name=$_POST['name'];
        if (isset($_POST['surname'])) $surname=$_POST['surname'];
        if (isset($_POST['phone'])) $phone=$_POST['phone'];
        if (isset($_POST['enterprise'])) $enterprise=$_POST['enterprise'];
        if (isset($_POST['address'])) $address=$_POST['address'];
        if (isset($_POST['date'])) $date=new DateTime($_POST['date']);

        $customerReq=new Customer($id,$name,$surname,$phone,$enterprise,$address,$date,[]);

        return $customerReq;
    }
?>