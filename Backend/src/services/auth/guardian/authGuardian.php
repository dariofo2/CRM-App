<?php

    /**
     * Checks Auth Verifying JWT Token with JWT Key. If false, return a HTTP Response Error (401) Unathorized
     */
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

    /**
     * Split and Checks Token Format (Has to be "Bearer eyxxxxxxxxxxxx")
     * @param string $token The JWT Token
     * @return string The Token Part without "Bearer"
     */
    function getTokenAndCheck (string $token) :string {
        $tokenSplit=explode(" ",$token);
        if (!$tokenSplit[0]=="Bearer" || !isset($tokenSplit[1])) {
            http_response_code(401);
            exit;
        }
        return ($tokenSplit[1]);
    }
?>