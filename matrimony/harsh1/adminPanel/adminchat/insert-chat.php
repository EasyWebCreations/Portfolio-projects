<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "conn.php";
        $outgoing_id = 0;
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $currentDate = new DateTime();
        $datetime = $currentDate->format('d/m/Y h:i a');
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO chat (receiver, sender, msg, dateandtime)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', NOW())");
        }
        /*echo "test" . $datetime;*/
    }else{
        header("location: ../index.php");
    }
?>