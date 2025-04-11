<?php
    //include (dirname(__FILE__) . "/../database/models/user.entity.php");
    function getCustomerRequest () : Customer {
        $id=null;
        $name=null;
        $surname=null;
        $phone=null;
        $enterprise=null;
        $address=null;

        if (isset($_POST['id'])) $id=$_POST['id'];
        if (isset($_POST['name'])) $name=$_POST['name'];
        if (isset($_POST['surname'])) $surname=$_POST['surname'];
        if (isset($_POST['phone'])) $phone=$_POST['phone'];
        if (isset($_POST['enterprise'])) $enterprise=$_POST['enterprise'];
        if (isset($_POST['address'])) $address=$_POST['address'];

        echo $id;
        $customerReq=new Customer($id,$name,$surname,$phone,$enterprise,$address,[]);

        return $customerReq;
    }
?>