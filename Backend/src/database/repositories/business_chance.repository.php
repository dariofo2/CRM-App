<?php
    function insertBusinessChance (Business_chance $businessChance) {
        global $conn;

        $customerId=$businessChance->customerId;
        $name=$businessChance->name;
        $status=$businessChance->status;
        $date=$businessChance->date->format("y-m-d");
        
        $preparedStatement=$conn->prepare("insert into business_chance (customerId,name,status,date) values (?,?,?,?)");
        
        $preparedStatement->execute([$customerId,$name,$status,$date]);

    }

    function deleteBusinessChance (Business_chance $businessChance) {
        global $conn;

        $id=$businessChance->id;

        $preparedStatement=$conn->prepare("delete from business_chance where id=?");
        //$preparedStatement->bindParam("i",$id);

        $preparedStatement->execute([$id]);
    }

    /**
     * @return Business_chance[]
     */
    function selectBusinessChances() : array {
        global $conn;

        $result=$conn->query("select * from business_chance");
        $businessChancesResponse=[];
        foreach ($result as $data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],$data['date'],null);
            array_push($businessChancesResponse,$businessChanceNew);
        }

        return $businessChancesResponse;
    }

    function selectBusinessChance (Business_chance $business_chance) : ?Business_chance {
        global $conn;

        $id=$business_chance->id;

        $preparedStatement=$conn->prepare("select * from business_chance where id=?");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$id]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $businessChancesResp=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],$data['date'],null);
            array_push($businessChancesResp,$businessChanceNew);
        }
        //echo $users;
        //Check if finded One at Least
        if (count($businessChancesResp)>=1) return $businessChancesResp[0];
        else return null;
    }


    function updateBusinessChance (Business_chance $businessChance) : void {
        global $conn;

        $id=$businessChance->id;
        $customerId=$businessChance->customerId;
        $name=$businessChance->name;
        $status=$businessChance->status;
        $date=$businessChance->date;

        $preparedStatement=$conn->prepare("update customer set customerId=? , name=? , status=? , date=? where id=?");
        //$preparedStatement->bindParam("ssssi",$email,$password,$name,$surname);
        $preparedStatement->execute([$customerId,$name,$status,$date,$id]);
    }
?>