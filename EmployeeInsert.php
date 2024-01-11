<?php
include 'db.php';

// data insert into database

if (isset($_POST['submit'])) {
    
    
        $name    =$_POST['name'];
        $number  =$_POST['number'];
        $email   =$_POST['email'];
        $address =$_POST['address'];
    
        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $upload_folder = 'image/';
        $uniq_image_name = $name;
        move_uploaded_file($temp_name, $upload_folder . "$name.jpg");
      
        $date    =$_POST['date'];
        $gender  =$_POST['gender'];
        $password=$_POST['password'];
        $incrpassword=md5(sha1($password));

        $check=" SELECT * FROM employee_info  WHERE number = '$number' OR  email = '$email'";

        $result=mysqli_query($database_connection, $check );
         $row=mysqli_num_rows($result);
        if ($row > 0) {
          while ($data = mysqli_fetch_assoc($result)) {
            if ($data['number'] == $number) {
              $show_num = 'Number Already Exists. Try with another one!';
              break;
            }
            else if($data['email']==$email){
              $show_email = 'Email Already Exists. Try with another one!';
              
            }
            
          }
        }

       $insart_query = "INSERT INTO employee_info (name,number,email,address,image,date,gender,password) VALUES
        ('$name','$number','$email','$address',  '$uniq_image_name.jpg','$date','$gender','$incrpassword')";
     


if (mysqli_query($database_connection, $insart_query) == true) {
 ?>
<script>
        alert("successfully");
        window.location.replace("index.php");
      </script>/
      <?php
    } else {
        echo "Something went wrong with the database insert.";
    }

      
}

   
?>
