
<?php include 'nav.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Button trigger modal -->
<button style="margin-top: 20px; margin-left:80%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +Add Employee
</button>
<?php
 include 'db.php';

 $show_num = "";
 $show_email = "";
?>
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Employee Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="EmployeeInsert.php" enctype="multipart/form-data">


<label>Enter Name</label><br>
    <span style="color: red" id="err_name"> </span><br>
    <input type="text" placeholder="Enter Your name" name="name"><br><br>

    <label>Enter Phone Number</label><br>
    <span style="color: red" id="err_number" <?php echo $show_num; ?>></span> <br>
    <input type="number" placeholder="Enter Your Phone number" name="number" ><br>

    <label>Enter Your Email</label><br>
    <span style="color: red" id="err_email" <?php echo $show_email; ?>></span> <br>
    <input type="email" placeholder="Enter your Email Address" name="email" id="v_email"><br>

    <label>Enter Address</label><br>
    <span style="color: red" id="err_address"></span> <br>
    <input type="text" placeholder="Enter your Address" name="address" id="v_address" ><br>

    <label>Enter Image</label><br>
    <span style="color: red" id="err_image"></span> <br>
    <input type="file" name="image" id="v_image" ><br>

    <label>Enter Joining Date</label><br>
    <span style="color: red" id="err_date"></span> <br>
    <input type="date" name="date" id="v_date" ><br><br>

    <label>Enter Your Gender</label><br>
    <span style="color: red" id="err_gender"></span> <br>
    <input type="radio" name="gender" id="v_gender" value="Male">Male
    <input type="radio" name="gender" id="v_gender" value="Female">Female<br><br>

    
    <button class="btn btn-info" type="submit" name="submit" onclick="return validateForm()">Submit</button>




</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Employee ID</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Joining date</th>
            <th scope="col">Gender</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $check = "SELECT * FROM employee_info";
        $run = mysqli_query($database_connection, $check);
        $count = 1;
        if ($run == true) {
            while ($data = mysqli_fetch_array($run)) {
        ?>
                <tr>
                <td><?php echo $count;
                $count++; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["number"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["address"]; ?></td>
                    <td><?php echo $data["date"]; ?></td>
                    <td><?php echo $data["gender"]; ?></td>
                    <td><img src="image/<?php echo $data['image']; ?>" style="max-height: 50px;" /></td>

                    <td> 
                        <a class="btn btn-info"  href="edit.php?id=<?php echo $data["id"]; ?>">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('ARE YOE SURE!')" href="delete.php?id=<?php echo $data["id"]; ?>">Delete</a>
                    </td>
                </tr>
        <?php 
            } 
        } 
        ?>
    </tbody>
</table>
