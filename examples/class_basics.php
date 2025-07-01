<?php

class Car
{
    private int $speed;
    private string $color;
    private bool $isEngineOn;

    public function __construct($speed, $color, $isEngineOn)
    {
        $this->speed = $speed;
        $this->color = $color;
        $this->isEngineOn = $isEngineOn;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    protected function taxi(): void
    {
        echo('I am taxi!');
    }

    private function stuck(): void
    {
        echo('Oh, no! I am stuck! Please, help me');
    }
}

class Evacuator extends Car
{

    private bool $isHookEnabled;

    public function __construct($speed, $color, $isEngineOn, $isHookEnabled)
    {
        parent::__construct($speed, $color, $isEngineOn);
        $this->isHookEnabled = $isHookEnabled;
    }

    public function evacuate(string $carName): void
    {
        parent::taxi();
        $this->isHookEnabled = true;
        echo('Машина ' . $carName . ' эвакуирована');
    }

}

$uaz = new Car(50, 'black', false);
echo($uaz->getSpeed());

$uazEvacuator = new Evacuator(
    30,
    'black',
    true,
    false
);
$uazEvacuator->evacuate("UAZ DEFAULT");
