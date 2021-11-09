<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];
$cities = $_GET['context'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$stmt1 = $conn->query("SELECT countries.name AS countryname, cities.name AS city, cities.district,cities.population FROM countries,cities WHERE countries.code = cities.country_code ");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);



?>
<html>
<head>
     
    <style type="text/css">
    table {
        margin: 10px;
        border:none;
        border-collapse: collapse;
        
    }
    th{
      background-color: #04AA6D;
      color: white;
      padding: 15px;
      text-align: left;
      
    }
    td{
      text-align: left;
      padding: 15px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    </style>
</head>


<?php if($cities == "nocities"):
  echo "<table 
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
endif;
echo "</table>";

?>
<?php if($cities == "cities"):
  echo "<table
  <tr>

  <th>Name</th>

  <th>District</th>

  <th>Population</th>


  </tr>"; ?>
  <?php

  foreach ($results1 as $row):{
    if($row['countryname'] == $country ||  $country == ""):
      {
  
  
      echo "<tr>";
  
      echo "<td>" . $row['city'] . "</td>";
  
      echo "<td>" . $row['district'] . "</td>";
  
      echo "<td>" . $row['population'] . "</td>";
  
  
      echo "</tr>";
  
      }
    endif;

  }
   
  endforeach;
endif;
echo "</table>";
?>



 

 
