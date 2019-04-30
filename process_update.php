<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');
settype($_POST['id'],'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn,$_POST['id']),
  'title'=>mysqli_real_escape_string($conn,$_POST['title']),
  'decription'=>mysqli_real_escape_string($conn,$_POST['description'])
);

$sql = "
  update TOPIC
    set
      title ='{$filtered['title']}',
      decription ='{$filtered['decription']}'
    where
      id = '{$filtered['id']}'
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼으니, 관리자에게 문의를 하세요';
} else {
  echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
 ?>
