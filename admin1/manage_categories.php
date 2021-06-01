<?php
require('top.inc.php');
$categories='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
  
  $id=get_safe_value($con,$_GET['id']);
  
    $res=mysqli_query($con,"select * from categories where id='$id'");
    
    $check=mysqli_num_rows($res);
  
  if($check>0){

    $row=mysqli_fetch_assoc($res);
    $categories=$row['categories'];
  }

  else{
    header('location:categories.php');
    die();
  }
  
}









if(isset($_POST['submit'])){

$categories=get_safe_value($con,$_POST['categories']);


$res=mysqli_query($con,"select * from categories where categories='$categories'");
$check=mysqli_num_rows($res);

if($check>0){



if(isset($_GET['id']) && $_GET['id']!='') {
  

  $getData=mysqli_fetch_assoc($res);
      if($id==$getData['id']){
      
      } else{

$msg="Categories already exist";
        
      }




}else{


$msg="Categories already exist";

}








}


  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      mysqli_query($con,"update categories set categories='$categories' where id='$id'");
    }else{
      mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
    }
    // header('location:categories.php');
    // die();

redirect('categories.php');





  }


}










?>



<style>
      *{
           box-sizing: border-box;
      }

        input[type="text"]{
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
    <div class="CategoriesFormPage">
         <h2>Categories Form</h2>
         <form method="post">
      
            <div class="Categories">
              <label for="categories">Categories</label><br>
              <input type="text" name="categories" id="categories" placeholder="Enter categories name" required value="<?php echo $categories?>">
            </div>
            <!-- <div class="submitbutton">
              <input name="submit" type="submit">
            </div> -->


            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                 <span id="payment-button-amount">Submit</span>
                 </button>


   <div class="field_error"><?php echo $msg?></div>
         </form>
    </div>
    
       
  </div>
</div>
</body>
</html>