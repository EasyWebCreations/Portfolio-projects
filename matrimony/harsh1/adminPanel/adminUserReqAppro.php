<?php
// $connect = new PDO("mysql:host=localhost; dbname=u352929645_akshadaa_main", "u352929645_akshadaa_main", "Ecct@29052000");
include_once("adminConnect.php");
$limit = '5';
$page = 1;
if (isset($_POST['page']) && $_POST['page'] > 1) {
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
} else {
  $start = 0;
}

$query = "
SELECT * FROM per_details WHERE approval_status = 'pending'";


$query .= 'ORDER BY fname ASC ';

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '';

if ($total_data > 0) {

  $output .= '
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-5">
            <h2><b>User Request Approval</b></h2>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead class="thead-light">
          <tr>
            <!-- <th></th> -->
            <th>UserID</th>
            <th>Name</th>
            <th>Email-ID</th>
            <th>Phone No.</th>
            <th>Gender</th>
            <th>Status</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $name = $row['fname'] . ' ' . $row['lname'];
      $output .= '<tr>
            <td>' . $row['id'] . '</td>
            <td><a href="#"><img src="' . $row['profile_img'] . '" class="avatar" alt="Avatar">' . $name . '</a>
            </td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['mobile'] . '</td>
            <td>' . $row['gender'] . '</td>
            <td>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
            
                <label class="btn btn-secondary btn-success btn-sm">
                  <a href="approvalBack/approve.php?email=' . $row['email'] . '&id=' . $row['id'] . '" style="color:white"><input type="radio" name="options" id="option1" autocomplete="off"> Yes </a>
                </label>
                <label class="btn btn-secondary btn-danger btn-sm">
                <a href="approvalBack/unapprove.php?email=' . $row['email'] . '&id=' . $row['id'] . '" style="color:white"><input type="radio" name="options" id="option3" autocomplete="off"> No </a>
                </label>
              </div>
            </td>
          </tr>';
    }
  } else {
    $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
  }
  $output .= '
  </tbody>
  </table>
  <br />
  <div class="clearfix" style="position: relative; width: 100%; display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
  <div class="hint-text">Showing <b>' . sizeof($result) . '</b> out of <b>' . $total_data . '</b> entries</div>
    <ul class="pagination" style="margin-left: 2vw; margin-right: 0vw; position: absolute; right: 0vw; top: 0vw;">
  ';

  $total_links = ceil($total_data / $limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';
  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count;
  }


  for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
      $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
      }
    }
  }

  $output .= $previous_link . $page_link . $next_link;
  $output .= '
  </ul>
  </div>
  </div>
</div>
</div>
';
} else {
  $output .= ' No Users Available To Show! ';
}
echo $output;
?>



<!DOCTYPE html>
<html>

<head>
  <title>Request approval</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
</head>

<body>

</body>

</html>