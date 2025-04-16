<?php
    //include (dirname(__FILE__) . "/../database/models/user.entity.php");
    /**
     * Gets a BusinessChanceRequest and transform it into a BusinessChance Object To interact
     * @return Business_chance The Req Object Transformed
     */
    function getBusinessChanceRequest () : Business_chance {
        $id=null;
        $customerId=null;
        $name=null;
        $status=null;
        $date=null;

        if (isset($_POST['id'])) $id=$_POST['id'];
        if (isset($_POST['customerId'])) $customerId=$_POST['customerId'];
        if (isset($_POST['name'])) $name=$_POST['name'];
        if (isset($_POST['status'])) $status=$_POST['status'];
        if (isset($_POST['date'])) $date=$_POST['date'];
        if (isset($_POST['customer'])) $customer=json_decode($_POST['customer']); else $customer=null;
        
        $date=new DateTime($date);
        $businessChanceReq=new Business_chance($id,$customerId,$name,$status,$date,$customer);

        return $businessChanceReq;
    }
?>