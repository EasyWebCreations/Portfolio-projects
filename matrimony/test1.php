<?php
// session_start();
// $_SESSION['unique_id'] = "93704";
// include_once("backend/connect.php");
// $result = "";
// $row = array();
// $pathForCache = "";
// $data = "";

// $cache = $pathForCache . "cache/file.cache.json";
// if (file_exists($cache) && filemtime($cache) > time() - 1800) {
//   echo "cache found<br>";
//   $row = json_decode(file_get_contents($cache), true);
// } else {
//   echo "cache not found<br>";

//   $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");

//   if (mysqli_num_rows($result)) {
//     $row = mysqli_fetch_assoc($result);
//     $data = json_encode($row);
//   }

//   $handler = fopen($cache, 'w');
//   fwrite($handler, $data);
//   fclose($handler);
// }










// session_start();
// $_SESSION['unique_id'] = "93704";
// include_once("backend/connect.php");
// $result = "";
// $row = array();

// $myRowCookieName = 'testRow';
// if (isset($_COOKIE[$myRowCookieName])) {
//   echo "cookie found<br>";
//   $row = json_decode($_COOKIE[$myRowCookieName], true);
// } else {
//   echo "cookie not found<br>";

//   $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");

//   if (mysqli_num_rows($result)) {
//     $row = mysqli_fetch_assoc($result);
//     setcookie($myRowCookieName, json_encode($row), time() + 20, "/");
//   }
// }












// session_start();
// $_SESSION['unique_id'] = "93704";
// include_once("backend/connect.php");
// $result = "";
// $row = array();
// $query = '';

// $testRowCookieName = 'testRow';

// if (isset($_COOKIE[$testRowCookieName])) {
//   echo "cookie found<br>";
//   $query = json_decode($_COOKIE[$testRowCookieName]);
// } else {
//   echo "cookie not found<br>";

//   $sql = "SELECT per_details.id, per_details.fname, per_details.lname, per_details.profile_img, per_details.occupation, per_details.height, per_details.age FROM per_details INNER JOIN likes ON per_details.id=likes.liked_to WHERE likes.liked_by={$_SESSION['unique_id']}";


//   // $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");

//   // if (mysqli_num_rows($result)) {
//   $query = mysqli_query($conn, $sql);
//   setcookie($testRowCookieName, json_encode($query), time() + 20, "/");
//   $row123 = mysqli_fetch_all($query, MYSQLI_ASSOC);
//   // }
// }








if (!empty($_POST["upload"])) {
  if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $targetPath = "uploads/" . $_FILES['userImage']['name'];
    if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
      $uploadedImagePath = $targetPath;
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="bgColor">
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">

      <div id="uploadFormLayer">
        <input name="userImage" id="userImage" type="file" class="inputFile"><br> <input type="submit" name="upload" value="Submit" class="btnSubmit">

      </div>
    </form>
  </div>
  <div>
    <img src="<?php echo $imagePath; ?>" id="cropbox" class="img" /><br />
  </div>
  <div id="btn">
    <input type='button' id="crop" value='CROP'>
  </div>
  <div>
    <img src="#" id="cropped_img" style="display: none;">
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var size;
      $('#cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: function(c) {
          size = {
            x: c.x,
            y: c.y,
            w: c.w,
            h: c.h
          };
          $("#crop").css("visibility", "visible");
        }
      });

      $("#crop").click(function() {
        var img = $("#cropbox").attr('src');
        $("#cropped_img").show();
        $("#cropped_img").attr('src', 'image-crop.php?x=' + size.x + '&y=' + size.y + '&w=' + size.w + '&h=' + size.h + '&img=' + img);
      });
    });
  </script>
</body>

</html>