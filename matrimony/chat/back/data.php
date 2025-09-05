<?php
while($row = mysqli_fetch_assoc($query)){
/*  $sql2 = "SELECT * FROM chat";
  $query2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($query2);
  ($row2['isActive'] == "offline") ? $offline = "offline" : $offline = "online";*/

    $output .='<li><div class="user_box">
   
            <div class="user_img"><img src="profile.jpeg" alt="Profile image"></div>
            <div class="user_info"><span>'.$row['fname']." ".$row['lname'].'</span>
            <span><a href="user_profile.php?id='.$row['id'].'" class="see_profileBtn">Send Request</a></div>
   
        </div> </li>';
}
?>