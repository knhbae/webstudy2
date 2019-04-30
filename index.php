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
$delete_link = '';
$article_name = '';
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "
    SELECT *
    FROM  TOPIC a left join
    author b
    on a.author_id = b.id
    where a.id = {$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['decription']=htmlspecialchars($row['decription']);
  $article['name']=htmlspecialchars($row['name']);
  $article_name = "<p>by {$article['name']}</p>";
  // print_r($article);
  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
    <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
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
    <a href="author.php">author</a>
    <ol>
      <?=$list_title?>
    </ol>
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
        <?=$article['decription']?>
    <p><?=$article_name?></p>
  </body>
</html>
