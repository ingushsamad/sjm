<?php

class DeliveryManager {

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

}