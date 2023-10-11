<?php

class Transaction{
    public $Id;
    public $amount;
    public $accountFrom;
    private $accountTo;
    public $dueDate;
    public $isSuccessful;

    function __construct($Id, $amount, $accountFrom, $accountTo, $dueDate, $isSuccessful)
    {
        $this->Id = $Id;
        $this->amount = $amount;
        $this->accountFrom = $accountFrom;
        $this->accountTo = $accountTo;
        $this->dueDate = $dueDate;
        $this->isSuccessful = $isSuccessful;

    }
    
  }

?>