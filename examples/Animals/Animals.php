<?php
declare(strict_types=1);

abstract class Animals
{
    abstract public function doSomething(): void;

    public function life()
    {
        echo "life\n";
    }

    protected function die(): void
    {
        echo "die\n";
    }

    private function eat(): void
    {
        echo "eat\n";
    }
}