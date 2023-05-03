<?php
require "connection.php";
$qs = $_SERVER['QUERY_STRING'];
$query1 = "select * from Books where ISBN10='$qs'";
$result1 = mysqli_query($connection,$query1);
$row1=mysqli_fetch_row($result1);
$query2="select * from BookAuthors where BookId=$row1[0]";
$result2=mysqli_query($connection, $query2);
$rowCount=mysqli_num_rows($result2);
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

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>Book Details</h4></div>
           
           <table class="table">
             <tr>
               <th>Cover</th>
               <td><?php echo "<img src = \"images/tinysquare/".$row1[1].".jpg\">";?></td>
             </tr>            
             <tr>
               <th>Title</th>
               <td><em>
                <?php  echo $row1[3]; ?></em></td>
             </tr>    
             <tr>
               <th>Authors</th>
               <td><?php 
               for($i=0; $i<$rowCount; ++$i){
                $row2=mysqli_fetch_row($result2);
                $query3="select * from Authors where ID=$row2[2]";
                $result3=mysqli_query($connection, $query3);
                $row3=mysqli_fetch_row($result3);
                echo $row3[1]." ".$row3[2];
                echo "<br>";
               }
               ?></td>
             </tr>   
             <tr>
               <th>ISBN-10</th>
               <td> <?php  echo $row1[1]; ?></td>
             </tr>
             <tr>
               <th>ISBN-13</th>
               <td> <?php  echo $row1[2]; ?></td>
             </tr>
             <tr>
               <th>Copyright Year</th>
               <td> <?php  echo $row1[4]; ?></td>
             </tr>   
             <tr>
               <th>Instock Date</th>
               <td>
               <?php  echo substr($row1[11], 0, 10); ?>
               </td>
             </tr>              
             <tr>
               <th>Trim Size</th>
               <td> <?php  echo $row1[9]; ?></td>
             </tr> 
             <tr>
               <th>Page Count</th>
               <td> <?php  echo $row1[10]; ?></td>
             </tr> 
             <tr>
               <th>Description</th>
               <td><?php echo $row1[12];?></td>
             </tr> 
             <tr>
               <th>Sub Category</th>
               <td>
                <?php
                $query4="select * from Subcategories where ID = $row1[5]";
                $result4=mysqli_query($connection, $query4);
                $row4=mysqli_fetch_row($result4);
                echo $row4[2];
                ?>
               </td>
             </tr>
             <tr>
               <th>Imprint</th>
               <td>
                <?php
                $query5="select * from Imprints where ID = $row1[6]";
                $result5=mysqli_query($connection, $query5);
                $row5=mysqli_fetch_row($result5);
                echo $row5[1];
                ?>
               </td>
             </tr>   
             <tr>
               <th>Binding Type</th>
               <td>
                <?php
                $query6="select * from BindingTypes where ID = $row1[8]";
                $result6=mysqli_query($connection, $query6);
                $row6=mysqli_fetch_row($result6);
                echo $row6[1];
                ?>
               </td>
             </tr> 
             <tr>
               <th>Production Status</th>
               <td>
               <?php
                $query7="select * from ProductionStatuses where ID = $row1[7]";
                $result7=mysqli_query($connection, $query7);
                $row7=mysqli_fetch_row($result7);
                echo $row7[1];
                ?>
               </td>
             </tr>              
           </table>

         </div>           
      </div>



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