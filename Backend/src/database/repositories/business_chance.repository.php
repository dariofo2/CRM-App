<?php
    /**
     * Insert Business Chance To Database
     * @param Business_chance $businessChance The BusinessChance to Insert with ALL DATA
     */
    function insertBusinessChance (Business_chance $businessChance) {
        global $conn;

        $customerId=$businessChance->customerId;
        $name=$businessChance->name;
        $status=$businessChance->status;
        $date=$businessChance->date->format("y-m-d");
        
        $preparedStatement=$conn->prepare("insert into business_chance (customerId,name,status,date) values (?,?,?,?)");
        
        $preparedStatement->execute([$customerId,$name,$status,$date]);

    }

    /**
     * Delete Business Chance From Database
     * @param Business_chance $businessChance The BusinessChance to Delete
     */
    function deleteBusinessChance (Business_chance $businessChance) {
        global $conn;

        $id=$businessChance->id;

        $preparedStatement=$conn->prepare("delete from business_chance where id=?");
        //$preparedStatement->bindParam("i",$id);

        $preparedStatement->execute([$id]);
    }

    /**
     * Select businessChances from The Database
     * @return Business_chance[]
     */
    function selectBusinessChances() : array {
        global $conn;

        $result=$conn->query("select * from business_chance");
        $businessChancesResponse=[];
        foreach ($result as $data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],new DateTime($data['date']),null);
            array_push($businessChancesResponse,$businessChanceNew);
        }

        return $businessChancesResponse;
    }

    /**
     * Select only one businessChance from The Database by ID
     * @param Business_chance $business_chance The Business Chance Request with the ID
     * @return Business_chance
     */
    function selectBusinessChance (Business_chance $business_chance) : ?Business_chance {
        global $conn;

        $id=$business_chance->id;

        $preparedStatement=$conn->prepare("select * from business_chance where id=?");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$id]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $businessChancesResp=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],new DateTime($data['date']),null);
            array_push($businessChancesResp,$businessChanceNew);
        }
        //echo $users;
        //Check if finded One at Least
        if (count($businessChancesResp)>=1) return $businessChancesResp[0];
        else return null;
    }

    /**
     * Select Business Chances from Database by CustomerId
     * @param Business_chance $business_chance The BusinessChance request with CustomerId
     * @return Businness_chance[]
     */
    function selectBusinessChancesByCustomerId (Business_chance $business_chance) : array {
        global $conn;

        $id=$business_chance->customerId;

        $preparedStatement=$conn->prepare("select * from business_chance where customerId=?");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$id]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $businessChancesResp=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],new DateTime($data['date']),null);
            array_push($businessChancesResp,$businessChanceNew);
        }
        //echo $users;
        //Check if finded One at Least
        return $businessChancesResp;
    }

    /**
     * Select Business Chances from Database by CustomerId and Year
     * @param Business_chance $business_chance The BusinessChance Request with customerId and Year
     * @return Businness_chance[]
     */
    function selectBusinessChancesByCustomerIdAndYear (Business_chance $business_chance) : array {
        global $conn;

        $id=$business_chance->customerId;
        $date=$business_chance->date->format("y-m-d");

        $preparedStatement=$conn->prepare("select * from business_chance where customerId=? AND year(date)=year(?)");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$id,$date]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $businessChancesResp=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
            $businessChanceNew=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],new DateTime($data['date']),null);
            array_push($businessChancesResp,$businessChanceNew);
        }
        //echo $users;
        //Check if finded One at Least
        return $businessChancesResp;
    }

    /**
     * Select Business Chances Count by Status from Database
     * @return Businness_chance[]
     */
    function selectBusinessChancesCountByStatus () : array {
        global $conn;

        $result=$conn->query("SELECT status,count(*) as count FROM `business_chance` WHERE 1 GROUP BY status");
        $businessChancesResponse=[];
        foreach ($result as $data) {
            $businessChanceNew=new businessChanceCountStatus($data['status'],$data['count']);
            array_push($businessChancesResponse,$businessChanceNew);
        }

        return $businessChancesResponse;
    }

    /**
     * Update Business Chance from Database by ID
     * @param Business_chance $businessChance The Business Chance Request Object with all DATA
     * @return void
     */
    function updateBusinessChance (Business_chance $businessChance) : void {
        global $conn;

        $id=$businessChance->id;
        $customerId=$businessChance->customerId;
        $name=$businessChance->name;
        $status=$businessChance->status;
        $date=$businessChance->date->format("y-m-d");

        $preparedStatement=$conn->prepare("update business_chance set customerId=? , name=? , status=? , date=? where id=?");
        //$preparedStatement->bindParam("ssssi",$email,$password,$name,$surname);
        $preparedStatement->execute([$customerId,$name,$status,$date,$id]);
    }
?>