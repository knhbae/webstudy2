<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');
settype($_POST['id'],'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn,$_POST['id'])
);

$sql = "
  delete
    from topic
    where
      author_id = '{$filtered['id']}'
";
$result = mysqli_query($conn, $sql);

$sql = "
  delete
    from author
    where
      id = '{$filtered['id']}'
";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼으니, 관리자에게 문의를 하세요';
} else {
  header('Location: author.php');
}
 ?>
