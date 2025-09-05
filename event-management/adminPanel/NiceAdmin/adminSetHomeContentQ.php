<?php
$handlerDetails = fopen('../../helper/melDetails.txt', 'w');
fwrite($handlerDetails, trim($_POST['melDetails']));
fclose($handlerDetails);
// echo trim($_POST['melDetails']);
$handlerDate = fopen('../../helper/melDate.txt', 'w');
fwrite($handlerDate, trim($_POST['melDate']));
fclose($handlerDate);
