<?php
    include '../includes/dbh.php';
    include 'NavTop.php';
?>
        <div class="container-fluid" style="padding-top:20px;">
        <?php
            if(isset($_GET['member'])) {
            if ($_GET['member'] == "updated"){
            echo '<div class="alert alert-success">
            <strong>Update Success!</strong>
            </div>';
            }
        }
        ?>

        
        <form class="form-inline">
            <div class="text-right">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewMember">
                Add New Member
                </button>    
            </div>
        </form>
<form action="../includes/addMember.php" method="POST">
    

    <!--Add Attendance Modal -->
    <div class="modal fade" id="AddNewMember" tabindex="-1" role="dialog" aria-labelledby="AddNewMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddNewMember">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name, First Name" name="MemberName">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Address</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address" name="Address">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Contact Number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Contact Number" name="ContactNumber">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Email Address</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email Address" name="EmailAddress">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Age</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Age" name="Age">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Birthday</label>
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Birthday" name="Birthday">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Civil Status</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="CivilStatus">
                                        <option value=""> </option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Gender</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="Gender">
                                        <option value=""> </option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nationality</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nationality" name="Nationality"> 
                    </div>
                  
                    <div class="form-group">
                        <label for="formGroupExampleInput">Company/School</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Company/School" name="CompanySchool">
                    </div>
                   
                            <div class="form-group">
                                <label for="formGroupExampleInput">Mentor</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="Mentor">
                                        <option value=" "> </option>
                                        <?php
                                        $sqlx = "SELECT DISTINCT Name FROM tblmembers WHERE IsMentor='Yes'";
                                        $resultx = mysqli_query($conn, $sqlx);
                                        $queryResultx = mysqli_num_rows($resultx);
                                        if($queryResultx > 0)
                                        {
                                            while ($rowx = mysqli_fetch_assoc($resultx)){
                                                echo '
                                                <option value="'.$rowx["Name"].'">'.$rowx["Name"].'</option>
                                                ';
                                            }
                                        }

                                        $sqlz = "SELECT Name FROM tblnetworkleader";
                                        $resultz = mysqli_query($conn, $sqlz);
                                        $queryResultz = mysqli_num_rows($resultz);
                                        if($queryResultz > 0)
                                        {
                                            while ($rowz = mysqli_fetch_assoc($resultz)){
                                               echo'
                                                <option value="'.$rowz["Name"].'">'.$rowz["Name"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                    <div class="form-group">
                            <label for="formGroupExampleInput">Network Leader</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="NetworkLeader">
                                        <option value=" "> </option>
                                        <?php
                                        $sqlz = "SELECT Name FROM tblnetworkleader";
                                        $resultz = mysqli_query($conn, $sqlz);
                                        $queryResultz = mysqli_num_rows($resultz);
                                        if($queryResultz > 0)
                                        {
                                            while ($rowz = mysqli_fetch_assoc($resultz)){
                                                echo '
                                                <option value="'.$rowz["Name"].'">'.$rowz["Name"].'</option>
                                                ';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>    
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mentor?</label>
                        <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                            <select class="form-control" name="isMentor">
                                <option value=""> </option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="SaveMember">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height: 500px">
                        <div class="card-body">
                        <div class="table-responsive" style="max-height:479px">
                            <table class="table table-hover">
                                <thead class="thead-light" style="text-align:center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Age</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th>Nationality</th>
                                        <th>Email Address</th>
                                        <th>Company/School</th>
                                        <th>Mentor</th>
                                        <th>Network Leader</th>
                                        <th>Is Mentor</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <?php
                                    $sql = "SELECT * FROM tblmembers ORDER BY Name ASC";
                                    $result = mysqli_query($conn, $sql);
                                    $queryResult = mysqli_num_rows($result);
                                    if($queryResult > 0)
                                    {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo '
                                            <tbody id="myTable">
                                                <tr>
                                                    <td>'.$row["Name"].'</td>
                                                    <td>'.$row["Address"].'</td>
                                                    <td>'.$row["ContactNumber"].'</td>
                                                    <td>'.$row["Age"].'</td>
                                                    <td>'.$row["Birthday"].'</td>
                                                    <td>'.$row["Gender"].'</td>
                                                    <td>'.$row["CivilStatus"].'</td>
                                                    <td>'.$row["Nationality"].'</td>
                                                    <td>'.$row["EmailAdd"].'</td>
                                                    <td>'.$row["CompanyOrSchool"].'</td>
                                                    <td>'.$row["Mentor"].'</td>
                                                    <td>'.$row["NetworkLeader"].'</td>
                                                    <td>'.$row["IsMentor"].'</td>
                                                    <td>
                                                        <a href="MemberList.php?edit='.$row["ID"].'" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                                        <a href="../includes/deleteMember.php?delete='.$row["ID"].'" onclick="return confirm('; echo"'Proceed to delete this member?'"; echo')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            ';
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="text-right">
                <button type="button" class="btn btn-secondary">Export Report</button>
            </div>
        </div>
        
<?php
if(isset($_GET['edit'])){
    $edit = $_GET['edit'];
    $sql1 = "SELECT * FROM tblmembers WHERE ID = '$edit'";
    $result1 = mysqli_query($conn, $sql1);
    $queryResult1 = mysqli_num_rows($result1);

    if($queryResult1 > 0)
    {
        while($row = mysqli_fetch_assoc($result1))
        {
            echo '
            <script type="text/javascript">';
            echo "
            $(window).on('load',function(){
                $('#myModal').modal('show');

            });
            </script>
            ";
            echo '
            
<form action="../includes/updateMember.php?ID='.$row['ID'].'" method="POST">
    

    <!--Add Attendance Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="AddNewMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddNewMember">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name, First Name" name="MemberName" value="'.$row['Name'].'">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Address</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address" name="Address" value="'.$row['Address'].'">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Contact Number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Contact Number" name="ContactNumber" value="'.$row['ContactNumber'].'">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Email Address</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email Address" name="EmailAddress" value="'.$row['EmailAdd'].'">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Age</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Age" name="Age" value="'.$row['Age'].'">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Birthday</label>
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Birthday" name="Birthday" value="'.$row['Birthday'].'">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Civil Status</label>
                                    <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                        <select class="form-control" name="CivilStatus" >
                                            <option value="'.$row['CivilStatus'].'">'.$row['CivilStatus'].' </option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Single">Single</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Gender</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="Gender">';
                                    if($row['Gender'] == "Female"){
                                        echo '
                                        <option value="'.$row['Gender'].'">'.$row['Gender'].'</option>
                                        <option value="Male">Male</option>
                                        ';
                                    }elseif ($row['Gender'] == "Male"){
                                        echo'
                                        <option value="'.$row['Gender'].'">'.$row['Gender'].'</option>
                                        <option value="Female">Female</option>';
                                    }else{
                                        echo'
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>';
                                    }
                                    echo'
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nationality</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nationality" name="Nationality" value="'.$row['Nationality'].'">  
                    </div>
                  
                    <div class="form-group">
                        <label for="formGroupExampleInput">Company/School</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Company/School" name="CompanySchool" value="'.$row['CompanyOrSchool'].'">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mentor</label>
                        <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                            <select class="form-control" name="Mentor">
                                <option value="'.$row['Mentor'].'">'.$row['Mentor'].'</option>';
                             
                                $sqlx = "SELECT DISTINCT Name FROM tblmembers WHERE IsMentor='Yes'";
                                $resultx = mysqli_query($conn, $sqlx);
                                $queryResultx = mysqli_num_rows($resultx);
                                if($queryResultx > 0)
                                {
                                    while ($rowx = mysqli_fetch_assoc($resultx)){
                                        echo '
                                        <option value="'.$rowx["Name"].'">'.$rowx["Name"].'</option>
                                        ';
                                    }
                                }

                                $sqlz = "SELECT Name FROM tblnetworkleader";
                                $resultz = mysqli_query($conn, $sqlz);
                                $queryResultz = mysqli_num_rows($resultz);
                                if($queryResultz > 0)
                                {
                                    while ($rowz = mysqli_fetch_assoc($resultz)){
                                       echo'
                                        <option value="'.$rowz["Name"].'">'.$rowz["Name"].'</option>';
                                    }
                                }
                                echo '
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput">Network Leader</label>
                                <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                    <select class="form-control" name="NetworkLeader">
                                        <option value="'.$row['NetworkLeader'].'">'.$row['NetworkLeader'].'</option>';
                                        
                                        $sqlz = "SELECT Name FROM tblnetworkleader";
                                        $resultz = mysqli_query($conn, $sqlz);
                                        $queryResultz = mysqli_num_rows($resultz);
                                        if($queryResultz > 0)
                                        {
                                            while ($rowz = mysqli_fetch_assoc($resultz)){
                                               echo'
                                                <option value="'.$rowz["Name"].'">'.$rowz["Name"].'</option>';
                                            }
                                        }
                                        echo '
                                    </select>
                                </div>    
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mentor?</label>
                        <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                            <select class="form-control" name="isMentor">';
                            if($row['IsMentor'] == "Yes"){
                                echo '
                                <option value="'.$row['IsMentor'].'">'.$row['IsMentor'].'</option>
                                <option value="No">No</option>
                                ';
                            }elseif($row['IsMentor'] == "No") {
                                echo'
                                <option value="'.$row['IsMentor'].'">'.$row['IsMentor'].'</option>
                                <option value="Yes">Yes</option>';
                            }else{
                                echo'
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>';
                            }
                            echo'
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="UpdateMember">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
';

            
        }

    }

}

?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    </body>
</html>
