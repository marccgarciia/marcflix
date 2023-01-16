<?php
session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    echo 'fileTmpPath -> '.$fileTmpPath.'<br/>';
    echo 'fileName -> '.$fileName.'<br/>';
    echo 'fileSize -> '.$fileSize.'<br/>';
    echo 'fileType -> '.$fileType.'<br/>';
    print_r( 'fileNameCmps -> '. $fileNameCmps.'<br/>');
    echo 'fileExtension -> '.$fileExtension.'<br/>';
    echo 'Extension -> '.$extension.'<br/>';

    // sanitize file-name
    // $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // echo 'newFileName con md5 '.$newFileName.'<br/>';
    $newFileName = $fileName;
    echo 'newFileName sin md5 -> '.$newFileName.'<br/>';

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '/upload_files/';
      $dest_path = $uploadFileDir . $newFileName;
      echo 'dest_path '.$dest_path.'<br/>';

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
//header("Location: upload.php");