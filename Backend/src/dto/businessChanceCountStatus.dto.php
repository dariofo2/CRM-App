<?php
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