<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<body class="bg text-white">
    
<section>
    <div class="container-fluid">
        <div class="row p-0">
            <div class="col-12">
                <div class="text-center">
                    <a href="index.php" class="float-left p-3">Back to Home</a>
                    <span class="dsply pr">Result</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php 
                include('db.php');
                if(!isset($_GET['dropdown']))
                    $drop=null;
                else
                    $drop=$_GET['dropdown'];
                $rno=$_GET['rollno'];
                
                $quer="SELECT `sname` FROM `add_student` WHERE `sroll`='$rno' AND `sclass`='$drop';";
                $name_run=mysqli_query($con,$quer);        
                $rows= mysqli_num_rows($name_run);
                if($rows<1){
                    echo "<script>alert('Student data not found!');
                    window.open('login.php','_self');
                    </script>";
                    exit();
                }else{
                    $name_data=mysqli_fetch_assoc($name_run);
                    ?><h3>Class: <?php echo $name_data['sname']; ?></h3><?php
                }

                $qry="SELECT * FROM `add_result` WHERE `sclass`='$drop' AND `sroll`='$rno';";
                $run=mysqli_query($con,$qry);        
                $row= mysqli_num_rows($run);
                if($row<1){
                    echo "<script>alert('Student data not found!');
                    window.open('login.php','_self');
                    </script>";
                    exit();
                }else{
                    $data=mysqli_fetch_assoc($run);
                    ?>
                    <div class="detail">
                        <h3>Class: <?php echo $data['sclass']; ?></h3>
                        <h3>Roll Number: <?php echo $data['sroll']; ?></h3>
                    </div>
                    <table class="table text-white text-center">
                        <tbody>
                            <tr class="text-uppercase">
                                <th>Subjects</th>
                                <th>Marks</th>
                            </tr>
                            <tr>
                                <td>Paper 1</td>
                                <td><?php echo $data['p1'];?></td>
                            </tr>
                            <tr>
                                <td>Paper 2</td>
                                <td><?php echo $data['p2'];?></td>
                            </tr>
                            <tr>
                                <td>Paper 3</td>
                                <td><?php echo $data['p3'];?></td>
                            </tr>
                            <tr>
                                <td>Paper 4</td>
                                <td><?php echo $data['p4'];?></td>
                            </tr>
                            <tr>
                                <td>Paper 5</td>
                                <td><?php echo $data['p5'];?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $p1=$data['p1']; 
                    $p2=$data['p2'];
                    $p3=$data['p3'];
                    $p4=$data['p4'];
                    $p5=$data['p5']; 
                    $marks=$p1+$p2+$p3+$p4+$p5;
                    $perc=$marks/5;
                    ?>
                    <h3>Marks: <?php echo $marks;?></h3>
                    <h3>Percentage: <?php echo $perc;?>%</h3>
                    <div class="text-center">
                        <button class="btn btn-info" onclick="window.print()">Print</button>
                    </div>
                    <?Php                 
                }
                
                ?>
            </div>
        </div>
    </div>
</section>


    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>