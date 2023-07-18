<?php
$host = 'localhost';  
$user = 'yash1';  
$pass = '';  
$datab = 'check';
$conn = mysqli_connect($host, $user, $pass, $datab);


function detail_upl(){
  $host = 'localhost';  
$user = 'yash1';  
$pass = '';  
$datab = 'check';
$conn = mysqli_connect($host, $user, $pass, $datab);

  $fname=$_REQUEST['fname'];
  $lname=$_REQUEST['lname'];
  $email=$_REQUEST['email'];
  $pass=$_REQUEST['password'];
  $employeeId=$_REQUEST['emp-id'];
  $phoneNo=$_REQUEST['phone'];
  $lane=$_REQUEST['lane'];
  $house=$_REQUEST['house'];
  $pincode=$_REQUEST['pin'];
  $city=$_REQUEST['city'];
  
  $sql="INSERT INTO details(sNo,fname,lname,mail,pass,employeeId,phoneNo,lane,house,pincode,city) VALUES ('','$fname','$lname','$email','$pass','$employeeId','$phoneNo','$lane','$house','$pincode','$city');";
  mysqli_query($conn, $sql);
echo $sql;
  
}

// function file_upl(){
//     $target_dir = "uploads";
//     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
//     // Check if image file is a actual image or fake image
    
//       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//       if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//       } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//       }
    
//     // Check if file already exists
//     if (file_exists($target_file)) {
//       echo "Sorry, file already exists.";
//       $uploadOk = 0;
//     }
    
//     // Check file size
//     if ($_FILES["fileToUpload"]["size"] > 500000) {
//       echo "Sorry, your file is too large.";
//       $uploadOk = 0;
//     }
    
//     // Allow certain file formats
//     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif" ) {
//       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//       $uploadOk = 0;
//     }
    
//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//       echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
//     } else {
//       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//       } else {
//         echo "Sorry, there was an error uploading your file.";
//       }
//     }
// }
function upfile(){

  if (($_FILES['fileToUpload']['name']!="")){
    $target_dir = "uplaods/";
    $file_upload= $_FILES['fileToUpload']['name'];
    $path = pathinfo($file_upload);
    $filename = $path['filename'];
    // echo $filename;
    $ext = $path['extension'];
    $temp_name = $_FILES['fileToUpload']['tmp_name'];
    $path_filename=$filename.".".$ext;
    $path_filename = $target_dir.$filename.".".$ext;
    
    $f_name = remove($filename);
    $final_name = $target_dir.$f_name.".".$ext;

    // Check if file already exists
    if (file_exists($final_name)) {
    echo "Sorry, file already exists. So, we are deleting it.<br>";
    $deleted = unlink($final_name);
        if($deleted){
            echo 'File ' . $final_name . ' was deleted!';
        } 
    }
    else{move_uploaded_file($temp_name,$final_name);
      echo "Congratulations! File Uploaded Successfully.";
  }
}
}
function remove($string) {
   
  $string = strtolower($string);
  $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
  $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " ");
  $string = str_replace($numbers, '', $string);
  date_default_timezone_set("Asia/Calcutta");
  $time = date("d-m-Y_h-i");
  $string = $string.'__'.$time;
  return  $string;
}
?>