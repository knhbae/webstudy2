<?php
$conn = mysqli_connect(
  '127.0.0.1',
  'root',
  'b123412',
  'opentutorials');
$sql = "
  SELECT *
  FROM  TOPIC
";
$result = mysqli_query($conn, $sql);
$list_title = '';
$list_desc = '';
while($row = mysqli_fetch_array($result)){
  //<li><a href=\"index.php?id=19\">MYSQL</a></li>
  $escaped_title = htmlspecialchars($row['title']);
  $list_title = $list_title."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  //$list_desc = $list_desc.$row['decription'];
}

$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
  $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list_title?>
    </ol>
    <form action="process_create.php" method="post">
      <p>
        <input type="text" name="title" placeholder="title">
      </p>
      <p>
        <textarea name="description" placeholder="description"></textarea>
      </p>
        <?=$select_form?>
      <p>
        <input type="submit">
      </p>
    </form>
  </body>
</html>
