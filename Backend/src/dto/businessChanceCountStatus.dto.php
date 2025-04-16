<?php

    /**
     * Data Transfer Object with Status and Count of Business Chance
     */
    class businessChanceCountStatus {
        public ?string $status;
        public ?int $count;

        function __construct(?string $status,?int $count)
        {
            $this->status=$status;
            $this->count=$count;
        }
    }
?>