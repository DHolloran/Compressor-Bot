<?php
// Setup Uploader
  require_once "upload.php";
  $upload = new Upload();
// Setup Downloader
  require_once "downloader.php";
  $downloader = new Downloader();
  var_dump(is_writable('files/'));
// Restrict .html,.js.css files
  $upload->setAllowExt(array('html','js','css'));
// Upload Files
  if(isset($_FILES)&& isset($_FILES['file'])){
    $file =$upload->upload($_FILES['file']);
    if(false===$file){
        print_r($upload->getMsg());
    }else {
        echo 'file has been uploaded, and file id is '.$file;
    }
  }
  // if($_POST['download'] === 'true'){
  //   $downloader->setFolderName('compressorbot');
  //   $folderPath = 'files/$fileid';
  //   $downloader->setFiles('files/');
  // }
?>
