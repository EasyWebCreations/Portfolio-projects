<?php
// session_start();
// include_once("../../backend/connect.php");

require '../../helper/vendor/autoload.php';

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

// Instantiate an Amazon S3 client.
$s3Client = new S3Client([
  'version' => 'latest',
  'region'  => 'ap-south-1',
  'credentials' => [
    'key'    => 'AKIAVNHFXNZOOUYFJPVT',
    'secret' => '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'
  ]
]);
// if (isset($_FILES['file'])) {
$file = $_FILES['file'];

// //File details
$name = $file['name'];
$tmp_name = $file['tmp_name'];

$extension = explode('.', $name);
$extension = strtolower(end($extension));

$key = md5(uniqid());
$tmp_file_name = "{$key}.{$extension}";
$tmp_file_path = "{$tmp_file_name}";


move_uploaded_file($tmp_name, $tmp_file_path);



$bucket = 'testing-aws-php';
$file_Path = $tmp_file_path;
// $file_Path = $_POST['filePath'];
// $file_Path = '../MatrimonialSiteProject/aboutUs.svg';
// $file_Path = 'D:/profileImg.png';
$key = basename($file_Path);

// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
  $result = $s3Client->putObject([
    'Bucket' => $bucket,
    'Key'    => "couple-imgs/" . "{$key}",
    'Body'   => fopen($file_Path, 'r'),
    'ACL'    => 'public-read', // make file 'public'
  ]);
  // echo "Image uploaded successfully. Image path is: " . $result->get('ObjectURL');
  $coupleImgURL = "https://testing-aws-php.s3.ap-south-1.amazonaws.com/couple-imgs/" . strval($key);
  // $queryProfileImg = "UPDATE per_details SET profile_img=? WHERE id={$_SESSION['unique_id']}";
  // $stmtProfileImg = $conn->prepare($queryProfileImg);
  // $stmtProfileImg->bind_param("s", $profileImgURL);
  // $querySuccess = $stmtProfileImg->execute();
  // if ($stmtProfileImg->execute()) {
  //   echo "1" . $profileImgURL;
  // } else {
  //   echo "0";
  // }
  echo $coupleImgURL;
  unlink($tmp_file_path);
} catch (Aws\S3\Exception\S3Exception $e) {
  // echo "There was an error uploading the file.\n";
  // echo $e->getMessage();
  echo false;
}
// }
// echo $_POST['file'];
