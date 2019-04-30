<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');
// print_r($_POST);
settype($_POST['id'],'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn,$_POST['id']),
  'name'=>mysqli_real_escape_string($conn,$_POST['name']),
  'profile'=>mysqli_real_escape_string($conn,$_POST['profile'])
);

$sql = "
  update author
    set
      name = '{$filtered['name']}',
      profile = '{$filtered['profile']}'
    where
      id = {$filtered['id']}
";
// die($sql);
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼으니, 관리자에게 문의를 하세요';
} else {
  header('Location: author.php?='.$filtered['id']);
}
// //
//  settype($_POST['id'], 'integer');
//  $filtered = array(
//    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
//    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
//    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
//  );
//  $sql = "
//    UPDATE author
//      SET
//        name = '{$filtered['name']}',
//        profile = '{$filtered['profile']}'
//      WHERE
//        id = {$filtered['id']}
//  ";
//  $result = mysqli_query($conn, $sql);
//  if($result === false){
//    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
//    error_log(mysqli_error($conn));
//  } else {
//    header('Location: author.php?id='.$filtered['id']);
//  }
//  ?>
