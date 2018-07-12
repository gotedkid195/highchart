<?php 
//include('inc/myconnect.php');
$dbc= mysqli_connect('localhost','root','','test');
mysqli_set_charset($dbc, 'UTF8');
if (!$dbc) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// if (isset($_POST['getMember']) && 
    
$sql ="SELECT * FROM nhietdo  ORDER BY id DESC LIMIT 10";
$fetch = mysqli_query($dbc,$sql); 

while ($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {
    // $row_array['id'] = $row['id'];
    // $row_array['tem'] = $row['tem'];
    // $row_array['ngaygio'] = $row['ngaygio'];

    // array_push($return_arr,$row_array);
    extract($row);
    //echo $id;
    //echo $tem;
    //$d=strtotime(“tomorrow”);

    $json[]=[strtotime($ngaygio),(int)$tem];
}

echo json_encode($json);

// $sql = "SELECT * from nhietdo";
// $query = mysqli_query($dbc,$sql);
// while($result = mysqli_fetch_array($query)){
// 	$kq[]=$result['tem'];
//  //echo $result['tem']."<br>".$result['ngaygio']."<br>";
// }
//    echo json_encode($kq);
    
   //ket thuc tra ve du lieu va stop khong cho chay tiep
//   die;
//}
 ?>