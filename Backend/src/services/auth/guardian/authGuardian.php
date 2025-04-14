<?php
    function checkAuth () {
        $headers=apache_request_headers();
        $jwtToken=$headers['Authorization'];

        $jwtToken=getTokenAndCheck($jwtToken);
    
        try {
            $payload=decodeJWT($jwtToken,"hola");
        } catch (Exception $e) {
            http_response_code(401);
            exit;
        }
        
        $_REQUEST['payload']=$payload;
    }

    function getTokenAndCheck (string $token) :string {
        $tokenSplit=explode(" ",$token);
        if (!$tokenSplit[0]=="Bearer" || !isset($tokenSplit[1])) {
            http_response_code(401);
            exit;
        }
        return ($tokenSplit[1]);
    }
?>