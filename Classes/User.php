<?php

class User{
    public $Id;
    public $name;
    private $password;
    public $priviledge;
    public $loggedIn;
    public $lastLoggedIn;

    function __construct($Id, $name, $password, $priviledge)
    {
        $this->Id = $Id;
        $this->name = $name;
        $this->password = $password;
        $this->priviledge = $priviledge;
    }
    
  }

?>