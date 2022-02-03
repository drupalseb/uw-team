<?php

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
$user1 = new User();
$user1->firstName="Jonnie";
$user1->lastName="Roe";

echo $user1->register();
echo $user1->mail();
$user1 -> hello() -> register() -> mail();

?>
