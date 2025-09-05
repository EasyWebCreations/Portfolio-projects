<?php

require 'vendor/autoload.php';

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
$key = basename($file_Path);

// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
  $result = $s3Client->putObject([
    'Bucket' => $bucket,
    'Key'    => "fp_vac/" . "{$key}",
    'Body'   => fopen($file_Path, 'r'),
    'ACL'    => 'public-read', // make file 'public'
  ]);
  $fParentCerLink = "https://testing-aws-php.s3.ap-south-1.amazonaws.com/fp_vac/" . strval($key);
  echo $fParentCerLink;
  unlink($tmp_file_path);
} catch (Aws\S3\Exception\S3Exception $e) {
  echo "0";
}
