
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DIU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/css/bootstrap.min.css"><link href="../style/css/login.css" rel="stylesheet" />

</head>
<style>body{  background-image: url("../images/.jpg");

</style>
<body>

<div class="container addEmployee">

  <h2>Add New Student</h2>

        <form action="empStore.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4  addEmployee">
        <div class="form-group">
      <label for="empName">Student Name:</label>
      <input type="text" class="form-control addEmployee" id="empName" placeholder="Enter Student Name" name="empName" required>
    </div>

                    <div class="form-group">
                        <label for="Egender">Gender:</label><br>
                        <label class="radio-inline"><input type="radio" name="sgender" value="Female">Female</label>
                        <label class="radio-inline"><input type="radio" name="sgender" value="Male">Male</label>
                        <label class="radio-inline"><input type="radio" name="sgender" value="Others">Others</label>
                    </div>
                    <div class="form-group">
                        <label for="bDate">Birth Date:</label>
                        <input type="date" class="form-control addEmployee" id="datepicker"  placeholder="Enter Student Birth Date" name="bDate" required>
                    </div>
                    <div class="form-group">
                        <label for="eBlodG">Blood Group:</label>
                        <input type="text" class="form-control addEmployee" id="sBlodG" placeholder="Enter Student Blood Group" name="eBlodG" required>
                    </div>
                    <div class="form-group">
                        <label for="eNid">ID Number:</label>
                        <input type="text" class="form-control addEmployee" id="sNid" placeholder="Enter Student ID No" name="eNid" required>
                    </div>
                </div>

            <div class="col-md-4  addEmployee">
               
      <div class="form-group">
          <label for="deptName">Department:</label>
          <input type="text" class="form-control addEmployee" id="deptName" placeholder="Enter Department Name" name="deptName" required>
</div>
      <div class="form-group">
          <label for="positionName">Address:</label>
          <input type="text" class="form-control addEmployee" id="address" placeholder="Enter Address" name="positionName" required>
      </div>
      <div class="form-group">
          <label for="eEmail">Email:</label>
          <input type="email" class="form-control addEmployee" id="sEmail" placeholder="Enter Student Mail" name="eEmail" required>
      </div>
	  
	    <div class="form-group">
          <label for="eMobile">Mobile:</label>
          <input type="tel" class="form-control addEmployee" id="sMobile" placeholder="Enter Student Mobile" name="eMobile" required>
      </div>

            </div>

                <div class="col-md-4 addEmployee">




    
    
      <div class="form-group">
          <label for="employeeImage">input Image</label>
          <input type="file" class="form-control-file" id="sImage" name="employeeImage" aria-describedby="fileHelp" required>
      </div>
                    <div class="form-group">
                        <label for="joinDate">Admission Date:</label>
                        <input type="date" class="form-control addEmployee" id="datepicker2"  placeholder="Enter Student Admission Date" name="joinDate" required>
                    </div>
                </div>
				</br>
				
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 addEmployee">
                        <div class="form-inline">
                            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure submit this Information?');">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
</div>



</body>
</html>
