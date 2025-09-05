<?php
// include_once('../../backend/connect.php');
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
SELECT * FROM report WHERE report_decision = 'Approved'";

// $query .= 'ORDER BY event_name ASC ';

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
            <div class="col-sm-5">
              <h2><b>Blocked Users</b></h2>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email-ID</th>
              <th>Phone No.</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
';

  // $result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '00000'");
  // $rowReportBy = mysqli_fetch_assoc(mysqli_query($conn, "SELECT fname, lname, profile_img FROM per_details WHERE id={$row['reported_by']}"))['fname'];

  if ($total_data > 0) {
    foreach ($result as $row) {
      // $rowReportBy = mysqli_fetch_assoc(mysqli_query($conn, "SELECT fname, lname, profile_img, email, mobile FROM per_details WHERE id={$row['reported_by']}"));
      $rowReportTo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT fname, lname, profile_img, email, mobile FROM per_details WHERE id={$row['reported_to']}"));
      $output .= '
    <tr>
      <td></td>
      <td><a href="#"><img src="' . $rowReportTo['profile_img'] . '" class="avatar" alt="Avatar"> ' . $rowReportTo['fname'] . ' ' . $rowReportTo['lname'] . '</a></td>
      <td>' . $rowReportTo['email'] . '</td>
      <td>' . $rowReportTo['mobile'] . '</td>
      <td>' . $row['report_time'] . '</td>
      <td>
      <button type="button" onclick="unblockUser(this)" value="' . $row['reported_by'] . ' ' . $row['reported_to'] . '" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
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

  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count;
  }

  for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
      $page_link .= '
    <li class="page-item active">
      <a class="page-link page-link-adminBlockedUsers" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link page-link-adminBlockedUsers" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminBlockedUsers" href="#">Previous</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminBlockedUsers" href="#">Next</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link page-link-adminBlockedUsers" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link page-link-adminBlockedUsers" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link page-link-adminBlockedUsers" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
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
  $output .= ' No Data To Show! ';
}
echo $output;
?>




<!DOCTYPE html>
<html>

<head>
  <title>Live Data Search with Pagination in PHP using Ajax</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
</head>

<body>
</body>

</html>

























<!-- <div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-5">
            <h2><b>Blocked Users</b></h2>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Name</th>
            <th>Email-ID</th>
            <th>Phone No.</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Michael Holz</a>
            </td>
            <td>example@gmail.com</a></td>
            <td>1234567890</td>
            <td>00/00/0000</td>
            <td>
              <button type="button" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Paula Wilson</a>
            </td>
            <td>example@gmail.com</a></td>
            <td>1234567890</td>
            <td>00/00/0000</td>
            <td>
              <button type="button" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Antonio Moreno</a>
            </td>
            <td>example@gmail.com</a></td>
            <td>1234567890</td>
            <td>00/00/0000</td>
            <td>
              <button type="button" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Mary Saveley</a>
            </td>
            <td>example@gmail.com</a></td>
            <td>1234567890</td>
            <td>00/00/0000</td>
            <td>
              <button type="button" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Martin Sommer</a>
            </td>
            <td>example@gmail.com</a></td>
            <td>1234567890</td>
            <td>00/00/0000</td>
            <td>
              <button type="button" class="btn btn-success btn-sm text-nowrap">Unblock User</button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="clearfix">
        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
        <ul class="pagination">
          <li class="page-item disabled"><a href="#">Previous</a></li>
          <li class="page-item"><a href="#" class="page-link">1</a></li>
          <li class="page-item"><a href="#" class="page-link">2</a></li>
          <li class="page-item active"><a href="#" class="page-link">3</a></li>
          <li class="page-item"><a href="#" class="page-link">4</a></li>
          <li class="page-item"><a href="#" class="page-link">5</a></li>
          <li class="page-item"><a href="#" class="page-link">Next</a></li>
        </ul>
      </div>
    </div>
  </div>
</div> -->