<?php
    $key=$_GET['z'];
    $array = array();
    include 'config.php';
    $query=mysql_query("select depart from ride where depart LIKE '{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['depart'];
    }
    echo json_encode($array);
?>
