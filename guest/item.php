<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="itemm.css">
</head>

<body>
    <div class="container">
        <h2>Restaurant Menu</h2>
        <table>
            <thead>
                <tr>
                    <th>Item No</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT item_no, Name, Price FROM restaurent_menu";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['item_no']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Price']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No items found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
