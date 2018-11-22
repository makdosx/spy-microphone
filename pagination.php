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

 include("controller.php"); 

  }

?>

<html lang="en">
 <head> 

  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>


  <style type="text/css" >
   .wrapper{
   margin: 10px auto;
   text-align: center;
   }
   
   #pagination-demo{
   display: inline-block;
   margin-bottom: 1.75em;
   }
   #pagination-demo li{
   display: inline-block;
   }
   
   #post-data{
   width: 500px; border: 2px dotted #d6d7da; 
   padding: 0px 15px 15px 15px; 
   border-radius: 5px;font-family: arial; 
   line-height: 16px;color: #333333; font-size: 14px; 
   background: #ffffff;rgba(200,200,200,0.7) 0 4px 10px -1px;
   margin: 10px auto;
   }
   
  </style>
 </head>
 <body>
  
 
  <div id="load-data"> </div>

  <span id="loading"  style="position:relative;left:680px;"> <img src="loading.gif"  /> </span>
  
  <div class="wrapper">        
   <ul id="pagination-demo" ></ul> 
  </div>
  
  <script>
   $(document).ready(function() { 
    
    $('#pagination-demo').twbsPagination({
     totalPages: <?php $a = new paginationClass(); echo $a->getTotalNumberOfRecords();  ?>,
     visiblePages: 4,
     next: 'Next',
     prev: 'Prev',
     onPageClick: function (event, page) {           
      loadData(page-1);
     }
    });
    
    function loadData(pageno){
     
     //ajax request 
     dataString="pageNo="+ pageno ;
     
     $.ajax({
      type: "POST",
      url: "controller.php" ,
      data: dataString,
      cache: false,
      beforeSend: function(){   
       $( "#loading" ).show();      
      },
      success: function(html){           
       $( "#load-data" ).html(  html );
       $( "#loading" ).hide();
      }
     }); 
     
    }
    loadData(0) ;
    
   }); 
   
  </script>  
 </body>
</html>
