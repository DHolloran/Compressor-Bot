<?php
// Setup Uploader
  if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
    require_once "localhost-upload.php";
  }else{
    require_once "live-upload.php";
  }

// Vars
  //$tool = $_POST['tool'];
  $fileArr = array();
// Check upload fields
if(isset($_FILES)){
    // File 1
   if(isset($_FILES['file1']) && $_FILES['file1']['name'] !== ""){
    $fileArr['file1'] = $fileArr['file1'] = uploadFiles($_FILES['file1'], $_FILES['file1']['name'] );
   }

   // File 2
   if(isset($_FILES['file2']) && $_FILES['file2']['name'] !== ""){
    $fileArr['file2'] = uploadFiles($_FILES['file2'], $_FILES['file1']['name'] );
   }

   // File 3
   if(isset($_FILES['file3']) && $_FILES['file3']['name'] !== ""){
    $fileArr['file3'] = uploadFiles($_FILES['file3'], $_FILES['file1']['name'] );
   }

   // File 4
   if(isset($_FILES['file4']) && $_FILES['file4']['name'] !== ""){
    $fileArr['file4'] = uploadFiles($_FILES['file4'], $_FILES['file1']['name'] );
   }
   echo $fileArr;
}

// Upload Files
function uploadFiles($f,$fileName){
    $upload = new Upload();
// Restrict .html,.js.css files
  $upload->setAllowExt(array('html','js','css'));
  // Upload Files
  $file =$upload->upload($f);
  if(false===$file){
    echo json_encode(false);
  }else {
      $url = "upload/{$file}/${fileName}";
      $input = file_get_contents($url);
      $response = array($input);
      return $response;
      $upload->deleteAll();
  }
}
?>
