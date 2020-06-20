<?php
        session_start();
        if($_SESSION['uid']){
             echo "";
        }
        else
        {
            header('location:login.php');
        }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>class</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<body class="bg text-white">
    
<section>
    <div class="container-fluid">
        <div class="row p-0">
            <div class="col-12">
                <div class="text-center dsply">
                    <a href="dashboard.php"><img src="images/logo1.png" alt="" class="img-fluid float-left" width="118px"></a>
                    <span class="">Dashboard</span>
                    <a href="logout.php"><span class="float-right dsply">Logout</span></a>
                </div>
                <nav class="nav justify-content-center py-5">
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown px">
                            <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Classess</a>
                            <div class="dropdown-menu">
                                <a href="add_class.php" class="dropdown-item">Add Class</a>
                                <a href="manage_class.php" class="dropdown-item">Manage Classess</a>
                            </div> 
                        </li>
                        <li class="nav-item dropdown px">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student</a>
                            <div class="dropdown-menu">
                                <a href="add_student.php" class="dropdown-item">Add Student</a>
                                <a href="manage_student.php" class="dropdown-item">Manage Student</a>
                            </div> 
                        </li>
                        <li class="nav-item dropdown px">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Results</a>
                            <div class="dropdown-menu">
                                <a href="add_result.php" class="dropdown-item">Add Result</a>
                                <a href="manage_result.php" class="dropdown-item">Manage Result</a>
                            </div> 
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="add_class.php" method="post">
                    <fieldset>
                        <legend>Add Class</legend>
                        <div class="form-group">
                            <input type="text" class="form-control bg-secondary border-0 text-white"name="cname" placeholder="Class Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cid" class="form-control bg-secondary border-0 text-white" placeholder="Class ID">
                        </div>                    
                        <input type="submit" value="Submit" class="form-control bg-secondary border-0 text-white"name="add">
                        <div class="msg">
                            <p id="demo"></p>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($_POST['add'])){
    include('db.php');
    $class_name=$_POST['cname'];
    $class_id=$_POST['cid'];
    $qry="INSERT INTO `add_class` (`cls_name`, `cls_id`) VALUES ('$class_name','$class_id')";
    $run=mysqli_query($con,$qry);    
    if(!$run){
        ?>
            <script>document.getElementById("demo").innerHTML="CLASS IS NOT ADDED";</script>
        <?php
    }
    else{
        ?>
            <script>document.getElementById("demo").innerHTML="CLASS IS ADD";</script>
        <?php
    }
}
?>
    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>