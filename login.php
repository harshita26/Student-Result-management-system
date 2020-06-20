<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<body class="bg-dark text-white">
    
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-4">
                <h1>Student Result Management System</h1><hr class="bg-light">
                <nav class="nav justify-content-center">
                    <ul class="nav nav-pills">
                        <li class="nav-item px-lg-5">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item px-lg-5">
                            <a href="index.php" class="nav-link active">Admin Login</a>
                        </li>
                        <li class="nav-item dropdown px-lg-5">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Faculties</a>
                            <div class="dropdown-menu">
                                <a href="" class="dropdown-item">Art</a>
                                <a href="" class="dropdown-item">Science</a>
                                <a href="" class="dropdown-item">Commerce</a>
                                <a href="" class="dropdown-item">Technology</a>
                                <a href="" class="dropdown-item">Sports</a>
                                <a href="" class="dropdown-item">Other</a>
                            </div> 
                        </li>
                        <li class="nav-item dropdown px-lg-5">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student</a>
                            <div class="dropdown-menu">
                                <a href="" class="dropdown-item">Admission</a>
                                <a href="" class="dropdown-item">Schoolarship</a>
                                <a href="" class="dropdown-item">Education</a>
                                <a href="" class="dropdown-item">Result</a>
                                <a href="" class="dropdown-item">Manage Result</a>
                            </div> 
                        </li>
                    </ul>
                </nav>
                <hr class="bg-light">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-6">
                <form action="login.php" method="post">
                    <fieldset class="width">
                        <legend>Admin Login</legend>
                        <div class="form-group">
                            <input type="text" class="form-control bg-secondary border-0 text-white"name="email" placeholder="Enter Email/ User Name" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control bg-secondary border-0 text-white" placeholder="Enter a Password"required>
                        </div>                    
                        <input type="submit" value="Login" class="form-control bg-secondary border-0 text-white" name="admin">
                        <div class="msg text-white">
                            <p id="demo"></p>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-6">
                <form action="result.php" method="get">
                    <fieldset  class="width">
                        <legend>For Student</legend>
                        <div class="form-group">
                            <?php 
                                include('db.php');
                                $sql="SELECT `cls_name` FROM `add_class`";
                                $run=mysqli_query($con,$sql);
                            ?><select name="dropdown" required class="form-control bg-secondary border-0 text-white">
                                <option selected disabled>Select Class</option>
                            <?php
                                while($data=mysqli_fetch_array($run)){
                            ?><option <?php echo $data['cls_name'];?>><?php echo $data['cls_name'];?></option><?php
                                }                            ?>
                                </select>                            
                        </div> 
                        <div class="form-group">
                            <input type="text" name="rollno" class="form-control bg-secondary border-0 text-white"placeholder="Roll Number" required>
                        </div>
                        <input type="submit" value="Get Result" class="form-control bg-secondary border-0 text-white" name="result">
                        <div class="msg">
                            <p id="demo1"></p>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
if(isset($_POST['admin'])){
    include('db.php');
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    $qry="SELECT * FROM `admin_log` WHERE `email`='$mail' AND `password`='$pass';";
    $run=mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
    
    if($row<1){
        ?><script>document.getElementById("demo").innerHTML = "Login is not Done";</script><?php
     }
     else{
        ?><script>document.getElementById("demo").innerHTML = "Login is successful";
        window.open('dashboard.php','_self');
        </script><?php
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        echo "id = ".$id; 
        
        $_SESSION['uid']=$id;         
     }
}

if(isset($_GET['result'])){
    include('db.php');
    $drop=$_GET['dropdown'];
    $rno=$_GET['rollno'];
    $qry="SELECT * FROM `add_result` WHERE `sclass`='$drop' AND `sroll`='$rno';";
    $run=mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
    
    if($row<1){
        ?><script>document.getElementById("demo1").innerHTML = "input is invalid";</script><?php
     }
     else{
        ?><script>document.getElementById("demo1").innerHTML = "Result is display";
        window.open('result.php','_self');
        </script><?php
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        echo "id = ".$id; 
        $_SESSION['uid']=$id;         
     }
}
?>


    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>