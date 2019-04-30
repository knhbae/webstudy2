<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');
print_r($_POST);
$filtered = array(
  'name'=>mysqli_real_escape_string($conn,$_POST['name']),
  'profile'=>mysqli_real_escape_string($conn,$_POST['profile'])
);

$sql = "
  INSERT INTO author
    (name, profile)
    VALUES(
      '{$filtered['name']}',
      '{$filtered['profile']}'
      )
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼으니, 관리자에게 문의를 하세요';
} else {
  header('Location: author.php?='.$filtered['id']);
}
 ?>
