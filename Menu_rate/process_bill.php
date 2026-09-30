<?php
include('../admin/index.php');

if (isset($_POST['calculate_bill'])) {
    $guest_id = $_POST['guest_id'];
    $quantities = $_POST['quantity'];
    $food_rate = 0;

    foreach ($quantities as $item_no => $quantity) {
        if ($quantity > 0) {
            $query = "SELECT Price FROM restaurent_menu WHERE Item_no = $item_no";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $food_rate += $row['Price'] * $quantity;
        }
    }

    // Update payment table
    $update_query = "UPDATE payment SET Food_rate = $food_rate WHERE Guest_id = $guest_id";
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
        echo "<h1 style='font-size: 3em; color: red;'>Failed to update food rate!</h1>";
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
        echo "</div>";
    }
} else {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1 style='font-size: 3em; color: red;'>Invalid request!</h1>";
    echo "</div>";
}
?>
