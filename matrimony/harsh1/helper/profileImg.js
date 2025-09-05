var clickDetectVal;
let rowForUploadImg = document.getElementsByClassName("rowForUploadImg");

function clickDetect() {
  clickDetectVal = 1;
  // alert("before");
  console.log("clickDetectVal " + clickDetectVal);
  console.log("Style: " + rowForUploadImg[0].style.visibility);
  // alert("after");

  // function uploadImageOpen() {
  if (rowForUploadImg[0].style.visibility == "hidden" || rowForUploadImg[0].style.visibility == "") {
    rowForUploadImg[0].style.visibility = "visible";
    rowForUploadImg[0].style.width = "90vw";
    rowForUploadImg[0].style.height = "90vh";
  } else {
    rowForUploadImg[0].style.width = "0vw";
    rowForUploadImg[0].style.width = "0vw";
    rowForUploadImg[0].style.visibility = "hidden";
  }
  // }
}

var fileExt = '';
$uploadCrop = $('#upload-demo').croppie({
  enableExif: true,
  viewport: {
    width: 370,
    height: 370,
    type: 'square'
  },
  boundary: {
    width: 430,
    height: 430
  }
});


$('#upload').on('change', function () {
  var reader = new FileReader();
  reader.onload = function (e) {
    // fileExt = e.target.files[0].type;
    var filePath = $("#upload").val();
    fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
    // console.log("File Extension ->-> " + file_ext);
    $uploadCrop.croppie('bind', {
      url: e.target.result
    }).then(function () {
      console.log('jQuery bind complete');
    });

  }
  reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {


    $.ajax({
      url: "helper/profileImg.php",
      type: "POST",
      data: {
        "image": resp,
        "fileExt": fileExt
      },
      success: function (data) {
        html = '<img src="' + resp + '" />';
        // $("#upload-demo-i").html(html);
        alert("Profile Image Uploaded Successfully!");
      }
    });
  });
});