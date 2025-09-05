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
SELECT * FROM our_stories ";

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
  <div class="ourStoriesFormHeading">Our Stories</div>
  <table>
    <tbody>
      <tr>
        <td>Var Name</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe4eb;</i></span>
            </div>
            <input id="var_name" type="text" class="form-control inputGroup-sizing-sm" placeholder="Var Name" aria-label="Var Name" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Vadhu Name</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe13e;</i></span>
            </div>
            <input id="vadhu_name" type="text" class="form-control inputGroup-sizing-sm" placeholder="Vadhu Name" aria-label="Vadhu Name" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Var Akshadaa ID</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xea67;</i></span>
            </div>
            <input id="var_id" type="text" class="form-control inputGroup-sizing-sm" placeholder="Var Akshadaa ID" aria-label="Var Akshadaa ID" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Vadhu Akshadaa ID</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xea67;</i></span>
            </div>
            <input id="vadhu_id" type="text" class="form-control inputGroup-sizing-sm" placeholder="Vadhu Akshadaa ID" aria-label="Vadhu Akshadaa ID" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Couple Image</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">&#xe439;</i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>Message/Story</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">&#xe3c9;</i></span>
            </div>
            <textarea id="story_details" class="form-control" aria-label="With textarea" placeholder="Message/Story"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button onclick="adminStoryAdd()" class="addUser" style="margin: 1vw auto;">
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
              <h2><b>Our Stories</b></h2>
            </div>
            <div class="col-sm-7">
              <a href="#" onclick="adminMultiStoryDel()" class="btn btn-secondary"><i style="color: red;" class="material-icons">&#xE5C9;</i> <span>Delete Marked Stories</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>Var Name</th>
              <th>Vadhu Name</th>
              <th>Var ID</th>
              <th>Vadhu ID</th>
              <th>Couple Image</th>
              <th>Message/Story</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $output .= '
    <tr>
      <td class="checkBox"><input class="form-check-input" type="checkbox" value="' . $row['story_id'] . '" id="flexCheckDefault">
      </td>
      <td>' . $row['var_name'] . '</td>
      <td>' . $row['vadhu_name'] . '</td>
      <td>' . $row['var_id'] . '</td>
      <td>' . $row['vadhu_id'] . '</td>
      <td><img src="' . $row['couple_img'] . '" class="avatar" alt="Avatar"></td>
      <td>' . $row['story_details'] . '</td>
      <td>
        <a href="#" data-custom-value="' . $row['story_id'] . '" onclick="adminStoryDelete(this)" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
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
      <a class="page-link page-link-adminOurStories" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link page-link-adminOurStories" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminOurStories" href="#">Previous</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link page-link-adminOurStories" href="#">Next</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link page-link-adminOurStories" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link page-link-adminOurStories" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link page-link-adminOurStories" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
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
  $output .= ' No Stories Available To Show! ';
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
  <div class="ourStoriesFormHeading">Our Stories</div>
  <table>
    <tbody>
      <tr>
        <td>Var</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe4eb;</i></span>
            </div>
            <input type="text" class="form-control inputGroup-sizing-sm" placeholder="Var" aria-label="Var" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Vadhu</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xe13e;</i></span>
            </div>
            <input type="text" class="form-control inputGroup-sizing-sm" placeholder="Vadhu" aria-label="Vadhu" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Var Akshadaa ID</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xea67;</i></span>
            </div>
            <input type="text" class="form-control inputGroup-sizing-sm" placeholder="Var Akshadaa ID" aria-label="Var Akshadaa ID" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Vadhu Akshadaa ID</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="material-icons">&#xea67;</i></span>
            </div>
            <input type="text" class="form-control inputGroup-sizing-sm" placeholder="Vadhu Akshadaa ID" aria-label="Vadhu Akshadaa ID" aria-describedby="basic-addon1">
          </div>
        </td>
      </tr>
      <tr>
        <td>Couple Image</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">&#xe439;</i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>Message/Story</td>
        <td>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">&#xe3c9;</i></span>
            </div>
            <textarea class="form-control" aria-label="With textarea" placeholder="Message/Story"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button class="addUser" style="margin: 1vw auto;">
            Add
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div> -->