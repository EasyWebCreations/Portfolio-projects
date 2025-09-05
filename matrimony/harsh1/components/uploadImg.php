<html lang="en">

<head>
  <title>Upload Image</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
  <!-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css"> -->
  <style>
    /* @media screen and (max-width: 720px) {
      .row {
        border: 1px solid green;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
      }

      #upload-demo {
        border: 1px solid blue;
        width: 30vw;
      }

      .uploadImgOpt {
        border: 1px solid blue;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
      }
    } */

    /* @media screen and (min-width: 721px) { */
    .rowForUploadImg {
      /* border: 1px solid red; */
      /* margin-top: 0.5vw; */
      /* background: aqua; */
      background: white;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      visibility: hidden;
      position: fixed;
      top: 2vh;
      left: 2vw;
      z-index: 5;
      height: 0vh;
      width: 0vw;
      max-height: 96vh;
      overflow-y: scroll;
      border-radius: 1vw;
      box-shadow: 0.1vw 0.1vw 0.7vw rgb(0, 0, 0, 0.3);
    }

    #upload-demo {
      /* border: 1px solid blue; */
      display: inline-block;
      margin-top: 0.5vw;
      position: relative;
      height: 555px;
      /* width: 50vw; */
    }

    .uploadImgOpt {
      /* border: 1px solid blue; */
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      align-items: center;
      margin-bottom: 0.5vw;
      position: relative;
    }

    .closeUpload {
      position: absolute;
      top: 1vw;
      right: 1vw;
    }

    /* } */
  </style>
</head>

<body>


  <!-- <div class="container"> -->
  <!-- <div class="panel panel-default"> -->
  <!-- <div class="panel-heading">Image Upload</div> -->
  <!-- <div class="panel-body"> -->


  <div class="rowForUploadImg">
    <!-- <div class="col-md-4 text-center"> -->
    <div id="upload-demo" style="position: relative;"></div>
    <!-- </div> -->
    <div class="uploadImgOpt">
      <strong>Select Image:</strong>
      <br />
      <input type="file" id="upload">
      <br />
      <button class="btn btn-success upload-result">Upload Image</button>
    </div>
    <!-- <div class="col-md-4">
      <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
    </div> -->
    <button class="btn btn-danger upload-result closeUpload">Close</button>
  </div>

  <!-- <span class="closeUpload">Close</span> -->


  <!-- </div>
    </div>
  </div> -->


  <script type="text/javascript">
    var fileExt = '';
    $uploadCrop = $('#upload-demo').croppie({
      enableExif: true,
      viewport: {
        width: 480,
        height: 480,
        type: 'square'
      },
      boundary: {
        width: 500,
        height: 500
      }
    });


    $('#upload').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        // fileExt = e.target.files[0].type;
        var filePath = $("#upload").val();
        fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
        // console.log("File Extension ->-> " + file_ext);
        $uploadCrop.croppie('bind', {
          url: e.target.result
        }).then(function() {
          console.log('jQuery bind complete');
        });

      }
      reader.readAsDataURL(this.files[0]);
    });


    $('.upload-result').on('click', function(ev) {
      $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(resp) {


        $.ajax({
          url: "../../MatrimonialSiteProject/MySampleAkshadaa/MySampleAkshadaa/harsh1/helper/profileImg.php",
          type: "POST",
          data: {
            "image": resp,
            "fileExt": fileExt
          },
          success: function(data) {
            html = '<img src="' + resp + '" />';
            // $("#upload-demo-i").html(html);
            alert("Profile Image Uploaded Successfully!");
          }
        });
      });
    });
  </script>


</body>

</html>