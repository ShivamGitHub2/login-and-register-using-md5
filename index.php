<?php   

 $connect = mysqli_connect("localhost", "root", "", "pcube");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]) && empty($_POST["phone"]) && empty($_POST["mail"]))  
      {  
           echo '<script>alert(" All Data Field Are Required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);
            $phone = mysqli_real_escape_string($connect, $_POST["phone"]); 
             $mail = mysqli_real_escape_string($connect, $_POST["mail"]); 
               
           $query = "INSERT INTO register (username,password,phone,mail ) VALUES('$username', '$password','$phone','$mail')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:entry.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  

 <style >
   
          .rb{
            width: 100%;
  height: 100%;
  background-image:url("img/rb1.jpg"); 
   background-repeat:no-repeat;
   background-size:cover;

}
 
 .clr{
  color: white;
 }
        
 </style>

 <script>
  

//phone no default char remove
  $( document ).ready(function() {
var invalidChars=["-", "+", "e", "E","."];
  $("input[type='number']").on("keydown",function(e) {
    if(invalidChars.includes(e.key)){
      e.preventDefault();
    }
  });
  
   //phone up,down key
$(document).on('keydown',function(e)
{ 
    var key = e.charCode || e.keyCode;
    if(key == 38 || key == 40 )
        {
        e.preventDefault();
    }
});
 </script>
           <title>LOGIN PCUBE </title>  
            <script type="text/javascript" src="js/register.js"></script>
  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      </head>  
      <body class="rb" >


           <br /><br />  
           <div class="container-fluid"  style="width:500px;">  
                <h3 align="center"> Registration Form </h3>  
                <br />  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post" autocomplete="off">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" autocomplete="false" placeholder="ENTER NAME" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password"  autocomplete="new-password" placeholder="ENTER PASSWORD" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" align="center" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                    <h3 class="clr" align="center"><a href="index.php">Register</a>  <h3>
                </form>  
                <?php       
                }  
                else  
                {  
                ?>  
  
             
                <form method="post"  autocomplete="off" action="">
                  <!--name-->
                <div class="form-group">  
                     <label>Enter Username</label>  
                     <input type="text" autocomplete="false" name="username" placeholder="ENTER NAME" id="idname" class="form-control" />  
                   </div>
                     <br />  
                     
<!--gender
<label>GENDER</label>
<br>
<label class="radio-inline">
      <input type="radio" name="optradio" class="gender custom-control-input" id="radio1" value="male">MALE
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" class="gender custom-control-input" id="radio2" value="female">FEMALE
    </label>
<br>
<br>-->
<!--PHONE NO-->
<div class="form-group">
      <label for="no" id="lblphone">PHONE NO</label>
    <input type="number"  class="form-control" name="phone" maxLength="10" id="no" placeholder="ENTER PHONE NUMBER"   oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0,this.maxLength);">
<br>


<!--MAIL-->
<div class="form-group">
      <label for="mail" id="lblmail">EMAIL</label>
    <input type="text" class="form-control" name="mail" placeholder="..@GMAIL.COM" id="email">
  </div>
<br>


<!--password-->
<div class="form-check">
 <label>Enter Password</label>  
                     <input type="password"  autocomplete="new-password" placeholder="ENTER PASSWORD" name="password" class="form-control" id="pwd"> 
                     </div> 
                     <br >  
    
<!--check-->
<div class="form-check">
  <label id="lblcheck" class="form-check-label">
    <input type="checkbox"    class="form-check-input" name="agree">
    I AGREE TO ALL IMFORMATIN  HERRREE.
  </label>
</div>
<!--submit-->
<input type="submit" name="register" onclick="return validator();" value="Register" class="btn btn-info" />  

<!--reset-->
<input type="reset" class="btn btn-danger" value="reset">
<br>
                     <br />  
                     <h3 class="clr" align="center"><a href="index.php?action=login">Login</a></h3>  
                </form>  
                <?php  
                }  
                ?>  
           </div>  
          
      </body>  
 </html>  
