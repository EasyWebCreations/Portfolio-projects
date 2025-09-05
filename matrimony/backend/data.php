<?php
while($row = mysqli_fetch_assoc($query)){
  $sql2 = "SELECT * FROM chat";
  $query2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($query2);
  ($row2['isActive'] == "offline") ? $offline = "offline" : $offline = "online";

    $output .=' <li><a href="#chat-box'.$row['id'].'" onclick="showReciever()">
    <div class="status-dot '. $offline .'" style="  line-height:40px;margin-left:-10px;margin-right:10px;font-size:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
      </svg></div><img src="../images/profile.jpeg" alt="" style="width: 30px; height: 30px; border-radius: 50%;">
    <div class="details"><span style="font-size: 15px;font-weight: bolder;">'. $row['fname']." ".$row['lname'].'</span>
      <p style="font-weight: lighter;color: gray;"></p>
    </div>
  </a></li>';
}
?>