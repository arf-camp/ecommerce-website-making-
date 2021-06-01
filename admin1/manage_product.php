<?php 
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc ='';
$description  ='';
$meta_title ='';
$meta_desc='';
$meta_keyword='';
$best_seller='';
$msg='';

$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from product where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){

    $row=mysqli_fetch_assoc($res);
    $categories_id=$row['categories_id'];
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];
    $short_desc=$row['short_desc'];
    $description=$row['description'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];
    $best_seller=$row['best_seller'];

  }else{
    // header('location:product.php');
    // die();
    redirect('product.php');
  }
}



if(isset($_POST['submit'])){
  $categories_id=get_safe_value($con,$_POST['categories_id']);
  $name=get_safe_value($con,$_POST['name']);
  $mrp=get_safe_value($con,$_POST['mrp']);
  $price=get_safe_value($con,$_POST['price']);
  $qty=get_safe_value($con,$_POST['qty']);
  $short_desc=get_safe_value($con,$_POST['short_desc']);
  $description=get_safe_value($con,$_POST['description']);
  $meta_title=get_safe_value($con,$_POST['meta_title']);
  $meta_desc=get_safe_value($con,$_POST['meta_desc']);
  $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
  $best_seller=get_safe_value($con,$_POST['best_seller']);
  
  
  $res=mysqli_query($con,"select * from product where name='$name'");
  $check=mysqli_num_rows($res);
  if($check>0)
  {
    if(isset($_GET['id']) && $_GET['id']!=''){
      $getData=mysqli_fetch_assoc($res);
      if($id==$getData['id']){
      
      }else{
        $msg="Product already exist";
      }
    }else{
      $msg="Product already exist";
    }
  }



//image violation condition


if(isset($_GET['id']) && $_GET['id']==0){  //this is insert condition ,file must be selected
    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
      $msg="Please select only png,jpg and jpeg image formate";
    }
  }else{
    if($_FILES['image']['type']!=''){ ///if file selected
        if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
      }
    }
  }









  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!='')

    {

      if($_FILES['image']['name']!=''){  ///if file is selected

         $image=rand(111,999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);


        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller' where id='$id'";
      }else{ //if file not selected
        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller' where id='$id'";
      }
      mysqli_query($con,$update_sql);
    }

    else{
//on insert operation image file must be selected

            $image=rand(111,999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);





      mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller')");
    }
    // header('location:product.php');
    // die();
    redirect('product.php');

  }








}




 ?>





 <style>
              *{
        box-sizing: border-box;
       }

        input[type="text"], input[type="file"]{
          width: 100%;
          padding: 5px 20px;
          font-size: 1rem;
          margin: 10px 0;
          box-sizing: border-box;
          background-color:whitesmoke;
          border: 3px solid salmon;
          border-radius: 5px;
        }

        #selecttag{
          width: 100%;
          padding: 5px 20px;
          font-size: 1rem;
          margin: 10px 0;
          box-sizing: border-box;
          background-color:whitesmoke;
          border: 3px solid salmon;
          border-radius: 5px;
        }

        input[type="button"]{
          width: 100%;
          border:none;
          border-radius: 10px;
          background-color: green;
          color: whitesmoke;
          padding: 10px;
          cursor: pointer;
          font-size: 25px;
          font-family: Cambria;
        }

        input[type="button"]:hover{
          background-color: tomato;
        }

        textarea{
          resize: none;
          margin: 10px 0px;
          width: 100%;
          padding: 20px;
          border: 3px solid gold;
          border-radius: 10px;
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
    <div class="ProductFormPage">
         <h2>Product Form</h2>
         <form method="post" enctype="multipart/form-data">
           <div class="Categories">
              <label for="productname">Categories</label>
              <!-- This values will be fetched from database. -->

              <select name="categories_id" id="selecttag">
                  

                  <option>Select Category</option>
                    
                    <?php
    $res=mysqli_query($con,"select id,categories from categories where status=1 order by categories asc");
      
       while($row=mysqli_fetch_assoc($res))

                    {

                       if($row['id']==$categories_id)
                       {
                        echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                       }

                      else

                      {
                        echo "<option value=".$row['id'].">".$row['categories']."</option>";
                      }

 
                      
                    }


                    ?>

              </select>
            </div><br> 
            
            <div class="ProductNames">
              <label for="productname">Product Name</label>
              <input type="text" name="name" id="productname" placeholder="Enter product name"required value="<?php echo $name?>">
            </div>


            <div class="Categories">
              
 <label for="productname">Best seller</label>

<select id="selecttag" name="best_seller" required>
                    <option value=''>Select</option>
                    <?php
                    if($best_seller==1){
                      echo '<option value="1" selected>Yes</option>
                        <option value="0">No</option>';
                    }elseif($best_seller==0){
                      echo '<option value="1">Yes</option>
                        <option value="0" selected>No</option>';
                    }else{
                      echo '<option value="1">Yes</option>
                        <option value="0">No</option>';
                    }
                    ?>
    </select>



            </div>


            <div class="MRP">
              <label for="mrp">MRP</label>
              <input type="text" name="mrp" id="mrp" placeholder="Enter product mrp" required value="<?php echo $mrp?>">
            </div>
            <div class="Price">
              <label for="price">Price</label>
              <input type="text" name="price" id="price" placeholder="Enter product price"required value="<?php echo $price?>">
            </div>
            <div class="Qty">
              <label for="quantity">QTY</label>
              <input type="text" name="qty" id="quantity" placeholder="Enter qty" required value="<?php echo $qty?>">
            </div>
            
            <div class="Image">
              <label for="photo">Image</label><br>
              <input type="file" name="image" id="photo" <?php echo  $image_required?>>
            </div> 

            <div class="Short Description">
              <label for="shortdescription">Short Description</label>
              <textarea name="short_desc" placeholder="Enter product short description" cols="100" rows="5" required><?php echo $short_desc?></textarea>
            </div> 
            
            <div class="Description">
              <label for="description">Description</label>
              <textarea cols="100" rows="5" name="description" placeholder="Enter product description" required><?php echo $description?></textarea>
            </div>

            <div class="Meta Title">
              <label for="metatitle">Meta title</label>
              <textarea cols="100" rows="5" name="meta_title" placeholder="Enter product meta title" ><?php echo $meta_title?></textarea>
            </div>


            <div class="Meta Description">
              <label for="metadescription">Meta Description</label>
              <textarea cols="100" rows="5" name="meta_desc" placeholder="Enter product meta description" ><?php echo $meta_desc?></textarea>
            </div>
            
            <div class="Meta Keyword">
              <label for="meta keyword">Meta Keyword</label>
              <textarea cols="100" rows="5" name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
            </div>

            <div class="submitbutton">
              <!-- <input type="button" value="Submit"> -->
              <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
               <span id="payment-button-amount">Submit</span>
              </button>
              <div class="field_error"><?php echo $msg?></div>
            </div>
         </form>
    </div>
    
       
  </div>
</div>
</body>
</html>