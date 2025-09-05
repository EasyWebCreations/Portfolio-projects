<?php

// $connect = new PDO("mysql:host=localhost; dbname=u352929645_akshadaa_main", "u352929645_akshadaa_main", "Ecct@29052000");

session_start();
include_once("adminConnect.php");

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
SELECT id, profile_img, fname, lname, mobile,email, gender, create_time FROM per_details WHERE id <> '11111' ";

if ($_POST['query'] != '') {
  $query .= '
  AND fname LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" 
  ';
}

$query .= ' ORDER BY fname ASC ';

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
              <h2><b>User Management</b></h2>
            </div>
            <div class="col-sm-8" style="display: flex; align-items: center; justify-content: flex-end;">
              <a href="#" onclick="exportIdforPdf()" class="btn btn-secondary"><i class="material-icons">&#xe415;</i> <span>Export PDF</span></a>
              <a href="#" onclick="adminMultiUserDel()" class="btn btn-secondary"><i style="color: red;" class="material-icons">&#xE5C9;</i> <span>Delete Marked User(s)</span></a>
              <input style="width: 12vw" type="text" name="search_box" id="search_box" class="form-control btn btn-secondary" placeholder="Type to Search" />
              <a href="#" style="background: white;" id="searchBtn" class="btn btn-secondary"><i style="color: black;" class="material-icons">&#xe8b6;</i></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>UserID</th>
              <th>Name</th>
              <th>Date Created</th>
              <th>Phone No.</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Payment</th>
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
      <td>' . $row['id'] . '</td>
      <td><a href="#"><img src="' . $row['profile_img'] . '" class="avatar" alt="Avatar"> ' . $row['fname'] . ' ' . $row['lname'] . '</a>
      </td>
      <td>' . $row['create_time'] . '</td>
      <td>' . $row['mobile'] . '</td>
      <td>' . $row['email'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>Online</td>
      <td>
        <a href="userProfileAdmin.php?passYourID=' . $row['id'] . '" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
        <a href="#" data-custom-value="' . $row['id'] . '" onclick="adminUserDelete(this)" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
        <a href="adminchatbox.php?id=' . $row['id'] . '" class="chat" title="Chat"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
      </svg></a>
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
  <!-- <div class="container-xl" id="container_xl"> -->
  <!-- <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-5">
              <h2><b>User Management</b></h2>
            </div>
            <div class="col-sm-7">
              <a href="#" class="btn btn-secondary"><i class="material-icons">&#xe8b6;</i> <span>Search
                  User</span></a>
              <a href="#" class="btn btn-secondary"><i class="material-icons">&#xe415;</i> <span>Export PDF</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>UserID</th>
              <th>Name</th>
              <th>Date Created</th>
              <th>Phone No.</th>
              <th>Gender</th>
              <th>Payment</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> -->
  <!-- <tr>
              <td class="checkBox"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </td>
              <td>12345</td>
              <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Michael Holz</a>
              </td>
              <td>04/10/2013</td>
              <td>1234567890</td>
              <td>Male</td>
              <td>Online</td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr> -->
  <!-- <tr>
              <td class="checkBox"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </td>
              <td>23456</td>
              <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Paula Wilson</a>
              </td>
              <td>05/08/2014</td>
              <td>1234567890</td>
              <td>Female</td>
              <td>Cash</td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            <tr>
              <td class="checkBox"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </td>
              <td>34567</td>
              <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Antonio Moreno</a>
              </td>
              <td>11/05/2015</td>
              <td>1234567890</td>
              <td>Male</td>
              <td>Cash</td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            <tr>
              <td class="checkBox"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </td>
              <td>45678</td>
              <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Mary Saveley</a>
              </td>
              <td>06/09/2016</td>
              <td>1234567890</td>
              <td>Female</td>
              <td>Online</td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
            <tr>
              <td class="checkBox"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </td>
              <td>56789</td>
              <td><a href="#"><img src="../user3.png" class="avatar" alt="Avatar"> Martin Sommer</a>
              </td>
              <td>12/08/2017</td>
              <td>1234567890</td>
              <td>Male</td>
              <td>Online</td>
              <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr> -->
  <!-- </tbody>
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
  </div> -->
  <!-- </div> -->
</body>

</html>
<!-- <script>
  $(document).ready(function() {

    load_data(1);

    function load_data(page, query = '') {
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          page: page,
          query: query
        },
        success: function(data) {
          $('#container_xl').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function() {
      var page = $(this).data('page_number');
      var query = '';
      // var query = $('#search_box').val();
      load_data(page, query);
    });

    // $('#search_box').keyup(function() {
    //     var query = $('#search_box').val();
    //     load_data(1, query);
    // });

  });
</script> -->