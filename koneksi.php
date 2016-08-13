<?php

  $server = mysql_connect('localhost','root','mangaps');
  if($server) {
    // True = nyambung
    $pesanServer = 'Server Konek dan ';
    $database = mysql_select_db('darja_app');
    if($database) {
      // true = database ada
      $pesanDatabase = 'Database Ada';
    } else {
      $pesanDatabase = 'Database Tidak Ada';
    }
  } else {
    $pesanServer = 'Server Tidak Konek dan ';
  }
?>
