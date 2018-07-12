<?php 
$dbc= mysqli_connect('localhost','root','','test');
mysqli_set_charset($dbc, 'UTF8');
if (!$dbc) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql ="SELECT * FROM nhietdo  ORDER BY id DESC LIMIT 10";
$fetch = mysqli_query($dbc,$sql); 

while ($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {
    extract($row);
    $json[]=[strtotime($ngaygio),(int)$tem];
}

echo json_encode($json);
//KẾT QUẢ ECHO
//[[1531314325,33],[1531314319,43],[1531314313,23],[1531314309,23],[1531314306,23]]
mysqli_close($dbc);	
 ?>
