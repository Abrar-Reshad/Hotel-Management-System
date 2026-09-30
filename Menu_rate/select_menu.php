<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Menu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Select Menu Items</h2>
    <form action="process_bill.php" method="post">
      <input type="hidden" name="guest_id" value="<?php echo $_GET['guest_id']; ?>">
      <table>
        <tr>
          <th>Item ID</th>
          <th>Item Name</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
        <?php
        include('../admin/index.php');
        $query = "SELECT * FROM restaurent_menu";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['item_no']}</td>";
          echo "<td>{$row['Name']}</td>";
          echo "<td>{$row['Price']}</td>";
          echo "<td><input type='number' name='quantity[{$row['item_no']}]' min='0' value='0'></td>";
          echo "</tr>";
        }
        ?>
      </table>
      <button type="submit" name="calculate_bill">Calculate Bill</button>
    </form>
  </div>
</body>
</html>
