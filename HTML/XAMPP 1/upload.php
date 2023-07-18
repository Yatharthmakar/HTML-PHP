<?php
$error='';
$emaill='';
function detail_upl(){
  $host = 'localhost';  
  $user = 'yash';  
  $pass = 'yash123';  
  $datab = 'Check';
  $conn = mysqli_connect($host, $user, $pass, $datab); 

  
  $fname=$_REQUEST['fname'];
  $lname=$_REQUEST['Lname'];
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

function sign_up(){
  $host = 'localhost';  
  $user = 'yash';  
  $pass = 'yash123';  
  $datab = 'Check';
  $conn = mysqli_connect($host, $user, $pass, $datab); 

  $name=$_REQUEST['name'];
  $mail=$_REQUEST['mail'];
  $phone=$_REQUEST['phoneNo'];
  $password=$_REQUEST['password'];
  
  $sql='SELECT * FROM members';
  $details=mysqli_query($conn,$sql);
  $i=0;
  while($check=mysqli_fetch_assoc($details)){
    if($mail==$check['mail']){
      echo 'This email is already registered. Please enter different email-Id';
      $i=1;
      break;
    }
  }
  if($i==0){
    $sql="INSERT INTO members(sNo,name,mail,phoneNo,password) VALUES ('','$name','$mail','$phone','$password')";
  mysqli_query($conn,$sql);
  $i=0;
  }
}

function update(){
  echo $_SESSION['user_email']; exit;
  $host = 'localhost';  
  $user = 'yash';  
  $pass = 'yash123';  
  $datab = 'Check';
  $conn = mysqli_connect($host, $user, $pass, $datab);

  $email=$_REQUEST['emailid'];
  $passw=$_REQUEST['passw'];
  $new_user=$_REQUEST['new_name'];
  $new_pass=$_REQUEST['new_passw'];
  
  $sql='SELECT * FROM members';
  $details=mysqli_query($conn,$sql);
  
  while($row=mysqli_fetch_assoc($details)){
   
   if(($email==$row['mail'])&&($passw==$row['password'])){
      $sql='UPDATE members SET name="'.$new_user.'" , password="'.$new_pass.'" WHERE mail="'.$email.'"';
      echo $sql;
      $GLOBALS['error']='Update Sucessful!';    
    }
    else{
      $GLOBALS['error']='Please enter correct mail-ID and password';    
    }
  }
}

function login(){
  $host = 'localhost';  
  $user = 'yash';  
  $pass = 'yash123';  
  $datab = 'Check';
  $conn = mysqli_connect($host, $user, $pass, $datab);
  
  $email=$_REQUEST['emailid'];
  $passw=$_REQUEST['passw'];
  
  $sql='SELECT * FROM members';
  $details=mysqli_query($conn,$sql);
  
  while($row=mysqli_fetch_assoc($details)){
   
    if(($email=='')&&($passw=='')){
      $GLOBALS['error']='Please enter mail-ID and password';
     
    }
    elseif(($email==$row['mail'])&&($passw==$row['password'])){
      $_GLOBALS['emaill']=$email;
      session_start();
      $sql='SELECT * FROM members WHERE mail="'.$email.'"';
      echo $sql;
      $nameg=mysqli_fetch_assoc(mysqli_query($conn,$sql));
      $_SESSION['user_name']=$nameg['name'];
      $_SESSION['user_email']=$nameg['mail'];
      header('Location: http://localhost/template1/index.php');
    }
    else{
      $GLOBALS['error']='Please enter correct mail-ID and password';
    }
}
}


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
    echo "Sorry, file already exists. So, we are deleting it.";
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