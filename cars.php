<?php
//declaring class
class cars {
  //properties of class

  public $comp;
  public $color = 'beige';
  public $hasSunRoof = true;
  public $tank;


  //method (function) called hello that says beep
  public function hello() {
    return "beep";
  }
  public function hello2() {
    return "Beep, I am a <i>".$this->comp."</i> and I am <i>".$this->color.".</i><br>";
  }


  // Add gallons of fuel to the tank when we fill it.
  public function fill($float)
  {
    $this-> tank += $float;

    return $this;
  }

  // Substract gallons of fuel from the tank as we ride the car.
  public function ride($float)
  {
    $miles = $float;
    $gallons = $miles/50;
    $this-> tank -= ($gallons);

    return $this;
  }
}
class plane {
  public $usage;
  public $crew;
  public $engine;

    public function desc() {
      return "This plane is used in ".$this->usage."; Crew contain: ".$this->crew." and it is powered by ".$this->engine.".<br>";
    }
}

class User {
  public $firstName;
  public $lastName;

  public function hello() {
    return "hello, ". $this->firstName.".<br>";
    return $this;
  }
  // A method to register the user.
  public function register()
  {
    echo " >> registered";
    return $this;
  }

  // A method to send the welcome email.
  public function mail()
  {
    echo " >> email sent";
  }
}
