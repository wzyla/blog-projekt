<?php

class blog
{
  private $dbConn;
  //Konstruktor
  function __construct($serverName,$userName,$password,$dbName)
  {
    // Create connection
    $this->dbConn = mysqli_connect($serverName, $userName, $password,$dbName);
    
    // Check connection
    if (!$this->dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //return $dbConn;
  }

  function dodaj($date,$intro,$readmore,$author,$title)
  {
    $sql="INSERT INTO Posts(postDate,postIntro,postReadMore,postAuthor,postTitle) VALUES ('$date','$intro','$readmore','$author','$title')";
    mysqli_query($this->dbConn,$sql); //nie ma this przy $sql,że $sql to nie jest zmienna klasowa tylko zmienna w funkcji
    mysqli_close($this->dbConn);
  }

  function usun($id)
  {
    $dbConnect=$this->dbConn;
    $sql="DELETE FROM Posts WHERE idPosts= $id";
    mysqli_query($this->dbConn, $sql);
    mysqli_close($this->dbConn);
  }

  function edit($id,$date,$intro,$readmore,$title)
  {
    $sql="UPDATE Posts SET postDate='$date', postTitle='$title', postIntro='$intro', postReadMore='$readmore'  WHERE idPosts=$id";
    mysqli_query($this->dbConn, $sql);
    mysqli_close($this->dbConn);
  }
}

$blogTomka= new blog('localhost','root','root','Blog1');



//$blogTomka= new blog('localhost','root','root','Blog1'); //Jeśli mamy konstruktora w klasie to podajemy parametry odrazu przy tworzeniu obiektu
//$blogTomka->dodaj('2017-01-23','Witamy na Blogu','czytaj',5,'Klasy part 2');
$blogTomka->edit(75,'2018-05-18','cześć','czytaj więcej','Edytowane');

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
</body>
</html>



