<?php
    //include (dirname(__FILE__) . "/../models/user.entity.php");
    //include (dirname(__FILE__).  "/../connection/connectDB.php");

    /**
     * Insert User to Database
     * @param User $user The user Req Object with ALL DATA
     */
    function insertUser (User $user) {
        global $conn;

        $email=$user->email;
        $password=hash("sha256",$user->password);
        $name=$user->name;
        $surname=$user->surname;

        $preparedStatement=$conn->prepare("insert into user (email,password,name,surname) values (?,?,?,?)");
        
        $preparedStatement->execute([$email,$password,$name,$surname]);

    }

    /**
     * Delete User from Database
     * @param User $user The user Req Object with ID
     */
    function deleteUser (User $user) {
        global $conn;

        $id=$user->id;
        
        $preparedStatement=$conn->prepare("delete from user where id=?");
        //$preparedStatement->bindParam("i",$id);

        $preparedStatement->execute([$id]);
    }

    /**
     * Used For Login
     * @param User $user The user Req Object with Email and Password
     * @return ?User
     */
    function selectUserByEmailPassword(User $user) : ?User {
        global $conn;

        $email=$user->email;
        $password=hash("sha256",$user->password);

        $preparedStatement=$conn->prepare("select * from user where email=? AND password=?");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$email,$password]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $users=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$v) {
          $newUser=new User($v['id'],$v['email'],null,$v['name'],$v['surname']);
          array_push($users,$newUser);
        }
        //echo $users;
        //Check if finded One at Least
        if (count($users)>=1) return $users[0];
        else return null;
    }

    /**
     * Select all Users From Database
     * @return User[]
     */
    function selectUsers() : array {
        global $conn;

        $result=$conn->query("select * from user");
        $usersResponse=[];
        foreach ($result as $data) {
            $user=new User($data['id'],$data['email'],null,$data['name'],$data['surname']);
            array_push($usersResponse,$user);
        }

        return $usersResponse;
    }


    /**
     * Update User from Database
     * @param User $user The user Req Object to Delete with ALL DATA
     * @return void
     */
    function updateUser (User $user) : void {
        global $conn;

        $id=$user->id;
        $email=$user->email;
        $password=hash("sha256",$user->password);
        $name=$user->name;
        $surname=$user->surname;

        $preparedStatement=$conn->prepare("update user set email=? , password=? , name=? , surname=? where id=?");
        //$preparedStatement->bindParam("ssssi",$email,$password,$name,$surname);
        $preparedStatement->execute([$email,$password,$name,$surname,$id]);
    }
    

?>