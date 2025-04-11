<?php
//include "business_chance.php";


class Customer
{
    public ?int $id;
    public ?string $name;
    public ?string $surname;
    public ?string $phone;
    public ?string $enterprise;
    public ?string $address;

    //OneToMany RelationShip
    /**
     * @var Business_chance[] $business_chances
     */
    public array $business_chances;

    function __construct(?int $id, ?string $name, ?string $surname, ?string $phone, ?string $enterprise, ?string $address, ?array $bussiness_chances)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->enterprise = $enterprise;
        $this->address = $address;
        $this->business_chances = $bussiness_chances;
    }
}
