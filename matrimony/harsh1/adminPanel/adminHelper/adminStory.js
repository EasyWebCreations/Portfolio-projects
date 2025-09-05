function adminStoryAdd() {
  $(document).ready(function () {
    let var_name = $("#var_name").val();
    let vadhu_name = $("#vadhu_name").val();
    let var_id = $("#var_id").val();
    let vadhu_id = $("#vadhu_id").val();
    // let couple_img = $("#inputGroupFile01").val();
    let story_details = $("#story_details").val();
    // console.log("Form Submit Called2");
    // console.log(fname + ' ' + mname + ' ' + lname + ' ' + call + ' ' + mobileno + ' ' + email + ' ' + gender + ' ' + marital);





    console.log("filePath");
    var fd = new FormData();
    var files;
    var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
    if (viewWidthForImgUpload.matches) {
      files = $('#inputGroupFile01')[0].files;
    } else {
      files = $('#inputGroupFile01')[0].files;
    }
    fd.append('file', files[0]);
    $(document).ready(function () {
      $.ajax({
        url: "adminHelper/adminStoryImg.php",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function (response1) {
          // alert(response);
          // adminPanelPartLoad('ADMIN_OUR_STORIES');
          if (response1) {
            $.ajax({
              type: 'post',
              url: 'adminHelper/adminStoryQ.php',
              data: {
                var_name: var_name,
                vadhu_name: vadhu_name,
                var_id: var_id,
                vadhu_id: vadhu_id,
                couple_img: response1,
                story_details: story_details
              },
              success: function (response) {
                alert(response);
                adminPanelPartLoad('ADMIN_OUR_STORIES');
              }
            });
          }
          else {
            alert('Error Updating Story!');
          }
        }
      });
    });


    // $.ajax({
    //   type: 'post',
    //   url: 'helper/adminStoryQ.php',
    //   data: {
    //     event_name: event_name,
    //     event_details: event_details,
    //     event_date: event_date,
    //     event_time: event_time
    //   },
    //   success: function (response) {
    //     alert(response);
    //     adminPanelPartLoad('ADMIN_OUR_STORIES');
    //   }
    // });
  });
}

var storyIDToDelete;
function adminStoryDelete(storyDelEl) {
  storyIDToDelete = $(storyDelEl).data("custom-value");
  console.log(storyIDToDelete);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminStoryDelete.php",
      method: "POST",
      data: {
        storyIDToDelete: storyIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Story Removed Succesfully!');
          adminPanelPartLoad('ADMIN_OUR_STORIES');
        }
        else {
          alert('Error Removing Story! Please Try Again...');
        }
      }
    });
  });
}

function adminMultiStoryDel() {
  var checkedValue = document.querySelector('.form-check-input:checked').value;
  var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
  let checkedValues = [];
  for (var checkbox of markedCheckbox) {
    checkedValues.push(checkbox.value);
  }
  // console.log(checkedValues);
  storyIDToDelete = JSON.stringify(checkedValues);
  $(document).ready(function () {
    $.ajax({
      url: "adminHelper/adminStoryDelete.php",
      method: "POST",
      data: {
        storyIDToDelete: storyIDToDelete,
      },
      success: function (data) {
        if (data) {
          alert('Stories Removed Succesfully!');
          adminPanelPartLoad('ADMIN_OUR_STORIES');
        }
        else {
          alert('Error Removing Stories! Please Try Again...');
        }
      }
    });
  });
}