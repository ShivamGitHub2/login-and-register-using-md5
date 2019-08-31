<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 ?> 
<pre>
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">home page</h3>  
                <br />  
                <?php  
               // echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';  
               // echo '<label><a href="logout.php">Logout</a></label>';  
                ?>  


           </div>   


      </body>  
 </html>  
