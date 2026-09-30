<?php
include('../admin/index.php');

if (isset($_POST["sub"])) {
    $NID = $_POST['NID'];
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Mobile_no = $_POST['Mobile_no'];
    $Check_in_time = $_POST['Check_in_time'];
    $Check_out_time = $_POST['Check_out_time'];
    $total_cost = $_POST['total_cost'];  // Corrected variable reference
    $room_nos = explode(",", $_POST['room_nos']);  // Convert room numbers to array

    // Calculate the guest ID by counting the number of rows in the guest table
    $count_query = "SELECT COUNT(*) as count FROM `guest`";
    $count_result = mysqli_query($conn, $count_query);
    if ($count_result) {
        $count_row = mysqli_fetch_assoc($count_result);
        $guest_id = $count_row['count'] + 1;  // Increment count to get new guest ID

        // Insert the new guest into the guest table
        $insert_query = "INSERT INTO `guest` (Guest_id, NID, First_name, Last_name, Mobile_no, Check_in_time, Check_out_time) VALUES('$guest_id', '$NID', '$First_name', '$Last_name', '$Mobile_no', '$Check_in_time', '$Check_out_time')";
        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            // Insert the payment details into the payment table
            $payment_query = "INSERT INTO `payment` (Payment_id, Room_rate, Amenities_rate, Food_rate, Total_Bill, Status, Guest_id) VALUES ('','$total_cost','','', '$total_cost','','$guest_id')";
            $payment_result = mysqli_query($conn, $payment_query);

            if ($payment_result) {
                // Update the room status
                foreach ($room_nos as $room_no) {
                    $update_room_query = "UPDATE room SET Status = 'Booked' WHERE room_no = $room_no";
                    mysqli_query($conn, $update_room_query);
                }

                echo '<div style="text-align: center; margin-top: 50px;">';
                echo '<h1 style="font-size: 3em;">Guest Registered successfully</h1>';
                echo '<br><button style="font-size: 1.5em; padding: 10px 20px;" onclick="window.location.href=\'../index.html\'">Go to Home</button>';
                echo '</div>';
            } else {
                echo '<div style="text-align: center; margin-top: 50px;">';
                echo '<h1 style="font-size: 3em; color: red;">Failed to record payment!</h1>';
                echo '</div>';
            }
        } else {
            echo '<div style="text-align: center; margin-top: 50px;">';
            echo '<h1 style="font-size: 3em; color: red;">Guest Registration Failed!</h1>';
            echo '</div>';
        }
    } else {
        echo '<div style="text-align: center; margin-top: 50px;">';
        echo '<h1 style="font-size: 3em; color: red;">Failed to retrieve guest count!</h1>';
        echo '</div>';
    }
} else {
    echo '<div style="text-align: center; margin-top: 50px;">';
    echo '<h1 style="font-size: 3em; color: red;">Not connected!</h1>';
    echo '</div>';
}
?>
