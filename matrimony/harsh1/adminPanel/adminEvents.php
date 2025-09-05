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
SELECT * FROM events ";

// $query .= 'ORDER BY event_name ASC ';

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<div class="ourStoriesFormOut">
<div class="ourStoriesFormHeading">Events</div>
<table>
  <tbody>
    <tr>
      <td>Event Name</td>
      <td>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe878;</i></span>
          </div>
          <input id="event_name" type="text" class="form-control inputGroup-sizing-sm" placeholder="Event Name" aria-label="Event Name" aria-describedby="basic-addon1">
        </div>
      </td>
    </tr>
    <tr>
      <td>Event Details</td>
      <td>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="material-icons">&#xe3c9;</i></span>
          </div>
          <textarea id="event_details" class="form-control" placeholder="Event Details"></textarea>
        </div>
      </td>
    </tr>
    <tr>
      <td>Event Date</td>
      <td>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe935;</i></span>
          </div>
          <input id="event_date" type="Date" class="form-control inputGroup-sizing-sm" placeholder="Event Date" aria-label="Event Date" aria-describedby="basic-addon1">
        </div>
      </td>
    </tr>
    <tr>
      <td>Event Time</td>
      <td>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe8b5;</i></span>
          </div>
          <input id="event_time" type="Time" class="form-control inputGroup-sizing-sm" placeholder="Event Time" aria-label="Event Time" aria-describedby="basic-addon1">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <button onclick="adminEventAdd()" class="addUser" style="margin: 1vw auto;">
          Add
        </button>
      </td>
    </tr>
  </tbody>
</table>
</div>
';

if ($total_data > 0) {

  $output .= '

<div class="container-xl" id="container_xl">
<div class="table-responsive"><div id="userPdf"></div>
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-5">
              <h2><b>Events</b></h2>
            </div>
            <div class="col-sm-7">
              <a href="#" onclick="adminMultiEventsDel()" class="btn btn-secondary"><i style="color: red;" class="material-icons">&#xE5C9;</i> <span>Delete Marked Event(s)</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>Event Name</th>
              <th>Event Details</th>
              <th>Event Date</th>
              <th>Event Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $output .= '
    <tr>
      <td class="checkBox"><input class="form-check-input" type="checkbox" value="' . $row['event_id'] . '" id="flexCheckDefault">
      </td>
      <td>' . $row['event_name'] . '</td>
      <td>' . $row['event_details'] . '</td>
      <td>' . $row['event_date'] . '</td>
      <td>' . $row['event_time'] . '</td>
      <td>
        <a href="#" data-custom-value="' . $row['event_id'] . '" onclick="adminEventsDelete(this)" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
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
      <a class="page-link page-link-adminEvents" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link page-link-adminEvents" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminEvents" href="#">Previous</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminEvents" href="#">Next</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link page-link-adminEvents" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link page-link-adminEvents" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link page-link-adminEvents" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
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
  $output .= ' No Events Available To Show! ';
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





































<!-- <div class="ourStoriesFormOut">
  <div class="ourStoriesFormHeading">Events</div>
  <table>
    <tbody>
      <tr>
        <td>Event Name</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe878;</i></span>
            </div>
            <input id="event_name" type="text" class="form-control inputGroup-sizing-sm" placeholder="Event Name" aria-label="Event Name" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Event Details</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">&#xe3c9;</i></span>
            </div>
            <textarea id="event_details" class="form-control" aria-label="With textarea" placeholder="Event Details"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td>Event Date</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe935;</i></span>
            </div>
            <input id="event_date" type="Date" class="form-control inputGroup-sizing-sm" placeholder="Event Date" aria-label="Event Date" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Event Time</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe8b5;</i></span>
            </div>
            <input id="event_time" type="Time" class="form-control inputGroup-sizing-sm" placeholder="Event Time" aria-label="Event Time" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button onclick="adminEventAdd()" class="addUser" style="margin: 1vw auto;">
            Add
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div> -->