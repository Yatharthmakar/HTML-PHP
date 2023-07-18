
<!DOCTYPE html>
<html>
    <head>
        <title>Forms</title>
    </head>
    <body>
        
     <div>
     <center><form method="POST"  enctype="multipart/form-data">
                <fieldset style="width: fit-content;">
                    <legend>Information</legend>
                    <div style="display: flex;">
                        <div class="fit">
                            <label for="name">First Name</label><br>
                            <input type="text" name="fname">
                        </div>
                        <div class="fit">
                            <label for="name">Last Name</label><br>
                            <input type="text" name="lname">
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="fit">
                            <label for="email">Mail ID</label><br>
                            <input type="email" name="email" >
                        </div>
                        <div class="fit">
                            <label for="password">Password</label><br>
                        <input type="password" name="password" >
                        </div>
                    </div>
                    
                    <div style="display: flex;">
                        <div class="fit">
                            <label for="emp-id" >Employee ID</label><br>
                            <input type="text" name="emp-id" placeholder="1234@xyz" maxlength="8">
                        </div>
                        <div class="fit">
                            <label for="phone" >Phone Number</label><br>
                            <input type="text" name="phone">
                        </div>
                    </div>
                    <div class="fit">
                        <label for="ad" >Address</label><br>
                    </div>
                    <div class="bor">
                        <div style="display: flex;">
                            <div class="fit">
                                <input type="text" name="lane"  size ><br>
                                <small class="fit">Lane/Street</small>
                            </div>
                            <div class="fit">
                                <input type="text" name="house"  ><br>
                                <small class="fit">House/Flat No.</small>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="fit">
                                <input type="text" name="pin" maxlength="6" ><br>
                                <small class="fit">Postal Code</small>
                            </div>
                            <div class="fit">
                                <input list="city" name="city">
                                <datalist id="city">
                                    <option value="Jaipur">
                                    <option value="Delhi">
                                    <option value="Chandigadh">
                                    <option value="Bikamer">
                                    <option value="Ajmer">
                                  </datalist><br>
                                <small class="fit">City</small>
                            </div>
                        </div>
                    </div>
                    <div class="fit">
                    <!-- <button onclick="new_func()">Button</button> -->
                    <input type="submit" name="button1" value="B1"/>
                    </div>
                    
                </fieldset>
</form></center>
</div>
    

<div style="padding:10px">
    <center><form method="POST" enctype="multipart/form-data">
        <fieldset style="width: fit-content;">
        <legend>Upload Image</legend>
            <div class="fit">
                <label for="type">Enter image type</label>
                <input type="text" name="type">
            </div>          
                <div style="padding: 10px; text-align: left">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="fit">
                       <input class="fit" type="submit" name="button2" value="B2">
                       
                </div>
        </fieldset>
    </form></center>
</div>

    <style>
        .fit{
            padding: 3px;
            width: fit-content;
            text-align: left;
        }
        .bor{
            background-color: rgb(216, 216, 216);
            border-style: solid;
            border-color: rgba(0,0,0,0.5);
            border-width: 1px;
        }
    </style>

    


               
    <!--        </form>
        </div>
        <div>
            <form action="form.html">
                <fieldset style=""> <legend>Information</legend>
                    <table class="tg">
                        <thead>
                          <tr>
                            <th class="tg-0lax">Name</th>
                            <th class="tg-0lax">Email</th>
                            <th class="tg-0lax">Phone</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="tg-0lax">
                                <input type="text" name="name" id="name">

                            </td>
                            <td class="tg-0lax">
                                <input type="email" name="email" id="email">
                            </td>
                            <td class="tg-0lax">
                                <input type="password" name="password" id="password">
                            </td>
                          </tr>
                        </tbody>
                        </table>
                </fieldset>
               
            </form>
        </div>
    -->
    
    </body>
</html>
<?php  

include_once('upload.php');

if(array_key_exists('button1',$_POST)) {
    detail_upl();
}
if(array_key_exists('button2',$_POST)) {
    upfile();
}

?>
