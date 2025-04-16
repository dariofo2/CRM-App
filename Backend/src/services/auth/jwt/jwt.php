<?php
/**
 * Encode JWT Token with Payload
 * @param string $secret The secret Key to Validate Token Signature Hash
 * @param array $payload The payload in Associative Array Format
 * @return string The Token
 */
    function encodeJWT (string $secret,array $payload) : string {
        $header= [
            "typ" => "JWT",
            "alg" => "HS256"
        ];

        $payload['iat']=time();
        $payload['nbf']=time();

        $headerEncode = base64URLEncode(json_encode($header));
        $payloadEncode= base64URLEncode(json_encode($payload));
        $signature= base64URLEncode(hash_hmac('sha256',"$headerEncode.$payloadEncode",$secret,true));

        //Create jwt token
        $jwt= "$headerEncode.$payloadEncode.$signature";
        //echo json_encode(['token' => $jwt]);
        return $jwt;
    }

    /**
     * Decode JWT and Returns Payload
     * @param string $token The Token
     * @param string $secret The Secret Key of JWT. Dont Transfer to Anyone and Secure it cause someone getting it could cause a High Security Breach
     * @return array The Payload as Associative Array
     */
    function decodeJWT (string $token,string $secret) :array {
        if (
            preg_match(
                "/^(?<header>.+)\.(?<payload>.+)\.(?<signature>.+)$/",
                $token,
                $matches
            ) !== 1
        ) {

            throw new InvalidArgumentException("invalid token format");
        }

        $signature=hash_hmac("sha256",$matches["header"].".".$matches["payload"],$secret,true);
        $signatureFromToken=base64URLDecode($matches['signature']);

        if (!hash_equals($signature,$signatureFromToken)) {
            throw new Exception("Invalid Signature from JWT");
        }

        $payload=json_decode(base64_decode($matches['payload']),true);
        //echo $payload['iat'];
        return $payload;
    }

    /**
     * Encode for URL (Not +,/ and = characters) with Base64
     */
    function base64URLEncode(string $text): string
    {

        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
    }

    // Again Decode with Base64
    function base64URLDecode(string $text): string
    {
        return base64_decode(
            str_replace(
                ["-", "_"],
                ["+", "/"],
                $text
            )
        );
    }

    //$jwtToken=encodeJWT("hola",[]);
    //decodeJWT($jwtToken,"hola");
?>