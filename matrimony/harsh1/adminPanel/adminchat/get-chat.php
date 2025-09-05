<?php 
    session_start();
    include_once "conn.php";
    if(isset($_SESSION['unique_id'])){
      
        $outgoing_id = 0;
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM chat LEFT JOIN per_details ON per_details.id = chat.sender
                WHERE (sender = {$outgoing_id} AND receiver = {$incoming_id})
                OR (sender = {$incoming_id} AND receiver = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $oldDate = strtotime($row['dateandtime']);

                $newDate = date('H:i d/m',$oldDate);

                
                if($row['sender'] == $outgoing_id){
                    $output .= ' <div class="outgoing">
                                 <div class="details">
                                 <p>'.$row['msg'].'</p><time>'. $newDate .'</time>
                                 </div>
                                 </div>';
                }else{
                    $output .= '<div class="incoming">
                                <div class="details">
                                <p>'.$row['msg'].'</p><time>'. $newDate .'</time>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: index.php");
    }

?>