<?php
//include "customer.entity.php";

/**
 * BusinessChance Entity of Database
 */
class Business_chance {
    public ?int $id;
    public ?int $customerId;
    public ?string $name;
    public ?string $status;
    public ?DateTime $date;
    public Customer|stdClass|null $customer;

    function __construct(?int $id,?int $customerId,?string $name,?string $status,?DateTime $date,Customer|stdClass|null $customer) {
        $this->id=$id;
        $this->customerId=$customerId;
        $this->name=$name;
        $this->status=$status;
        $this->date=$date;
        $this->customer=$customer;
    }
}

?>