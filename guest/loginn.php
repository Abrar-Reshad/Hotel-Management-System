<?php 

include('../admin/index.php');
if(isset($_POST["sub"])){

    
    
    $roomid=$_POST['room_id'];
    

    $insert_query= "UPDATE `room` SET `status`='booked' WHERE Room_id = '$roomid';";
    $result= mysqli_query($conn,$insert_query);

    if($result){
        echo " successfully";
    } 
    else{   
        echo "Failed!";
    }
}
else{
    echo "not connected";
}
?>
