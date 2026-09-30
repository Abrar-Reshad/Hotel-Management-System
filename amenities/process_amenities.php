<?php
include('../admin/index.php');

if (isset($_POST['calculate_amenities_bill'])) {
    $guest_id = $_POST['guest_id'];
    $quantities = $_POST['quantity'];
    $amenities_rate = 0;

    foreach ($quantities as $amenity_id => $quantity) {
        if ($quantity > 0) {
            // Retrieve amenity price
            $query = "SELECT Price FROM amenities WHERE Amenities_id = $amenity_id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<div style='text-align: center; margin-top: 50px;'>";
                echo "<h1 style='font-size: 3em; color: red;'>Failed to retrieve amenity price!</h1>";
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
                echo "</div>";
                exit;
            }
            $row = mysqli_fetch_assoc($result);
            $amenities_rate += $row['Price'] * $quantity;

            // Insert into enjoy table
            $insert_query = "INSERT INTO enjoy (Guest_id, Amenities_id) VALUES ($guest_id, $amenity_id)";
            if (!mysqli_query($conn, $insert_query)) {
                echo "<div style='text-align: center; margin-top: 50px;'>";
                echo "<h1 style='font-size: 3em; color: red;'>Failed to insert into enjoy table!</h1>";
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
                echo "</div>";
                exit;
            }
        }
    }

    // Update payment table
    $update_query = "UPDATE payment SET Amenities_rate = $amenities_rate WHERE Guest_id = $guest_id";
    if (mysqli_query($conn, $update_query)) {
        // Update total bill
        $update_total_query = "UPDATE payment SET `Total_Bill` = Room_rate + Amenities_rate + Food_rate WHERE Guest_id = $guest_id";
        if (mysqli_query($conn, $update_total_query)) {
            echo "<div style='text-align: center; margin-top: 50px;'>";
            echo "<h1 style='font-size: 3em;'>Bill Updated Successfully</h1>";
            echo "<br><button style='font-size: 1.5em; padding: 10px 20px;' onclick='window.location.href=\"../login/dashboard.html\"'>Go to Home</button>";
            echo "</div>";
        } else {
            echo "<div style='text-align: center; margin-top: 50px;'>";
            echo "<h1 style='font-size: 3em; color: red;'>Failed to update total bill!</h1>";
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<div style='text-align: center; margin-top: 50px;'>";
        echo "<h1 style='font-size: 3em; color: red;'>Failed to update amenities rate!</h1>";
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
        echo "</div>";
    }
} else {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1 style='font-size: 3em; color: red;'>Invalid request!</h1>";
    echo "</div>";
}
?>
