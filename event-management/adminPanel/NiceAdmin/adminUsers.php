<?php

// $connect = new PDO("mysql:host=us-cdbr-east-04.cleardb.com; dbname=heroku_16d720eebdfffe6", "bfe13655e3a0f5", "e96f17d7");

// $connect = new PDO("mysql:host=217.21.74.90; dbname=u352929645_akshadaaevent", "u352929645_easytechs", "Ecct@29052000");
// $connect = new PDO("mysql:host=localhost; dbname=u352929645_akshadaaevent", "u352929645_easytechs", "Ecct@29052000");

include_once('../../connect1.php');

session_start();

// function get_total_row($connect)
// {
//   $query = "
//   SELECT * FROM tbl_webslesson_post
//   ";
//   $statement = $connect->prepare($query);
//   $statement->execute();
//   return $statement->rowCount();
// }

// $total_record = get_total_row($connect);

$limit = '5';
$page = 1;
if (isset($_POST['page']) && $_POST['page'] > 1) {
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
} else {
  $start = 0;
}

$query = "
SELECT id, anubandhaId, biodata, firstname, lastname, email, contactnumber, payment_Status, date_created FROM users Where `contactnumber` != 0 ";

if ($_POST['query'] != '') {
  $query .= '
  AND firstname LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" 
  ';
}

$query .= ' ORDER BY firstname ASC ';

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
<div class="container-xl" id="container_xl">
<div class="table-responsive"><div id="userPdf"></div>
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-4">
              <h2><b>Users</b></h2>
            </div>
            <div class="col-sm-8" style="display: flex; align-items: center; justify-content: flex-end;">
              <a href="#" onclick="adminMultiUserDel()" class="btn btn-secondary"><i style="color: red;" class="material-icons">&#xE5C9;</i> <span>Delete Marked User(s)</span></a>
              <input style="width: 12vw" type="text" name="search_box" id="search_box" class="form-control btn btn-secondary" placeholder="Type to Search" />
              <a href="#" style="background: white;" id="searchBtn" class="btn btn-secondary"><i style="color: black;" class="material-icons">&#xe8b6;</i></a>
            </div>
          </div>
        </div>
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>UserID</th>
              <th>Name</th>
              <th>Date Created</th>
              <th>Email</th>
              <th>Phone No.</th>
              <th>Payment Status</th>
              <th>Payment Mode</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $output .= '
    <tr>
      <td class="checkBox"><input class="form-check-input" type="checkbox" value="' . $row['id'] . '" id="flexCheckDefault">
      </td>
      <td>' . $row['anubandhaId'] . '</td>
      <td><a href="#"><img src="' . $row['biodata'] . '" class="avatar"> ' . $row['firstname'] . ' ' . $row['lastname'] . '</a>
      </td>
      <td>' . $row['date_created'] . '</td>
      <td>' . $row['email'] . '</td>
      <td>' . $row['contactnumber'] . '</td>
      <td>' . $row['payment_Status'] . '</td>
      <td>Online</td>
      <td>
        <a href="userProfileAdmin.php?passYourID=' . $row['id'] . '" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
        <a href="#" data-custom-value="' . $row['id'] . '" onclick="adminUserDelete(this)" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
        </td>
    </tr>
    ';
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

  //echo $total_links;

  // if ($total_links > 4) {
  //   if ($page < 4) {
  //     for ($count = 1; $count < 4; $count++) {
  //       $page_array[] = $count;
  //     }
  //     $page_array[] = '...';
  //     for ($count = 4; $count <= $total_links; $count++) {
  //       $page_array[] = $count;
  //     }
  //     // $page_array[] = $total_links;
  //   } else {
  //     $end_limit = $total_links - 4;
  //     if ($page > $end_limit) {
  //       $page_array[] = 1;
  //       $page_array[] = '...';
  //       for ($count = $end_limit; $count < $total_links; $count++) {
  //         $page_array[] = $count;
  //       }
  //     } else {
  //       $page_array[] = 1;
  //       $page_array[] = '...';
  //       for ($count = $page - 1; $count < $page + 1; $count++) {
  //         $page_array[] = $count;
  //       }
  //       $page_array[] = '...';
  //       $page_array[] = $total_links;
  //     }
  //   }
  // } else {
  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count;
  }
  // }

  for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
      $page_link .= '
    <li class="page-item active">
      <a class="page-link page-link-adminUsers" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link page-link-adminUsers" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminUsers" href="#">Previous</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminUsers" href="#">Next</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link page-link-adminUsers" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link page-link-adminUsers" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link page-link-adminUsers" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
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
    <title>Live Data Search with Pagination in PHP using Ajax</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
        integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
</head>

<body>
</body>

</html>