<?php
    include '../includes/dbh.php';
    include 'NavTop.php';
?>

<div class="container-fluid" style="padding-top:100px;">
    <form class="form-inline" action="SundayLGAttendance.php" method="POST">
        <div class="text-right">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <?php
        if(isset($_POST["Filter"]))
        {
            echo '  <select class="form-control" name="FilterMonth">
                <option value="'.$_POST["FilterMonth"].'">'.$_POST["FilterMonth"].'</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <select class="form-control" name="FilterYear">
                <option value="'.$_POST["FilterYear"].'">'.$_POST["FilterYear"].'</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>';

        }
        else {
          echo '  <select class="form-control" name="FilterMonth">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <select class="form-control" name="FilterYear">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>';
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
<form action="../includes/addSundayLG.php" method="POST">
    <!--Add Attendance Modal -->
    <div class="modal fade" id="AddAttendance" tabindex="-1" role="dialog" aria-labelledby="AddAttendanceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddAttendance">Add Sunday/Lifegroup Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                    <label for="formGroupExampleInput">Member</label>
                        <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                            <select class="form-control" name="memberName">
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
                                        $sqlx = "SELECT * FROM tblmembers WHERE IsMentor='Yes' AND NetworkLeader='".$_SESSION['network']."' ORDER BY Name ASC";
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
                                        echo '
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
                                        $sqlz = "SELECT * FROM tblnetworkleader ORDER BY Name ASC";
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
                        <label for="formGroupExampleInput">Month</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <select class="form-control" style="width:100%" name="Month">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                        <label for="formGroupExampleInput">Year</label>
                            <div class="form-check-inline" id="formGroupExampleInput" style="width:100%">
                                <select class="form-control" name="Year">
                                    <option value=" "> </option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-bottom:10px; padding-top:15px;">
                        <div class="col-lg-3" style="padding-top:10px;">
                                <label class="form-check-label" style="padding-left:20px;">
                                    <input type="hidden" name="Sundaycheck" value="0">
                                    <input type="checkbox" class="form-check-input" value="1" name="Sundaycheck">Sunday
                                </label>
                        </div>
                        <div class="col-lg-9">
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <select class="form-control" name="Sunday">
                                    <option value=" "> </option>
                                    <option value="1stSunday">1st Week</option>
                                    <option value="2ndSunday">2nd Week</option>
                                    <option value="3rdSunday">3rd Week</option>
                                    <option value="4thSunday">4th Week</option>
                                    <option value="5thSunday">5th Week</option>            
                                    </select>     
                                </div>
                                <div class="col-lg-6"> 
                                    <select class="form-control" name="zSunday">
                                    <option value=" "> </option>
                                    <option value="Absent">Absent</option>
                                    <option value="Present">Present</option>
                                    </select>    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-bottom:10px;padding-top:15px;">
                        <div class="col-lg-3" style="padding-top:10px;">
                            <label class="form-check-label" style="padding-left:20px;">
                            <input type="hidden" name="Lifegroupcheck" value="0">
                                <input type="checkbox" class="form-check-input" value="1" name="Lifegroupcheck">Lifegroup
                            </label>
                        </div>
                        <div class="col-lg-9">
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <select class="form-control" name="Lifegroup">
                                        <option value=" "> </option>
                                        <option value="1stLifegroup">1st Week</option>
                                        <option value="2ndLifegroup">2nd Week</option>
                                        <option value="3rdLifegroup">3rd Week</option>
                                        <option value="4thLifegroup">4th Week</option>
                                        <option value="5thLifegroup">5th Week</option>   
                                    </select> 
                                </div>
                                <div class="col-lg-6"> 
                                    <select class="form-control" name="zLifegroup">
                                    <option value=" "> </option>
                                    <option value="Absent">Absent</option>
                                    <option value="Present">Present</option>
                                    </select>    
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="saveSundayLG">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <br />

    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="height: 500px;">
                <div class="card-body">
                    <div class="table-responsive" style="max-height:479px" >
                        <table class="table table-hover">
                            <thead class="thead-light" style="text-align:center">
                                <tr>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>1st Sunday</th>
                                    <th>Lifegroup</th>
                                    <th>2nd Sunday</th>
                                    <th>Lifegroup</th>
                                    <th>3rd Sunday</th>
                                    <th>Lifegroup</th>
                                    <th>4th Sunday</th>
                                    <th>Lifegroup</th>
                                    <th>5th Sunday</th>
                                    <th>Lifegroup</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_POST['Filter'])){
                                $sql = "SELECT * FROM tblsundaylgattendance WHERE zMonth='".$_POST['FilterMonth']."' AND zYear='".$_POST['FilterYear']."' AND NetworkLeader='".$_SESSION['network']."' ORDER BY  zYear,zMonthDigit,Name ASC";
                                $result = mysqli_query($conn, $sql);
                                $queryResult = mysqli_num_rows($result);
                                if($queryResult > 0)    
                                    {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo '
                                            <tbody id="myTable">
                                                <tr>
                                                    <td>'.$row["Name"].'</td>
                                                    <td>'.$row["zMonth"].'</td>
                                                    <td>'.$row["zYear"].'</td>
                                                    <td>'.$row["1stSunday"].'</td>
                                                    <td>'.$row["1stLifegroup"].'</td>
                                                    <td>'.$row["2ndSunday"].'</td>
                                                    <td>'.$row["2ndLifegroup"].'</td>
                                                    <td>'.$row["3rdSunday"].'</td>
                                                    <td>'.$row["3rdLifegroup"].'</td>
                                                    <td>'.$row["4thSunday"].'</td>
                                                    <td>'.$row["4thLifegroup"].'</td>
                                                    <td>'.$row["5thSunday"].'</td>
                                                    <td>'.$row["5thLifegroup"].'</td>
                                                    <td>
                                                        <a href="../includes/deleteSundayLG.php?delete='.$row["ID"].'" onclick="return confirm('; echo"'Proceed to delete this record?'"; echo')" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            ';
                                        }
                                    } 

                            }
                            else{
                                $sql = "SELECT * FROM tblsundaylgattendance WHERE NetworkLeader='".$_SESSION['network']."' ORDER BY zYear,zMonthDigit,Name ASC";
                                $result = mysqli_query($conn, $sql);
                                $queryResult = mysqli_num_rows($result);
                                if($queryResult > 0)    
                                    {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo '
                                            <tbody id="myTable">
                                                <tr>
                                                    <td>'.$row["Name"].'</td>
                                                    <td>'.$row["zMonth"].'</td>
                                                    <td>'.$row["zYear"].'</td>
                                                    <td>'.$row["1stSunday"].'</td>
                                                    <td>'.$row["1stLifegroup"].'</td>
                                                    <td>'.$row["2ndSunday"].'</td>
                                                    <td>'.$row["2ndLifegroup"].'</td>
                                                    <td>'.$row["3rdSunday"].'</td>
                                                    <td>'.$row["3rdLifegroup"].'</td>
                                                    <td>'.$row["4thSunday"].'</td>
                                                    <td>'.$row["4thLifegroup"].'</td>
                                                    <td>'.$row["5thSunday"].'</td>
                                                    <td>'.$row["5thLifegroup"].'</td>
                                                    <td>
                                                        <a href="../includes/deleteSundayLG.php?delete='.$row["ID"].'" onclick="return confirm('; echo"'Proceed to delete this record?'"; echo')" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                    </td>
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

  //OUT will turn RED
  $(document).ready(function () {
        $('table td').each(function () {
            if ($(this).text() == 'Absent') {
                $(this).css('color', 'red');
            }
        });
    });
</script>

</body>
</html>
