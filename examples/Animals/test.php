<?php
require_once __DIR__ . "/Animals.php";
require_once __DIR__ . "/Dog.php";

$dog = new Dog();
$dog->life();
$dog->eat();