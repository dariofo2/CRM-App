<?php
//include "customer.entity.php";

class Business_chance {
    public ?int $id;
    public ?int $customerId;
    public ?string $name;
    public ?string $status;
    public ?DateTime $date;
    public ?Business_chance $business_chance;

    function __construct(?int $id,?int $customerId,?string $name,?string $status,?DateTime $date,?Business_chance $business_chance) {
        $this->id=$id;
        $this->customerId=$customerId;
        $this->name=$name;
        $this->status=$status;
        $this->date=$date;
        $this->business_chance=$business_chance;
    }
}

?>