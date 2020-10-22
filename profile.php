<?php
    session_start();
    require 'controllers/db_credentials.php';

        if (isset($_SESSION['email'])) 
        {
            $email = $_SESSION['email'];

            $sql = "SELECT Name, Email, Phone, User_Img FROM `user` WHERE Email = '$email'";

            $res = $mysqli->query($sql);
            while ($row = $res->fetch_assoc())
            {
               $username = $row['Name']; 
               $userImg = $row['User_Img']; 
               $userPhn = $row['Phone']; 
            }


            
        }  

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ATIS">

        <title>Travel Mate - Find your travel mate</title>
        <link rel="shortcut icon" type="png" href="images/logo-cut.png">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/patros.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <style>

.sets
{
  border: 1px solid #555;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.high
{
  height: 530px; 
    overflow: auto; 
    overflow-x: hidden;
}
.dot
{
  margin-left: 2em;
  color: grey;
}
h2, h3, h4
{
   font-weight: bold;
   color: white;
}

</style>

    <body data-spy="scroll" style="background-color: #2D2D2D">
  <!-- Navigation -->
        <?php include 'headers/navBar.php';?>
    <!-- Nav ends -->
         
    <!-- Group details -->
  <div class="container blog singlepost">
    <div class="row" style="margin: 4px; border-style: solid #EEE; height: 700px; border: solid #EEE;  " >
            
      <div class="col-md-5" style=" 
           border-right: solid #EEE; height: 695px;">
        
        <h4 style="margin: 1em;">Activity</h4>
        <hr>
        
        <div class="high">
          <div class="sets" style="color: #0047b3;">
           <i class="fa fa-pencil-square"
               style="border-radius: 50%; margin-right: 5px; color: #0047b3;"></i>
             <label> Recent Posted Group </label>
          </div>
          <?php

            $reviewSql = "SELECT Title, Cpost_Time FROM `create_post` WHERE Cuser = '$email' ORDER BY Cpost_Time DESC";

            $reviewRes = $mysqli->query($reviewSql);
            while ($row = $reviewRes->fetch_assoc())
            {
               $grTitle = $row['Title']; 
               $grTime = date("g:ia, M d Y", strtotime($row['Cpost_Time'])); 

              ?>

          <div class="sets">
           <i class="fa fa-pencil-square"
               style="border-radius: 50%; margin-right: 5px; color: #000;"></i>
             <label><?php echo $grTitle;?></label>
              <span style="color: grey; font-size: 11px; font-weight: normal; text-align: right;"> (<?php echo $grTime;?>)</span>
          </div>
         <?php
            }
         ?>
          <div class="sets" style="color: #0047b3;">
           <i class="fa fa-window-restore"
               style="border-radius: 50%; margin-right: 5px; color: #0047b3;"></i>
             <label> Recent Posted Reviews </label>
          </div>
          <?php

            $reviewSql = "SELECT Review_Title, Review_Time FROM `review_post` WHERE Reviewer = '$email'";

            $reviewRes = $mysqli->query($reviewSql);
            while ($row = $reviewRes->fetch_assoc())
            {
               $reTitle = $row['Review_Title']; 
               $reTime = date("g:ia, M d Y", strtotime($row['Review_Time'])); 

              ?>
               <div class="sets">
           <i class="fa fa-window-restore"
               style="border-radius: 50%; margin-right: 5px; color: #000;"></i>
             <label>"<?php echo $reTitle; ?>" </label>
             <span style="color: grey; font-size: 11px; font-weight: normal; text-align: right;"> (<?php echo $reTime;?>)</span>
          </div>

              <?php
            }

          ?>
          
        </div>
      </div>
            
      <article class="col-md-6">
         <div class="col-md-12" style="margin-left: 3em;">  
                <h2>Profile</h2>
                <hr>
                <div class="sets" style="height: 350px; margin-top: 3em; padding: 2em;">
                  <div class="col-md-10" style="margin-left: 1em;">

                    <?php 
                       if ($userImg == '') 
                       {

                        ?>
                         <img class="img-responsive" src="user_images/avatar.png" alta="Image" style="width: 100px; height: 100px; margin-top: 1em; border-radius: 50%;">
                       <?php 
                       }
                       else
                       {
                        ?>
                          <img class="img-responsive" src="user_images/<?php echo $userImg; ?>" alta="Image" style="width: 100px; height: 100px; margin-top: 1em; border-radius: 50%;">

                        <?php
                       }

                    ?>
                    <script> 
                      function changeColor(cmp)
                      {
                       cmp.style.backgroundColor = "lightblue";
                     }
                     function retainColor(cmp) {
                       cmp.style.backgroundColor = "#fff";
                     } 
                   </script>
                     <!-- Image -->
                      <input type="file" id="img-upload" accept="image/*" style="display: none">
                      <label for="img-upload">
                          <i class="glyphicon glyphicon-upload" onmouseover="changeColor(this)" onmouseout="retainColor(this)"></i>
                          <input type="submit" class="btn btn-success btn-xs" name="submit" value="Upload" onclick="gotoAJAX();" style="margin-left: 1em;">
                      </label>
                      <div class="clearfix">
                     <h3 style="color: #333;"><?php echo $username; ?></h3>
                   </div>
                 </div>

                   <div class="col-md-6" style="margin-top: .5em; font-size: 16px;">

                       <div class="col-md-6" >
                        <div class="review-block-rate" style=" margin-top: 5px; font-weight: bold;" >Phone : 
                         </div>
                         <div class="review-block-rate" style=" margin-top: 5px; font-weight: bold;">Email : 
                         </div> 
                       </div>
                       <div class="col-md-6">
                         <div class="review-block-rate" style=" margin-top: 5px;" >
                          <?php echo $userPhn; ?>
                         </div>
                         <div class="review-block-rate" style=" margin-top: 5px;">
                          <?php echo $email; ?>
                         </div> 
                       </div>
                    
                   </div>
                
               </div>

                <br>
              </div>   <!-- ends-->
            </article>

    </div>
  </div>
<script>
function gotoAJAX()
{
//  var chapter=document.getElementById("chapter").value;
  var file=document.getElementById('img-upload').files[0];
  
  console.log(file);
  
  
  var formData=new FormData();
//  formData.append("chapter",chapter);
  formData.append("img-upload",file);
  
  
  var req=new XMLHttpRequest();
  
  req.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4)
    {
      console.log(this.responseText);
    }
    else if(this.status!=200 && this.readState==4){
      console.log("Error found");
    }
    
  };
  
  req.open("POST","user_image_upload.php");
  req.send(formData);
  window.alert('Successfully uploaded');
  location.reload();
}
</script>
    <!-- Footer ends-->
    <?php include 'headers/footer.php' ;?> 
    <!-- Footer starts -->
    </body>
</html>