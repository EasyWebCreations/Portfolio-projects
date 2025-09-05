<?php
    while($row = mysqli_fetch_assoc($query)){

        $output .= 
                  
                '<li><div class="user_box">

                <div class="user_img"><img src="profile.jpeg" alt="Profile image"></div>
                <div class="user_info"><span>'.$row['fname']." ".$row['lname'].'</span>
                <span><a href="user_profile.php?id='.$row['id'].'" class="see_profileBtn">Send Request</a></div>
        
            </div></li>';
    }
?>
