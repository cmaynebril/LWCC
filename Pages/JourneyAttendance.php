<?php
    include '../includes/dbh.php';
    include 'NavTop.php';
?>

<div class="container-fluid" style="padding-top:100px;">
<form class="form-inline" action="JourneyAttendance.php" method="POST">
    <form class="form-inline">
        <div class="text-right">
        
        <?php
        if(isset($_POST["Filter"]))
        {
            echo '  
                <select class="form-control" name="FilterMember">
                <option value="'.$_POST["FilterMember"].'">'.$_POST["FilterMember"].'</option>
                ';
                $sql = "SELECT * FROM tblmembers WHERE Mentor='".$_SESSION['Mentorname']."' AND NetworkLeader='".$_SESSION['network']."' ORDER BY Name ASC";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);
                    if($queryResult > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)){
                            echo '
                            <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                            ';
                            }
                    }   
            echo '
            </select>
           ';
        }
        else {
            echo '
            <select class="form-control" name="FilterMember">
            <option value=" "> </option>';
              
                    $sql = "SELECT * FROM tblmembers WHERE Mentor='".$_SESSION['Mentorname']."' AND NetworkLeader='".$_SESSION['network']."' ORDER BY Name ASC";
                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);
                        if($queryResult > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '
                                <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                ';
                                }
                        }   
            echo '
            </select>   '; 
        }
            ?>
                            
            <button type="submit" name="Filter" class="btn btn-secondary">
                Filter attendance
            </button>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAttendance">
                Add Attendance
            </button>
        </div>
    </form>
    <form action="../includes/addJourney.php" method="POST">
    <!--Add Attendance Modal -->
    <div class="modal fade" id="AddAttendance" tabindex="-1" role="dialog" aria-labelledby="AddAttendanceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddAttendance">Add Journey Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Member</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <select class="form-control" name="memberName">
                                    <option value=" "> </option>
                                        <?php
                                            $sql = "SELECT * FROM tblmembers WHERE Mentor='".$_SESSION['Mentorname']."' AND NetworkLeader='".$_SESSION['network']."' ORDER BY Name ASC";
                                            $result = mysqli_query($conn, $sql);
                                            $queryResult = mysqli_num_rows($result);
                                            if($queryResult > 0)
                                            {
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    echo '
                                                        <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                                    ';
                                                }
                                            }   
                                        ?>
                                </select>
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mentor</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <select class="form-control" name="Mentor">
                                    <option value=" "> </option>
                                        <?php
                                        $sqlx = "SELECT Name FROM tblmembers WHERE IsMentor='Yes' AND NetworkLeader='".$_SESSION['network']."' ORDER BY Name ASC";
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
                                               echo'
                                               <option value="'.$_SESSION['network'].'">'.$_SESSION['network'].'</option> ';  
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

                    <div class="row">
                        <div class="col-lg-6">
                        <label for="formGroupExampleInput">Process</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <select class="form-control" name="Process">
                                    <option value=" "> </option>
                                    <option value="LifeTract">Life Tract</option>
                                    <option value="LifeStart1">Life Start 1</option>
                                    <option value="LifeStart2">Life Start 2</option>
                                    <option value="LifeStart3">Life Start 3</option>
                                    <option value="LifeStart4">Life Start 4</option>
                                    <option value="LifeStart5">Life Start 5</option>
                                    <option value="LifeRetreat">Life Retreat</option>
                                    <option value="LifeStyle1">Life Style 1</option>
                                    <option value="LifeStyle2">Life Style 2</option>
                                    <option value="LifeStyle3">Life Style 3</option>
                                    <option value="LifeStyle4">Life Style 4</option>
                                    <option value="LifeStyle5">Life Style 5</option>
                                    <option value="LifeStyle6">Life Style 6</option>
                                    <option value="LifeStyle7">Life Style 7</option>
                                    <option value="LifeStyle8">Life Style 8</option>
                                    <option value="LifeStyle9">Life Style 9</option>
                                    <option value="FC">Foundations Class</option>
                                    <option value="MDC">Make Disciple Class</option>
                                    <option value="LGC">Lifegroup Class</option>
                                    <option value="SATTELITE">Sattelite</option>
                                    <option value="Kainos">Kainos</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-lg-6'>
                        <label for="formGroupExampleInput">Date Processed</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <input type="date" class="form-control" name="DateProcessed"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="SaveJourney">Save changes</button>
                </div>
            </div>
        </div>
    </form>
    </div>

    <br />

    <div class="row">
        <div class="col-lg-12">
            <div class="card" style=" height: 500px;">
                <div class="card-body">
                <div class="table-responsive-lg" style="height: 479px;">                     
                    <table class="table table-hover">
                        <thead class="thead-light" style="text-align:center">
                            <tr>
                                <th>Name</th>
                                <th>LT</th>
                                <th>Date</th>
                                <th>LStart 1</th>
                                <th>Date</th>
                                <th>LStart 2</th>
                                <th>Date</th>
                                <th>LStart 3</th>
                                <th>Date</th>
                                <th>LStart 4</th>
                                <th>Date</th>
                                <th>LStart 5</th>
                                <th>Date</th>
                                <th>LRetreat</th>
                                <th>Date</th>
                                <th>LStyle 1</th>
                                <th>Date</th>
                                <th>LStyle 2</th>
                                <th>Date</th>
                                <th>LStyle 3</th>
                                <th>Date</th>
                                <th>LStyle 4</th>
                                <th>Date</th>
                                <th>LStyle 5</th>
                                <th>Date</th>
                                <th>LStyle 6</th>
                                <th>Date</th>
                                <th>LStyle 7</th>
                                <th>Date</th>
                                <th>LStyle 8</th>
                                <th>Date</th>
                                <th>LStyle 9</th>
                                <th>Date</th>
                                <th>FC</th>
                                <th>Date</th>
                                <th>MDC</th>
                                <th>Date</th>
                                <th>LGC</th>
                                <th>Date</th>
                                <th>SATTELITE</th>
                                <th>Date</th>
                                <th>KAINOS</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                     <?php
                     if(isset($_POST['Filter'])){
                        $sql = "SELECT * FROM tbllifeprocess WHERE Name like '%".$_POST['FilterMember']."%'";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);
                        if($queryResult > 0) {
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tbody >
                                    <tr>
                                        <td>'.$row["Name"].'</td>
                                        <td>'.$row["LifeTract"].'</td>
                                        <td>'.$row["dtLifeTract"].'</td>
                                        <td>'.$row["LifeStart1"].'</td>
                                        <td>'.$row["dtLifeStart1"].'</td>
                                        <td>'.$row["LifeStart2"].'</td>
                                        <td>'.$row["dtLifeStart2"].'</td>
                                        <td>'.$row["LifeStart3"].'</td>
                                        <td>'.$row["dtLifeStart3"].'</td>
                                        <td>'.$row["LifeStart4"].'</td>
                                        <td>'.$row["dtLifeStart4"].'</td>
                                        <td>'.$row["LifeStart5"].'</td>
                                        <td>'.$row["dtLifeStart5"].'</td>
                                        <td>'.$row["LifeRetreat"].'</td>
                                        <td>'.$row["dtLifeRetreat"].'</td>
                                        <td>'.$row["LifeStyle1"].'</td>
                                        <td>'.$row["dtLifeStyle1"].'</td>
                                        <td>'.$row["LifeStyle2"].'</td>
                                        <td>'.$row["dtLifeStyle2"].'</td>
                                        <td>'.$row["LifeStyle3"].'</td>
                                        <td>'.$row["dtLifeStyle3"].'</td>
                                        <td>'.$row["LifeStyle4"].'</td>
                                        <td>'.$row["dtLifeStyle4"].'</td>
                                        <td>'.$row["LifeStyle5"].'</td>
                                        <td>'.$row["dtLifeStyle5"].'</td>
                                        <td>'.$row["LifeStyle6"].'</td>
                                        <td>'.$row["dtLifeStyle6"].'</td>
                                        <td>'.$row["LifeStyle7"].'</td>
                                        <td>'.$row["dtLifeStyle7"].'</td>
                                        <td>'.$row["LifeStyle8"].'</td>
                                        <td>'.$row["dtLifeStyle8"].'</td>
                                        <td>'.$row["LifeStyle9"].'</td>
                                        <td>'.$row["dtLifeStyle9"].'</td>
                                        <td>'.$row["FC"].'</td>
                                        <td>'.$row["dtFC"].'</td>
                                        <td>'.$row["MDC"].'</td>
                                        <td>'.$row["dtMDC"].'</td>
                                        <td>'.$row["LGC"].'</td>
                                        <td>'.$row["dtLGC"].'</td>
                                        <td>'.$row["SATELLITE"].'</td>
                                        <td>'.$row["dtSATELLITE"].'</td>
                                        <td>'.$row["Kainos"].'</td>
                                        <td>'.$row["dtKainos"].'</td>
                                    </tr>
                                </tbody>
                                ';
                            }
                        } 
                     } else {
                        $sql = "SELECT * FROM tbllifeprocess ORDER BY Name ASC";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);
                        if($queryResult > 0)    
                            {
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo '
                                    <tbody >
                                        <tr>
                                            <td>'.$row["Name"].'</td>
                                            <td>'.$row["LifeTract"].'</td>
                                            <td>'.$row["dtLifeTract"].'</td>
                                            <td>'.$row["LifeStart1"].'</td>
                                            <td>'.$row["dtLifeStart1"].'</td>
                                            <td>'.$row["LifeStart2"].'</td>
                                            <td>'.$row["dtLifeStart2"].'</td>
                                            <td>'.$row["LifeStart3"].'</td>
                                            <td>'.$row["dtLifeStart3"].'</td>
                                            <td>'.$row["LifeStart4"].'</td>
                                            <td>'.$row["dtLifeStart4"].'</td>
                                            <td>'.$row["LifeStart5"].'</td>
                                            <td>'.$row["dtLifeStart5"].'</td>
                                            <td>'.$row["LifeRetreat"].'</td>
                                            <td>'.$row["dtLifeRetreat"].'</td>
                                            <td>'.$row["LifeStyle1"].'</td>
                                            <td>'.$row["dtLifeStyle1"].'</td>
                                            <td>'.$row["LifeStyle2"].'</td>
                                            <td>'.$row["dtLifeStyle2"].'</td>
                                            <td>'.$row["LifeStyle3"].'</td>
                                            <td>'.$row["dtLifeStyle3"].'</td>
                                            <td>'.$row["LifeStyle4"].'</td>
                                            <td>'.$row["dtLifeStyle4"].'</td>
                                            <td>'.$row["LifeStyle5"].'</td>
                                            <td>'.$row["dtLifeStyle5"].'</td>
                                            <td>'.$row["LifeStyle6"].'</td>
                                            <td>'.$row["dtLifeStyle6"].'</td>
                                            <td>'.$row["LifeStyle7"].'</td>
                                            <td>'.$row["dtLifeStyle7"].'</td>
                                            <td>'.$row["LifeStyle8"].'</td>
                                            <td>'.$row["dtLifeStyle8"].'</td>
                                            <td>'.$row["LifeStyle9"].'</td>
                                            <td>'.$row["dtLifeStyle9"].'</td>
                                            <td>'.$row["FC"].'</td>
                                            <td>'.$row["dtFC"].'</td>
                                            <td>'.$row["MDC"].'</td>
                                            <td>'.$row["dtMDC"].'</td>
                                            <td>'.$row["LGC"].'</td>
                                            <td>'.$row["dtLGC"].'</td>
                                            <td>'.$row["SATELLITE"].'</td>
                                            <td>'.$row["dtSATELLITE"].'</td>
                                            <td>'.$row["Kainos"].'</td>
                                            <td>'.$row["dtKainos"].'</td>
                                        </tr>
                                    </tbody>
                                    ';
                                }
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



</form>
</div>

<!--===============================================================================================-->
<script src="~/Scripts/jquery-3.3.1.min.js"></script>

<!--===============================================================================================-->
<script src="~/vendor/bootstrap/js/popper.js"></script>
<script src="~/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="~/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="~/js/main.js"></script>
</body>
</html>
