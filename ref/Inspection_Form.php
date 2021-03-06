<?php
 include("db-connect.php");
 include("inspec-insert.php");
    #-----------For Dropdown option---------------
    $select = "SELECT * FROM `plane part stocks`";
    $result = mysqli_query($connection,$select);
    $select2 = "SELECT * FROM `status code`";
    $result2 = mysqli_query($connection,$select2);
    $select3 = "SELECT * FROM `service form`";
    $result3 = mysqli_query($connection,$select3);
    $select4 = "SELECT * FROM `human resources` WHERE `StaffID` LIKE 'TCE%';";
    $result4 = mysqli_query($connection,$select4);
    $select5 = "SELECT * FROM `airplane info`";
    $result5 = mysqli_query($connection,$select5);
    #----------------------------------------------
?> 
<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Inspection Form</title>
    <!--CSS-->
    <!-- <link rel="stylesheet" href="style-Inspection_Form.css"> -->
    <link rel="stylesheet" type="text/css" href="style-form.css">
</head>

<body>
    <body>
    <div class="container my-5">
    <h2 class="text-center header">SERVICE FORM</h2> 
    <form action="inspec-insert.php" method="post">
        <div class="form-group">
            <label for="ServiceID">Service_FormID</label>
                <input type="text" name="ServiceID" class="form-control" value="<?php echo $SFid;?>" readonly> 
        </div>
        <div class="form-group">
            <label for="Part1">Part#1</label>
                <select name="Part1" class="form-control form-select">
                    <option value="none" >Please select PlanePart</option>
                    <?php foreach ($result as $key => $value) { ?>
                    <option value="<?=$value['Part_ID'];?>"><?=$value['Part_ID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="Part2">Part#2</label>
                <select name="Part2" class="form-control form-select">
                    <option value="none">Please select PlanePart</option>
                    <?php foreach ($result as $key => $value) { ?>
                    <option value="<?=$value['Part_ID'];?>"><?=$value['Part_ID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="Part3">Part#3</label>
                <select name="Part3" class="form-control form-select">
                    <option value="none">Please select PlanePart</option>
                    <?php foreach ($result as $key => $value) { ?>
                    <option value="<?=$value['Part_ID'];?>"><?=$value['Part_ID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="Part4">Part#4</label>
                <select name="Part4" class="form-control form-select">
                    <option value="none">Please select PlanePart</option>
                    <?php foreach ($result as $key => $value) { ?>
                    <option value="<?=$value['Part_ID'];?>"><?=$value['Part_ID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="Part5">Part#5</label>
                <select name="Part5" class="form-control form-select">
                    <option value="none">Please select PlanePart</option>
                    <?php foreach ($result as $key => $value) { ?>
                    <option value="<?=$value['Part_ID'];?>"><?=$value['Part_ID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="from-group d-grid gap-2 col-6 mx-auto">
        <button type="submit" name="send" class="btn btn-primary my-3 center ">Send Request</button>
        </div>
            </form>
            </div>

    <!-- inspection form -->

    <div class="container my-5">
    <h2 class="text-center header">INSPECTION FORM</h2> 
    <form action="inspec-insert.php" method="post">
         <div class="form-group">
            <label for="InspectionID">Inspection_FormID</label>
                <input type="text" name="InspectionID" class="form-control" value="<?php echo $IPid;?>" readonly> 
        </div>
        <div class="form-group">
            <label for="InspectionDate">InspectionDate</label>
                <input type="datetime-local" name="InspectionDate" class="form-control"> 
        </div>
        <div class="form-group">
            <label for="Engineer_ID">EngineerID</label>
                <select name="Engineer_ID" class="form-control form-select">
                    <option>Please select engineer</option>
                    <?php foreach ($result4 as $key => $value) { ?>
                    <option value="<?=$value['StaffID'];?>"><?=$value['StaffID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="InspectionType">InspectionType</label>
                <select name="InspectionType" class="form-control form-select">
                    <option>Please select type</option>
                    <option>A-Check</option>
                    <option>B-Check</option>
                    <option>C-Check</option>
                    <option>D-Check</option>
                </select>
        </div>
        <div class="form-group">
            <label for="Airplane">AirplaneID</label>
                <select name="AirplaneID" class="form-control form-select">
                    <option>Please select airplane</option>
                    <?php foreach ($result5 as $key => $value) { ?>
                    <option value="<?=$value['AirplaneCode'];?>"><?=$value['AirplaneCode'];?></option>
                } 
                <?php } ?>
                </select>
        </div> 
         <div class="form-group">
            <label for="AirplaneStatus">Status</label>
                <select name="AirplaneStatus" class="form-control form-select">
                    <option>Please select status</option>
                    <?php foreach ($result2 as $key => $value) { ?>
                    <option value="<?=$value['Status_Code'];?>"><?=$value['Status_Code'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label for="Comment">Comment</label>
                <textarea type="text" name="Comment" class="form-control" cols="30" rows="10"></textarea> 
        </div>
        <div class="form-group">
            <label for="ServiceID2">Service_FormID</label>
                <select name="ServiceID2" class="form-control form-select">
                    <option value="none">Please select Form</option>
                    <?php foreach ($result3 as $key => $value) { ?>
                    <option value="<?=$value['Service_FormID'];?>"><?=$value['Service_FormID'];?></option>
                } 
                <?php } ?>
                </select>
        </div>
        <div class="from-group d-grid gap-2 col-6 mx-auto">
        <button type="submit" name="submit" class="btn btn-primary my-3 center ">Submit</button>
        </div>
    </form>
            </div>
</body>
</html>