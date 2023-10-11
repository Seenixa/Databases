<?php

class AccountType{
    public $Id;
    public $name;
    public $status;
    private $validFrom;
    public $validTo;

    function __construct($Id, $name, $status, $validFrom, $validTo)
    {
        $this->Id = $Id;
        $this->name = $name;
        $this->status = $status;
        $this->validFrom = $validFrom;
        $this->validTo = $validTo;
    }
    
  }

?>