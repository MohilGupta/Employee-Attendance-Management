
<?php 

session_start();
$emailUser = $_SESSION['userLoggedIn'];
$organisationId=$_SESSION['organisationId'];
/*echo $emailUser;
echo "<br>";
echo $organisationId;*/

?>

<head> <title>BeingThere - Employees</title> </head>
<?php include("../header.php"); ?>
<?php include("../includes/handlers/config.php"); ?>

<style>
    .mdc-data-table{  
        /* width: 167%; */
        width:50%;
         margin-left: -848px;
         margin-top:100px;
    }
    .dataTables_wrapper > .mdc-layout-grid{
         margin-left:463px;
    }
    .form-inline label{
           /* position: absolute;
            left: 1224px; */
    }
    .dataTables_wrapper{
            margin-top:100px;
    }
</style>

<div id="mainContainer">

    <h2 class="display-3" style="text-align:center;margin:10px;">Employee Details</h2>

    <table id="example" class="table table-striped table-bordered " cellspacing="0"   style="
        margin-left:18px;
        margin-top:100px;
        width: 50%;">
        <thead>
            <tr>
                <th>Employee Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Contact Number</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Reporting Manager</th>
                <th>Project Name</th>
                <th>Location</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>

            <?php 
                $query=mysqli_query($con,"SELECT * FROM employee_details WHERE organisation='$organisationId'");
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['eid']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['DOB']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['doj']; ?></td>
                        <td><?php echo $row['manager']; ?></td>
                        <td><?php echo $row['project_name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><a class="btn btn-warning" href="editemployee.php?edit=<?php echo $row['eid']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="deleteemployee.php?delete=<?php echo $row['eid']; ?>">Delete</a></td>
                    </tr>
            <?php }  ?>

        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
   
          /* $(document).ready(function() {
                $('#example').DataTable( {
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: ['_all'],
                            className: 'mdc-data-table__cell'
                        }
                    ]
                } );
            } ); */


    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $('#example').dataTable( {
  "autoWidth": false
} );
</script>  
<?php include("../footer.php"); ?>