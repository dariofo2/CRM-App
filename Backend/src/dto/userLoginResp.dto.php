<?php
    class UserLoginResp {
        public ?int $id;
        public ?string $email;
        public ?string $password;
        public ?string $name;
        public ?string $surname;
        public ?string $jwtToken;

        function __construct(?int $id,?string $email,?string $password,?string $name,?string $surname,?string $jwtToken) {
            $this->id=$id;
            $this->email=$email;
            $this->password=$password;
            $this->name=$name;
            $this->surname=$surname;
            $this->jwtToken=$jwtToken;
        }
    }
?>