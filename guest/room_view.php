<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
    <link rel="stylesheet" href="my_courses.css">
</head>

<body>
    <div class="container">
        <h2>Available Room</h2>
        <table>
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Floor</th>
                    <th>Status Name</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php

                session_start();

                include('../admin/index.php');
                $sql = "SELECT * FROM room where Status<>'booked'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Room_id']}</td>
                        <td>{$row['Floor']}</td>
                        <td>{$row['Status']}</td>
                        
                        </tr>";
                    }
                }
                else {
                    echo "<tr><td colspan='5'>No Guest found</td></tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>