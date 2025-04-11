<?php
/**
 * THIS MODULE CONNECTS ALL DB MODELS CONNECTION TO DB AND REPOSITORIES EM ALL!!
 */
    //Connection DB
    include "connection/connectDB.php";

    //Entity Models
    include "models/user.entity.php";
    include "models/customer.entity.php";
    include "models/business_chance.entity.php";

    //Repositories
    include "repositories/user.repository.php";
    include "repositories/customer.repository.php";
    include "repositories/business_chance.repository.php";
?>