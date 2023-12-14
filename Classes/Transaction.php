<?php

class Transaction{
    public $Id;
    public $amount;
    public $accountFrom;
    private $accountTo;
    public $dueDate;
    public $isSuccessful;
    public $whoInitiated;

    function __construct($Id, $amount, $accountFrom, $accountTo, $dueDate, $isSuccessful, $whoInitiated)
    {
        $this->Id = $Id;
        $this->amount = $amount;
        $this->accountFrom = $accountFrom;
        $this->accountTo = $accountTo;
        $this->dueDate = $dueDate;
        $this->isSuccessful = $isSuccessful;
        $this->whoInitiated = $whoInitiated;

    }
    
  }

?>