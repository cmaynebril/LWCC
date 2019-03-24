<?php
    include '../includes/dbh.php';
    include 'NavTop.php';
?>
        <div class="container-fluid" style="padding-top:100px;">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card" style="background:#193446; color:white">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search Name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Lifegroup Leader</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lifegroup Leader">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Mentor</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mentor">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-9">
                    <div class="card" style=" height: 100%;">
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
