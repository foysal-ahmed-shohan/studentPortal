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

  <h2>Add Course Details</h2>

        <form action="empStore.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6  addEmployee">
        <div class="form-group">
      <label for="empName">Course Code:</label>
      <input type="text" class="form-control addEmployee" id="ccode" placeholder="Enter Course Code" name="empName" required>
    </div>

                   
                   <div class="form-group">
      <label for="empName">Course Tittle:</label>
      <input type="text" class="form-control addEmployee" id="ctittle" placeholder="Enter Course Tittle" name="empName" required>
    </div>
                    <div class="form-group">
                        <label for="eNid">Credit:</label>
                        <input type="text" class="form-control addEmployee" id="credit" placeholder="Enter Course Credit" name="eNid" required>
                    </div>
                </div>

            <div class="col-md-6  addEmployee">
               
      <div class="form-group">
          <label for="deptName">Student ID:</label>
          <input type="text" class="form-control addEmployee" id="sid" placeholder="Enter Student ID" name="deptName" required>
</div>
     
      <div class="form-group">
          <label for="eEmail">Grade:</label>
          <input type="email" class="form-control addEmployee" id="grade" placeholder="Enter Course Grade" name="eEmail" required>
      </div>
	  
	    <div class="form-group">
          <label for="eMobile">Grade Point:</label>
          <input type="tel" class="form-control addEmployee" id="gpoint" placeholder="Enter Grade Point" name="eMobile" required>
      </div>

            </div>

               
				
				
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 addEmployee">
                        <div class="form-inline"><br></br></br>
                            <input type="reset" class="btn btn-danger" name="reset" value="Reset">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure submit this Information?');">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
</div>



</body>
</html>