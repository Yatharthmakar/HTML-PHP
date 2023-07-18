<?php  
$host = 'localhost';  
$user = 'yash';  
$pass = 'yash123';  
$datab = 'Check';
$conn = mysqli_connect($host, $user, $pass, $datab);  
               
?>  

<!DOCTYPE html>
<html>
    <head>
        <title>Sample Page</title>
    </head>
    <body>
        <div style=width:100%;>

            <div class="" style=display:flex;>
                <?php
                $sql = 'SELECT path FROM img WHERE type="logo" ';
                $logo=mysqli_fetch_assoc(mysqli_query($conn, $sql));

                echo '<div class="chill" style="padding: 10px;">
                        <img src="'.$logo['path'].'" alt="logo" width=100px height=100px  > 
                      </div>';

                $i=0;
                $sql = 'SELECT menuName FROM menu ORDER BY menuName asc limit 4';
                $something = mysqli_query($conn, $sql);
                
                while($i<2){  
                   $row = mysqli_fetch_assoc($something);
                    echo ' <div class="child">
                    <h1>'.$row['menuName'].'</h1>
                </div >';
                    $i++;
                 }

                 $row = mysqli_fetch_assoc($something);
                 echo ' <div class="chil">
                 <a href="/template1/index.php"><h1>'.$row['menuName'].'</h1></a>
                </div>';

                 $row = mysqli_fetch_assoc($something);
                 echo ' <div class="chil">
                 <a href="/form.php"><h1>'.$row['menuName'].'</h1></a>
                </div>';
                ?>
               
                <!-- <div class="child">
                    <a href="/HTML/form.html"><h1>Menu 2</h1></a>
                </div > -->
                <!-- <div class="child">
                    <h1>Menu 3</h1>
                </div> -->
                <!-- -->
            </div>
            <div>
            <?php
                $sql = 'SELECT path FROM img WHERE type="banner" ';
                $banner=mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo '<img src="'.$banner['path'].'" alt="Landscape" width=100% style="padding: 4px;">
                <div class="text-block">
                    <h1 style="font-size:50px">WELCOME HELLO</h1>
                </div>';
                ?>
            </div>
            <div style=display:flex;padding:5px;height:100px >
                <div class="col" style="background-color:orangered;">
                  <h1>Hello</h1>
                </div>
                <div class="col" style="background-color:yellow;">
                    <h1>Hi</h1>
                </div>
                <div class="col" style="background-color:blue;">
                    <h1>Hey</h1>
                </div>
            </div>
            <?php
                $sql = 'SELECT path FROM img WHERE type="bigImg" ';
                $bigImg=mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo '<div class="frame">
                        <img class="image" src="'.$bigImg['path'].'" alt="Landscape" width=100% style="padding: 2px;">
                    </div>';
            ?>
            <div style=display:flex;padding:5px>

                <?php
                    $sql = 'SELECT path FROM img where type="smallImg"';
                    $something2 = mysqli_query($conn, $sql); 
                    while($row2 = mysqli_fetch_assoc($something2)){
                        echo '<div class="flip-box" >
                            <div class="flip-box-inner">
                            <div class="flip-box-front">
                                <img class="round" src="'.$row2['path'].'">
                            </div>
                            <div class="flip-box-back">
                                <h2>Image</h2>
                                <p>Nice</p>
                            </div>
                            </div>
                        </div>';
                    }
                ?>

               <!-- <div class="flip-box" >
                    <div class="flip-box-inner">
                      <div class="flip-box-front">
                        <img class="round" src="https://g1.img-dpreview.com/FB305EFE13ED494D941186334E2E2AE0.jpg"  >
                      </div>
                      <div class="flip-box-back">
                        <h2>Image</h2>
                        <p>Nice</p>
                      </div>
                    </div>
                </div>

                <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">
                          <img class="round" src="data:image/jpeg;base64,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"  >
                      </div>
                      <div class="flip-box-back">
                        <h2>Image</h2>
                        <p>Nice</p>
                      </div>
                    </div>
                </div>
                <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">
                        <img class="round" src="data:image/jpeg;base64,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"  >
                      </div>
                      <div class="flip-box-back">
                        <h2>Image</h2>
                        <p>Nice</p>
                      </div>
                    </div>
                </div>    
                    <div class="flip-box">
                        <div class="flip-box-inner">
                          <div class="flip-box-front">
                            <img src="data:image/jpeg;base64,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" alt="Nature" class="round">
                          </div>
                          <div class="flip-box-back">
                            <h2>Image</h2>
                            <p>Nice</p>
                          </div>
                        </div>
                    </div>   
                 <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">
                    <img class="round" src="data:image/jpeg;base64,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" alt="Nature" >
                         </div>
                      <div class="flip-box-back">
                         <h2>Image</h2>
                               <p>Nice</p>
                          </div> 
                      </div>
                 </div>   -->   
            </div>          
        
            <div style=display:flex;padding:5px>
                <div class="img" id="ref_here">
                    <h3>Nature</h3>
                </div>
                <div class="img">
                    <h3>Nature</h3>
                </div>
                <div class="img">
                    <h3>Nature</h3>
                </div> 
                <div class="img">
                    <h3>Nature</h3>
                </div>
                <div class="img">
                    <h3>Nature</h3>
                </div>                                               
            </div>
        </div>
       
        
    </body>
    <style>
        a:link {
        color: blue;
        background-color: transparent;
        text-decoration: none;
        }

        
        .round{
            border-radius: 50%;
            width: 200px;
            height: 200px;
            
        }
        .img{
            width: 20%;
            text-align: center;
            display: block
        }
        .col{
            border-radius: 8px;
            text-align:center;
            width: 34%;
            margin: 5px;
            }
        .child{
            text-align:center;
            padding: 10px;
            border-style: solid;
            border-right:none;
            width: 21%;
            height: 84px;
        }
        .chil{
            text-align:center;
            padding: 10px;
            border-style: solid;
            width: 21%;
            height: 84px;
        }
        .text-block {
            position: absolute;
            top: 75%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0,0,0,0.6);
            color: white;
            padding-left: 20px;
            padding-right: 20px;
        }

        .image{
            transition: transform 1s ;
        }
        .image:hover{
            transform: scale(1.1);
           
        }
        .frame {
            height: auto;
            width: 100%;
            overflow: hidden;
        }

        .flip-box {
            margin: auto;
            background-color: transparent;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            border: 1px solid #f1f1f1;
            perspective: 1000px;
        }

        .flip-box-inner {
            position: relative;
           
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-box:hover .flip-box-inner {
            transform: rotateY(180deg);
        }

        .flip-box-front, .flip-box-back {
            position: absolute;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-box-back {
            background-color: #555;
            color: white;
            transform: rotateY(180deg);
        }



    </style>
</html>