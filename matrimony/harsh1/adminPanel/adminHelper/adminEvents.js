function adminEventAdd() {
  $(document).ready(function () {
    let event_name = $("#event_name").val();
    let event_details = $("#event_details").val();
    let event_date = $("#event_date").val();
    let event_time = $("#event_time").val();
    // console.log("Form Submit Called2");
    // console.log(fname + ' ' + mname + ' ' + lname + ' ' + call + ' ' + mobileno + ' ' + email + ' ' + gender + ' ' + marital);

    $.ajax({
      type: 'post',
      url: 'adminHelper/adminEventsQ.php',
      data: {
        event_name: event_name,
        event_details: event_details,
        event_date: event_date,
        event_time: event_time
      },
      success: function (response) {
        alert(response);
        adminPanelPartLoad('ADMIN_EVENTS');
      }
    });
  });
}

var eventIDToDelete;
function adminEventsDelete(eventDelEl) {
  eventIDToDelete = $(eventDelEl).data("custom-value");
  console.log(eventIDToDelete);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminEventsDelete.php",
      method: "POST",
      data: {
        eventIDToDelete: eventIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Event Removed Succesfully!');
          adminPanelPartLoad('ADMIN_EVENTS');
        }
        else {
          alert('Error Removing Event! Please Try Again...');
        }
      }
    });
  });
}

function adminMultiEventsDel() {
  var checkedValue = document.querySelector('.form-check-input:checked').value;
  var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
  let checkedValues = [];
  for (var checkbox of markedCheckbox) {
    checkedValues.push(checkbox.value);
  }
  // console.log(checkedValues);
  eventIDToDelete = JSON.stringify(checkedValues);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminEventsDelete.php",
      method: "POST",
      data: {
        eventIDToDelete: eventIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Event(s) Removed Succesfully!');
          adminPanelPartLoad('ADMIN_EVENTS');
        }
        else {
          alert('Error Removing Event(s)! Please Try Again...');
        }
      }
    });
  });
}