<?php 
//include('inc/myconnect.php');
$dbc= mysqli_connect('localhost','root','','test');
mysqli_set_charset($dbc, 'UTF8');
if (!$dbc) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
    
$sql ="SELECT ngaygio,tem FROM clno  ORDER BY id DESC LIMIT 1000";
$fetch = mysqli_query($dbc,$sql); 

while ($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {

    extract($row);

    $json[]=[strtotime($ngaygio)*1000,(float)$tem];
}

echo json_encode($json);

  die;
//}
 ?>
