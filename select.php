<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');

// 1 row

// $sql = "
//   SELECT *
//   FROM  TOPIC
//   LIMIT 1000
// ";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
// echo '<h1>'.$row['title'].'</h1>';
// echo $row['decription'];

// all row
$sql = "
  SELECT *
  FROM  TOPIC
  LIMIT 1000
";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
  echo '<h1>'.$row['title'].'</h1>';
  echo $row['decription'];
}
 ?>
