<?php
    //include (dirname(__FILE__) . "/../database/models/user.entity.php");
    function getUserRequest () : User {
        $id=null;
        $email=null;
        $password=null;
        $name=null;
        $surname=null;

        //if (isset($_POST['id'])) $id=$_POST['id'];
        if (isset($_REQUEST['payload']['id'])) $id=$_REQUEST['payload']['id'];
        if (isset($_POST['email'])) $email=$_POST['email'];
        if (isset($_POST['password'])) $password=$_POST['password'];
        if (isset($_POST['name'])) $name=$_POST['name'];
        if (isset($_POST['surname'])) $surname=$_POST['surname'];

        //echo $id;
        $userReq=new User($id,$email,$password,$name,$surname);

        return $userReq;
    }
?>