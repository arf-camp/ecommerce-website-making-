
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
      $update_status_sql="update categories set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }
   
   if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from categories where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}




$sql="select * from categories order by categories asc";
$res=mysqli_query($con,$sql);


?>






<div class="main col-10">
      <div class="addCategoryPage">
           <h2>Categories</h2>
           <a href="manage_categories.php">Add Categories</a>
      </div>
      <div class="categorytable">
          <table>
              <tr>
                 <th>#</th>
                 <th>ID</th>
                 <th style="width: 50%;">CATEGORIES</th>
                 <th style="width: 50%;">Action</th>

              </tr>



  <?php 
                     
                     $i=1;

                     while($row=mysqli_fetch_assoc($res))

                  {?>





              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['categories']?></td>
                <td>



                  <div>



                           <?php

                        if($row['status']==1)

                        {
                           echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                        }


                        else


                        {

                           echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                        }




                        echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";

                        
                        echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                        
                        ?>




















                  <!-- <input type="button1" value="Active">
                  <input type="button2" value="Edit">
                  <input type="button3" value="Delete"> -->
                </div>





                </td>
              </tr>

             
 <?php $i++;}  ?>
              



          </table>
      </div>
      <div class="footer">
          <!-- Implementation will be done in future !!!-->
      </div>
    </div>
  </div>
</body>
</html>