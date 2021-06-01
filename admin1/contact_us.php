
<?php
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   
   
   if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from contact_us where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}




$sql="select * from contact_us order by id desc";
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

       .ContactUsPage{
         background-color: cornsilk;
         color: black;
         width: 100%;
       }

       .main .ContactUsPage a{
         cursor: pointer;
       }

       .ContactUsPage h2{
         padding: 20px 20px;
       }

       .ContactUsPage a{
         padding-left: 20px;
         padding-right: 20px;
         padding-bottom: 15px;
       }


       .table{
         
       
         border-collapse: collapse;
         width: 100%;
       }

       td{
      
         padding: 30px 32px;
         background-color: white;
         font-size: small;
       }

       th{
         background-color: darkgreen;
         color: white;
         height:30px;
         text-align:center;
         border-collapse: collapse;
       }

       input[type="button1"]{
            width: 50px;
            border: none;
            background-color:red;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
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
    <div class="ContactUsPage">
         <h2>contact Us</h2>
    </div>
    <div class="contactuserstable">
        <table>

            <tr>
               <th>#</th>
               <th>ID</th>
               <th>NAME</th>
               <th>EMAIL</th>
               <th>MOBILE</th>
               <th>COMMENT</th>
               <th>DATE</th>
               <th>Action</th>
            </tr>

                   <?php 
                     
                     $i=1;

                     while($row=mysqli_fetch_assoc($res))

                  {?>



            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['id']?></td>

                 <td><?php echo $row['name']?></td>

                 <td><?php echo $row['email']?></td>

                 <td><?php echo $row['mobile']?></td>

                 <td><?php echo $row['comment']?></td>

                 <td><?php echo $row['added_on']?></td>

              <td>

                <div>
                 <?php
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