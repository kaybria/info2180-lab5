<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<?=  isset($_GET['context']) ?>
<ul>
<?php  echo "<table border='2px'
<tr>

<th>Name</th>

<th>Continent</th>

<th>Independence</th>

<th>Head of State</th>

</tr>"; ?>
<?php

 foreach ($results as $row):

{

echo "<tr>";

echo "<td>" . $row['name'] . "</td>";

echo "<td>" . $row['continent'] . "</td>";

echo "<td>" . $row['independence_year'] . "</td>";

echo "<td>" . $row['head_of_state'] . "</td>";

echo "</tr>";

}
endforeach;
echo "</table>";
?>
 

 
