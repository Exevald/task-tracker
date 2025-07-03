<?php
declare(strict_types=1);

class Dog extends Animals
{
    public function doSomething(): void
    {
        $this->life();
        echo "gav-gav\n";
        $this->die();
    }
}