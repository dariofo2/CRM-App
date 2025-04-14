<?php
    include "../../middleware/getUserRequest.php";
    include "../../database/DB.module.php";
    include "../../services/auth/jwt.Module.php";
    include "../../dto/userLoginResp.dto.php";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $user=getUserRequest();

        $userResp=selectUserByEmailPassword($user);

        if (!$userResp) {
            http_response_code(401);
            exit();
        }

        $jwtToken=encodeJWT(
            "hola",
            [
                'id'=>$userResp->id,
                'email'=>$userResp->email,
                'name'=>$userResp->name,
                'surname'=>$userResp->surname
            ]
        );

        $userLoginResp=new UserLoginResp($userResp->id,$userResp->email,null,$userResp->name,$userResp->surname,$jwtToken);

        echo json_encode($userLoginResp);
    }
?>