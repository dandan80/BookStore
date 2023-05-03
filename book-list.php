<?php
require "connection.php";

$query = "select * from Books order by Title asc";
$result = mysqli_query($connection,$query);

$querySub = "select * from Subcategories order by SubcategoryName asc";
$resultSub = mysqli_query($connection,$querySub);

$queryImp = "select * from Imprints order by Imprint asc";
$resultImp = mysqli_query($connection,$queryImp);

$queryPro = "select * from ProductionStatuses order by ProductionStatus asc";
$resultPro = mysqli_query($connection,$queryPro);

$queryBin = "select * from BindingTypes order by BindingType asc";
$resultBin = mysqli_query($connection,$queryBin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-6">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4> </h4></div>
           <table class="table">
             <tr>
               <th>Cover</th>
               <th>ISBN</th>
               <th>Title</th>
             </tr>
             <?php
             $rowCounter=mysqli_num_rows($result);
             for($i=0; $i<$rowCounter; ++$i){
               $row=mysqli_fetch_row($result);
               echo "<tr>"; 
               echo "<td>"."<img src = \"images/tinysquare/".$row[1].".jpg\"></td>";
               echo "<td>".$row[1]."</td>";
               echo "<td>"."<a href=\"book-details.php?$row[1]\">".$row[3]."</a></td>";
               echo "</tr>";
             }
           ?>
           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">
                  <?php
                  $rowCounter=mysqli_num_rows($resultSub);
                  for($i=0; $i<20; ++$i){
                     $row=mysqli_fetch_row($resultSub);
                     echo "<ul><a href= >".$row[2]."</a></ul>";
                     echo "<br>";
                  }
                 ?> 
             </ul> 
         </div>
                 
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php
               $rowCounter=mysqli_num_rows($resultImp);
               for($i=0; $i<$rowCounter; ++$i){
                  $row=mysqli_fetch_row($resultImp);
                  echo "<ul><a href= >".$row[1]."</a></ul>";
                  echo "<br>";
               }
              ?> 
             </ul>
         </div>    

         <div class="panel panel-info">
            <div class="panel-heading"><h4>Status</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php
                 $rowCounter=mysqli_num_rows($resultPro);
                  for($i=0; $i<$rowCounter; ++$i){
                     $row=mysqli_fetch_row($resultPro);
                     echo "<ul><a href= >".$row[1]."</a></ul>";
                     echo "<br>";
                  }
                 ?> 
             </ul>
         </div>  
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Binding</h4></div>
            <ul class="nav nav-pills nav-stacked">
            <?php
            $rowCounter=mysqli_num_rows($resultBin);
                  for($i=0; $i<$rowCounter; ++$i){
                     $row=mysqli_fetch_row($resultBin);
                     echo "<ul><a href= >".$row[1]."</a></ul>";
                     echo "<br>";
                  }
                 ?> 
             </ul>
         </div>           
      </div>  <!-- end left navigation rail -->       


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>