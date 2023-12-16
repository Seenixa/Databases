<?php

class BankAccount{
    public $accountNumber;
    public $isItLocked;
    private $balance;
    public $openDate;
    public $type;

    function __construct($accountNumber, $ownerName, $balance, $type)
    {
        $this->accountNumber = $accountNumber;
        $this->ownerNamename = $ownerName;
        $this->balance = $balance;
        $this->type = $type;
    }
    
  }

?>