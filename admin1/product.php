
<?php
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if($type=='status'){
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if($operation=='active'){
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update product set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }
   
   if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from product where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}




$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";

$res=mysqli_query($con,$sql);


?>




 <style>
           *{
        box-sizing: border-box;
       }
       .header{
         background-color: coral;
         color: black;
         padding: 1% 5%;
         text-align: right;
         height: 70px;
       }

       .header h2{
         text-align: center;
         vertical-align: middle;
         cursor: pointer;
       }

       .header h2:hover{
         color: white;
         transition: 0.4s;
       }

       .nav-menu{
         padding: 1% 5%;
         background-color: #39a4ac
       }

       .nav-menu a{
         text-decoration: none;
         display: block;
         padding: 20px 20px;
         color:white;
         font-weight: bold;
       }

       .nav-menu a:hover{
         color: blue;
         transition: 0.5s;
       }

       .nav-menu h3{
         margin-left: 20px;
       }

       .main{
         background-color:cornflowerblue;
       }

       .addProductPage{
         background-color: cornsilk;
         color: black;
         width: 100%;
       }

       .main .addProductPage a{
         cursor: pointer;
       }

       .addProductPage h2{
         padding: 20px 20px;
       }

       .addProductPage a{
         padding-left: 20px;
         padding-right: 20px;
         padding-bottom: 15px;
       }

       .table{
         
       
         border-collapse: collapse;
         width: 100%;
       }

       td{
         border:2px solid black;
         padding: 30px 32px;
         background-color: white;
       }

       th{
         background-color: darkgreen;
         color: white;
         height:30px;
         text-align: left;
         border-collapse: collapse;
       }

       input[type="button1"], input[type="button2"], input[type="button3"]{
            width: 50px;
            border: none;
            background-color:lawngreen;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       input[type="button2"]{
            width: 50px;
            border: none;
            background-color:blue;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       input[type="button3"]{
            width: 50px;
            border: none;
            background-color:red;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       .lastcell{
         padding-right: 1px;
       }

       .col-1{width: 8.33%;}
       .col-2{width: 16.66%;}
       .col-3{width: 25%;}
       .col-4{width: 33.33%;}
       .col-5{width: 41.66%;}
       .col-6{width: 50%;}
       .col-7{width: 58.33%;}
       .col-8{width: 66.66%;}
       .col-9{width: 75%;}
       .col-10{width: 83.33%;}
       .col-11{width: 91.66%;}
       .col-12{width: 100%;}

       [class*="col-"]{
         float: left;
         padding: 10px;
       }

       .row::after{
         content: '';
         clear: both;
         display: table;
       }
  </style>




  <div class="main col-10">
    <div class="addProductPage">
         <h2>Product</h2>
         <a href="manage_product.php">Add Product</a>
    </div>
    <div class="producttable">
        <table>
            <tr>
               <th>#</th>
               <th>ID</th>
               <th>CATEGORIES</th>
               <th>Name</th>
               <th>Image</th>
               <th>MRP</th>
               <th>Price</th>
               <th>Qty</th>
               <th>Action</th>
            </tr>


<?php 
                     
                     $i=1;

                     while($row=mysqli_fetch_assoc($res))

                  {?>





            <tr>
              <td><?php echo $i?></td>
             <td><?php echo $row['id']?></td>
              <td><?php echo $row['categories']?></td>
              <td><?php echo $row['name']?></td>


             <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>


              <td><?php echo $row['mrp']?></td>
            <td><?php echo $row['price']?></td>
              <td><?php echo $row['qty']?></td>
              
              <td><div class="lastcell">
                 <?php

                        if($row['status']==1)

                        {
                           echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                        }


                        else


                        {

                           echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                        }




                        echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";     

                        
                        echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                        
                        ?>
              </div>
              </td>

            </tr>

            
<?php $i++; } ?>
          



        </table>
    </div>
    <div class="footer">
        <!-- Implementation will be done in future !!!-->
    </div>
  </div>
</div>
</body>
</html>




