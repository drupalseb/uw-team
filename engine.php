<?php
require_once ('dbsettings.php');

class listaZakupow {

  var $handle;
  function __construct($dbuser,$dbpass,$dbname,$dbhost) {
    $this->handle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('złe dane do bazy');
    // $tmp = mysqli_select_db($dbname, $this->handle) or die('zla baza danych');
  }

  function dodaj($nazwa){
    mysqli_query($this->handle,'insert into zakupy values(null, \''.$nazwa.'\', \'N\');');
  }
  function usun($id){
    mysqli_query($this->handle,'delete from zakupy where id='.$id.' limit 1');

  }
  function zmienStan($id){
    $akt = mysqli_fetch_assoc(mysqli_query($this->handle,'select stan from zakupy where id='.$id.' limit 1'));
    if ($akt['stan']=='T') {
      $nw = 'N';
    }
    else {
      $nw = 'T';
    }
    mysqli_query($this->handle,'update zakupy set stan=\'' .$nw.'\' where id='.$id.' limit 1');

  }
  function lista() {
    $ret = array();
    $q = mysqli_query($this->handle,'select * from zakupy order by id');
    while ($txt = mysqli_fetch_assoc($q)) {
      $ret[] = $txt;
    }
    return $ret;
  }
}
