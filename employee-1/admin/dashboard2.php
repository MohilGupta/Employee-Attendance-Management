<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>
<head> <title>BeingThere</title> </head>
<?php include("../header.php");  ?> 
<?php include("../includes/handlers/config.php"); ?>

<?php
    //this will turn off any errors
   error_reporting(0);
?>    
 
<div id="mainContainer"> 
    <?php 
             
        $result = mysqli_query($con,"SELECT `date` FROM `attendance_taken` WHERE date = '$ThisDate' AND organisation='$organisationId'");
        $row = mysqli_fetch_array($result);
        $total = $row[0];
        $today = strval($total);
        if ($total == $ThisDate)
        {
            ?> 
            <div id="text" style="margin-top: 120px;">
                <h3 class="text-center">Attandace for Today (<?php echo $ThisDate;  ?>) has been taken.</h3>
                <h4 class="text-center">View Today's attendance <br><a class="btn btn-primary btn-lg" href="viewAttendance.php" style="margin-top:27px;">View</a></h4>
                <br>
                <h3 class="text-center">Retake Attendance
                        
                <form action="retake.php" method="post">
                    <input type="submit" class="btn btn-danger btn-lg" name="retake" style="margin-top:27px;" value="Retake"></h3>
                </form> 
            </div>    
            <?php
            // echo $total;
        } //if ended here
    
        else
        {

            ?>
            <div class="col-sm-12">
                <h4 class="text-center display-3">Take Attendance </h4>  
                <br>   
                <h3 class="text-center display-5">Today's Date is <?php echo $ThisDate;  ?></h3>  
            </div>
                    
            
            <?php                     
                $result = mysqli_query($con,"select count(1) FROM employee_details WHERE organisation='$organisationId'");
                $row = mysqli_fetch_array($result);
                $total = $row[0];
            ?>
            
             
            <div class="fluid-container">

                <!--  Add table styles here in the table tag      -->

                <table id="example" class="table table-striped table-bordered" cellspacing="0"   style="margin-left: 9px;
                    margin-top:100px;
                    width: 99%;">
                    <thead>
                        <tr>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th class="present_color">Present</th>
                            <th>Absent</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        <form id="myForm" action="record.php" method="post">
                    
                        
                            <?php
                                $query = mysqli_query($con,"SELECT * FROM employee_details WHERE organisation='$organisationId'");
                                while($row=mysqli_fetch_assoc($query)) {
                            ?>
                                    <input type="hidden" value="<?php echo $total;?>" name="numbers" />
                                    <input type="hidden" value="<?php echo $row['eid'];?>" name="eid[]" />
                                    <input type="hidden" value="<?php echo $row['name'];?>" name="name[]" />
                                    <tr>
                                        <td><?php echo $row['eid']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><label><input type="checkbox" name="attendance[]" value="Present">Present</label></td>
                                        <td><label><input type="checkbox" name="attendance[]" value="Absent">Absent</label></td>
                                    </tr>
                                    <input type="hidden" value="<?php echo $ThisDate;?>" name="date[]" />   
                                <?php 
                                }?>    
                                <!-- while ended here -->   

                        </tbody> 
                    </table>
                    <div class="form-group">
                        <button type="submit" class="btn  btn-lg btn_action" name="submitButton" style="position: absolute;
                        left: 822px;
                        margin-top: 23px;">Submit</button> 
   
    </div> 
    </form>
    </div>
               

            

            <?php 
        } 
    ?> 

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script> 
   
         /*   $(document).ready(function() {
                $('#example').DataTable( {
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: ['_all'],
                            className: 'mdc-data-table__cell'
                        }
                    ]
                } );
            } ); 

            $(document).ready(function() {
                $('#example').DataTable();
            } );  */

</script>  

<?php include("../footer.php"); ?>

