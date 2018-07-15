<?php 

$dbc= mysqli_connect('localhost','root','','test');
mysqli_set_charset($dbc, 'UTF8');
if (!$dbc) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$query="SELECT id FROM clno ORDER BY id DESC LIMIT 1 ";
$result = mysqli_query($dbc, $query);
$get = mysqli_fetch_assoc($result);
$id = $get['id']-1000;

$sql ="SELECT ngaygio,ph FROM clno  ORDER BY ngaygio ASC LIMIT $id,1000";
$fetch = mysqli_query($dbc,$sql); 

while ($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {

    extract($row);

    $json[]=[strtotime($ngaygio)*1000,(float)$ph];
}

echo json_encode($json);
  die;

 ?>
