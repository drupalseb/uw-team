<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Lista zakupów</title>
</head>
<body>
<?php
require_once ('dbsettings.php');
require_once ('./engine.php');
$lz = new listaZakupow($dbuser, $dbpass, $dbname, $dbhost);
if (isset($_GET['akcja'])) {
  switch($_GET['akcja']) {
    case 'dodaj':
      $lz->dodaj($_POST['towar']);
      break;
    case 'usun':
      $lz->usun($_GET['id']);
      break;
    case 'zmien':
      $lz->zmienStan($_GET['id']);
      break;
  }
}
$lista = $lz->lista();
//print_r($lista);

echo '<br> Lista zakupów <ul>';
  foreach($lista as $element){
 if($element['stan']=='T'){
    $kupione = 'x';
  }
  else {
    $kupione = ' ';
  }
  echo '<li>' .$element['towar']. ' <a href="index.php?akcja=zmien&id='.$element['id'].'">['.$kupione.' ]</a>
                                    <a href="index.php?akcja=usun&id='.$element['id'].'"> usun </a></li>';
}

echo '</ul><br> koniec listy <br>';
?>
<form action="index.php?akcja=dodaj" method="post">
  Towar: <input type="text" name="towar">
  <input type ="submit" value="Dodaj">
</form>
<hr>
<h3> Some tutorial of objected programming</h3>
<div>
  <?php
  include('cars.php');
// create a new instance (object)
  $bmw = new cars();
  $mercedes = new cars();
 // set the vaules for properties
  $bmw->color='blue';
  $mercedes->comp = "Mercedes Benz";
  $mercedes->color = "red";

//get the values from class properties
  echo "show color of object bmw using class cars ".$bmw->color.'<br>';
  echo $mercedes->comp.'<br>';

// use methods to get a beep
  echo $bmw->hello().'<br>';
  echo $mercedes->hello().'<br>';
  //use methods with $this (see in cars.php file)(
  echo $mercedes->hello2().'<br>';
  $tank = $bmw -> fill(10) ->  ride(20) ->tank;
  echo "The numer of gallons left in the tank: ".$tank." gallons.<br>";
echo '<hr>';
  $f15 = new plane();
$airbus = new plane();
$f15->crew = "one person";
$airbus->crew = "two persons";
$f15->usage = 'militar';
$airbus->usage="civil";
$f15->engine=" two jet engines";
$airbus->engine="two turbofan engines";

echo "Crew in fighter F-15C contains ".$f15->crew.'.<br>';
echo $f15->desc();
echo "<hr> exercises:<br>";
?>
<?php
  include('cars.php');
$user1 = new User();
$user1->firstName="Jonnie";
$user1->lastName="Roe";

echo $user1->register();
echo $user1->mail();
$notify = $user1 -> hello() -> register() -> mail();

  echo "This is some notify ".$notify.".<br>";
  ?>
</div>
</body>
<html>
