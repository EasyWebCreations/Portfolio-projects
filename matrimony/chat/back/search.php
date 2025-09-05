
<?php
    session_start();
    include_once "conn.php";

    $sender = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $gendersql = "SELECT gender FROM per_details WHERE id = {$sender}";
    $adminId = 11111; 
    $genderquery = mysqli_query($conn, $gendersql);
    $genderrow = mysqli_fetch_assoc($genderquery);
    $sql = "SELECT * FROM per_details WHERE (NOT id = {$sender} AND NOT id = {$adminId} AND NOT gender = '{$genderrow['gender']}') AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' OR email LIKE '%{$searchTerm}%' ) ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search :(';
    }
    echo $output;
?>
