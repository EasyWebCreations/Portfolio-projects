var userIDToDelete;
function adminUserDelete(delEl) {
  userIDToDelete = $(delEl).data("custom-value");
  console.log(userIDToDelete);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminUserDelete.php",
      method: "POST",
      data: {
        userIDToDelete: userIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('User Removed Succesfully!');
          adminPanelPartLoad('ADMIN_USERS');
        }
        else {
          alert('Error Removing User! Please Try Again...');
        }
      }
    });
  });
}

function adminMultiUserDel() {
  var checkedValue = document.querySelector('.form-check-input:checked').value;
  var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
  let checkedValues = [];
  for (var checkbox of markedCheckbox) {
    checkedValues.push(checkbox.value);
  }
  // console.log(checkedValues);
  userIDToDelete = JSON.stringify(checkedValues);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminUserDelete.php",
      method: "POST",
      data: {
        userIDToDelete: userIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('User(s) Removed Succesfully!');
          adminPanelPartLoad('ADMIN_USERS');
        }
        else {
          alert('Error Removing User(s)! Please Try Again...');
        }
      }
    });
  });
}