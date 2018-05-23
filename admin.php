<?php
  function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
  {
    // Create connection
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);
  
  // Check connection
  if (!$connect) {
      die("blad");
  }
  return $connect;
  }
  $dbHost = "localhost";
  $dbUserName = "root";
  $dbUserPassword = "root";
  $dbName="Blog1";
  
  $dbConnect = dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName);

  if(isset($_GET['postid'])){
    $postNumber=$_GET['postid'];
    $sql="DELETE FROM Posts WHERE idPosts= $postNumber";
    $dbQuery=mysqli_query($dbConnect, $sql);
  }

  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $title=$_GET['title'];
    $date=$_GET['date'];
    $intro=$_GET['intro'];
    $read=$_GET['readmore'];
    $sql="UPDATE Posts SET postDate='$date', postTitle='$title', postIntro='$intro', postReadMore='$read'  WHERE idPosts=$id";
    $dbQuery=mysqli_query($dbConnect, $sql);
  }

  $sql="SELECT idPosts,postDate,postTitle FROM Posts";
  $dbQuery=mysqli_query($dbConnect, $sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>
<body>
  <?php while($row=mysqli_fetch_assoc($dbQuery)){?>
  <article>
    <?php echo $row['postDate']?>
    <?php echo $row['postTitle']?>
    
    <a href="admin.php?postid=<?php echo $row['idPosts'];?>">Usuń</a>
    <a href="admin.php?editid=<?php echo $row['idPosts'];?>">Edytuj</a>
    
    <br><br>
    
  </article>
  <?}?>

<? if(isset($_GET['editid'])){
    $postNumber=$_GET['editid'];
    $edit="SELECT idPosts,postDate,postTitle,postIntro,postReadMore FROM Posts WHERE idPosts= $postNumber";
    $dbEdit=mysqli_query($dbConnect, $edit);
    while($content=mysqli_fetch_assoc($dbEdit)){?>

      <form action="admin.php" method="get">
      <input type="hidden" name="id" value=" <?php echo $content['idPosts']?>" readonly >
        <br>
       <input type="text" name="date" value=" <?php echo $content['postDate']?>"> Data
       <br>
       <input type="text" name="title" value=" <?php echo $content['postTitle']?>"> Tytuł
       <br>
       <input type="text" name="intro" value=" <?php echo $content['postIntro']?>"> Intro
       <br>
       <input type="text" name="readmore" value=" <?php echo $content['postReadMore']?>"> Read More
       <br>
       <input type="submit" value="Edytuj">
      </form>
      <?php }?>
  <?php }?>

</body>
</html>
