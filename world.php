<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$requested_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $requested_country->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if(isset($country)): ?>

  <table class = "showTable">
    <caption><h2> COUNTRIES </h2></caption>
    <thead>
      <tr>
        <th class = "t1"> COUNTRY NAME </th>
        <th id = "t2"> CONTINENT </th>
        <th id = "t3"> INDEPENDENCE </th>
        <th id = "t4"> HEAD OF STATE </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $country): ?>
        <tr>
          <td><?php echo $country["name"]; ?></td>
          <td><?php echo $country["continent"]; ?></td>
          <td><?php echo $country["independence_year"]; ?></td>
          <td><?php echo $country["head_of_state"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>


<?php /*foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' .  $row['head_of_state']; ?></li>
<?php endforeach;?>*/
