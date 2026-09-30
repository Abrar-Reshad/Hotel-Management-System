<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guest List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Guest List</h2>
    <table>
      <tr>
        <th>Guest ID</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
      <?php
      include('../admin/index.php');
      $query = "SELECT Guest_id, First_name, Last_name FROM guest";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Guest_id']}</td>";
        echo "<td>{$row['First_name']} {$row['Last_name']}</td>";
        echo "<td><a href='select_menu.php?guest_id={$row['Guest_id']}'>Select</a></td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
