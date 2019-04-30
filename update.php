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

$article = array(
  'title'=>'Welcome',
  'decription'=>'Hello, Web'
);
$update_link = '';
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "
    SELECT *
    FROM  TOPIC where id = {$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['decription']=htmlspecialchars($row['decription']);
  // print_r($article);
  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
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
    <form action="process_update.php" method="post">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p>
        <input type="text" name="title" placeholder="title" value="<?=$article['title']?>">
      </p>
      <p>
        <textarea name="description" placeholder="description"><?=$article['decription']?></textarea>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </body>
</html>
