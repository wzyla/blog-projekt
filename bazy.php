<?php
$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName="Test2";
// Create connection
$dbConnect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

// Check connection
if (!$dbConnect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//Dodawnie danych
// $sql = "INSERT INTO DaneOsobowe (imie, nazwisko, wiek)
// VALUES ('John', 'Doe', 24)";
// print_r( mysqli_query($dbConnect, $sql));

// Usuwanie danych
// $sql="DELETE FROM DaneOsobowe WHERE PK=10";
// mysqli_query($dbConnect, $sql);

// Zmiana danych
// $sql="UPDATE DaneOsobowe SET imie='Adam' WHERE PK=8";
// mysqli_query($dbConnect, $sql);

// Pobieranie danych
// $sql="SELECT * FROM DaneOsobowe";
// $dbQuery=mysqli_query($dbConnect, $sql);

//   while($row=mysqli_fetch_assoc($dbQuery)){
//       echo $row['PK'];
//       echo $row['imie'];
//       echo $row['nazwisko'];
//       echo $row['wiek'];
//   }
//  $a = mysqli_fetch_assoc($dbQuery);
//  print_r($a);

