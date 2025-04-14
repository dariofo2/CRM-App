<?php
    function insertCustomer (Customer $customer) {
        global $conn;

        $name=$customer->name;
        $surname=$customer->surname;
        $phone=$customer->phone;
        $enterprise=$customer->enterprise;
        $address=$customer->address;
        $date=$customer->date->format("y-m-d");

        $preparedStatement=$conn->prepare("insert into customer (name,surname,phone,enterprise,address,date) values (?,?,?,?,?,?)");
        
        $preparedStatement->execute([$name,$surname,$phone,$enterprise,$address,$date]);

    }

    function deleteCustomer (Customer $customer) {
        global $conn;

        $id=$customer->id;

        $preparedStatement=$conn->prepare("delete from customer where id=?");
        //$preparedStatement->bindParam("i",$id);

        $preparedStatement->execute([$id]);
    }

    /**
     * @return Customer[]
     */
    function selectCustomers() : array {
        global $conn;

        $result=$conn->query("select * from customer");
        $customersResponse=[];
        foreach ($result as $data) {
            $customer=new Customer($data['id'],$data['name'],$data['surname'],$data['phone'],$data['enterprise'],$data['address'],new DateTime($data['date']),[]);
            array_push($customersResponse,$customer);
        }

        return $customersResponse;
    }

    function selectCustomer(Customer $customer) : ?Customer {
        global $conn;

        $id=$customer->id;

        $preparedStatement=$conn->prepare("select * from customer where id=?");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$id]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $customers=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
          $newCustomer=new Customer($data['id'],$data['name'],$data['surname'],$data['phone'],$data['enterprise'],$data['address'],new DateTime($data['date']),[]);
          array_push($customers,$newCustomer);
        }
        //echo $users;
        //Check if finded One at Least
        if (count($customers)>=1) return $customers[0];
        else return null;
    }

    /**
     * @return Customer[]
     */
    function selectCustomersByYear(Customer $customer) : array {
        global $conn;

        $date=$customer->date->format("y-m-d");

        $preparedStatement=$conn->prepare("select * from customer where year(date)=year(?)");
        //$preparedStatement->bindParam("ss",$email,$password);

        $preparedStatement->execute([$date]);

        $result = $preparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        $customers=[];

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
          $newCustomer=new Customer($data['id'],$data['name'],$data['surname'],$data['phone'],$data['enterprise'],$data['address'],new DateTime($data['date']),[]);
          array_push($customers,$newCustomer);
        }
        
        return $customers;
    }


    function updateCustomer (Customer $customer) : void {
        global $conn;

        $id=$customer->id;
        $name=$customer->name;
        $surname=$customer->surname;
        $phone=$customer->phone;
        $enterprise=$customer->enterprise;
        $address=$customer->address;
        $date=$customer->date->format("y-m-d");

        $preparedStatement=$conn->prepare("update customer set name=? , surname=? , phone=? , enterprise=? , address=?, date=? where id=?");
        //$preparedStatement->bindParam("ssssi",$email,$password,$name,$surname);
        $preparedStatement->execute([$name,$surname,$phone,$enterprise,$address,$date,$id]);
    }

    //INFORME
    //OPORTUNIDADES POR CLIENTE Y AÑO
    function getCustomerOportunitiesByNameAndYear (Business_chance $business_chance) : Customer {
        global $conn;

        $date=$business_chance->date->format("y-m-d");
        $name=$business_chance->customer->name;
        $surname=$business_chance->customer->surname;

        $preparedStatement=$conn->prepare("select * from customer LEFT JOIN business_chance ON business_chance.customerId=customer.id WHERE year(business_chance.date)=year(?) AND customer.name=? AND customer.surname=?;");
        $preparedStatement->execute([$date,$name,$surname]);

        $customerOpportunities=new Customer(null,$name,$surname,null,null,null,null,[]);

        foreach(new RecursiveArrayIterator($preparedStatement->fetchAll()) as $k=>$data) {
            $newBusinessChance=new Business_chance($data['id'],$data['customerId'],$data['name'],$data['status'],new DateTime($data['date']),null);
            array_push($customerOpportunities->business_chances,$newBusinessChance);
        }

        return $customerOpportunities;
    }
    //Clientes por Año
?>