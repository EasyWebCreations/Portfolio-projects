<?php
// include_once"connectDB_ajax.php";
include_once"connectDB_ajax.php";


if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "SELECT * FROM emp_details 
 WHERE EMP_ID = $search_text 
 ORDER BY EMP_ID DESC";
//  echo $search_array.$search_text;
}
else
{
 $query = "SELECT * FROM emp_details";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr  class="table-light">
   <td>'.$row["STATUS"].'</td> 
   <td>'.$row["EMP_ID"].'</td>
   <td>'.$row["EMP_NAME"].'</td>
   <td>'.$row["BNK_NAME"].'</td>
   <td>'.$row["CATEGORY"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

// $output = $search_array.$search_text;

echo $output;




?>