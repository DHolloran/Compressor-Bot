<?php
// Setup Uploader
  if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
    require_once "localhost-upload.php";
  }else{
    require_once "live-upload.php";
  }
  $upload = new Upload();

// Restrict .html,.js.css files
  $upload->setAllowExt(array('html','js','css'));

// Vars
  $fileName = $_FILES['file']['name'];
  $tool = $_POST['tool'];

// Upload Files
  if(isset($_FILES)&& isset($_FILES['file'])){
    $file =$upload->upload($_FILES['file']);
    if(false===$file){
      echo json_encode(false);
    }else {
        $url = "upload/{$file}/${fileName}";
        $input = file_get_contents($url);
        $response = array($input, $tool);
        echo json_encode($response);
    }
  }
?>
