// function adminEventAdd() {
//   $(document).ready(function () {
//     let event_name = $("#event_name").val();
//     let event_details = $("#event_details").val();
//     let event_date = $("#event_date").val();
//     let event_time = $("#event_time").val();
//     // console.log("Form Submit Called2");
//     // console.log(fname + ' ' + mname + ' ' + lname + ' ' + call + ' ' + mobileno + ' ' + email + ' ' + gender + ' ' + marital);

//     $.ajax({
//       type: 'post',
//       url: 'adminHelper/adminEventsQ.php',
//       data: {
//         event_name: event_name,
//         event_details: event_details,
//         event_date: event_date,
//         event_time: event_time
//       },
//       success: function (response) {
//         alert(response);
//         adminPanelPartLoad('ADMIN_EVENTS');
//       }
//     });
//   });
// }

var enqIDToDelete;
function adminEnqDel(enqDelEl) {
  enqIDToDelete = $(enqDelEl).data("custom-value");
  console.log(enqIDToDelete);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminEnqDelete.php",
      method: "POST",
      data: {
        enqIDToDelete: enqIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Row Removed Succesfully!');
          adminPanelPartLoad('ADMIN_ENQUIRY');
        }
        else {
          alert('Error Removing Row! Please Try Again...');
        }
      }
    });
  });
}

function adminMultiEnqDel() {
  var checkedValue = document.querySelector('.form-check-input:checked').value;
  var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
  let checkedValues = [];
  for (var checkbox of markedCheckbox) {
    checkedValues.push(checkbox.value);
  }
  // console.log(checkedValues);
  enqIDToDelete = JSON.stringify(checkedValues);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminEnqDelete.php",
      method: "POST",
      data: {
        enqIDToDelete: enqIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Row(s) Removed Succesfully!');
          adminPanelPartLoad('ADMIN_ENQUIRY');
        }
        else {
          alert('Error Removing Row(s)! Please Try Again...');
        }
      }
    });
  });
}