<?php
    function insertCustomer (Customer $customer) {
        global $conn;

        $name=$customer->name;
        $surname=$customer->surname;
        $phone=$customer->phone;
        $enterprise=$customer->enterprise;
        $address=$customer->address;

        $preparedStatement=$conn->prepare("insert into customer (name,surname,phone,enterprise,address) values (?,?,?,?,?)");
        
        $preparedStatement->execute([$name,$surname,$phone,$enterprise,$address]);

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
            $customer=new Customer($data['id'],$data['name'],$data['surname'],$data['phone'],$data['enterprise'],$data['address'],[]);
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
          $newCustomer=new Customer($data['id'],$data['name'],$data['surname'],$data['phone'],$data['enterprise'],$data['address'],[]);
          array_push($customers,$newCustomer);
        }
        //echo $users;
        //Check if finded One at Least
        if (count($customers)>=1) return $customers[0];
        else return null;
    }


    function updateCustomer (Customer $customer) : void {
        global $conn;

        $id=$customer->id;
        $name=$customer->name;
        $surname=$customer->surname;
        $phone=$customer->phone;
        $enterprise=$customer->enterprise;
        $address=$customer->address;

        $preparedStatement=$conn->prepare("update customer set name=? , surname=? , phone=? , enterprise=? , address=? where id=?");
        //$preparedStatement->bindParam("ssssi",$email,$password,$name,$surname);
        $preparedStatement->execute([$name,$surname,$phone,$enterprise,$address,$id]);
    }

    //INFORME
    //OPORTUNIDADES POR CLIENTE Y AÑO

    //Clientes por Año
?>