<?php
    /**
     * User Entity of Database
     */
    class User {
        public ?int $id;
        public ?string $email;
        public ?string $password;
        public ?string $name;
        public ?string $surname;

        function __construct(?int $id,?string $email,?string $password,?string $name,?string $surname) {
            $this->id=$id;
            $this->email=$email;
            $this->password=$password;
            $this->name=$name;
            $this->surname=$surname;
        }
    }
?>