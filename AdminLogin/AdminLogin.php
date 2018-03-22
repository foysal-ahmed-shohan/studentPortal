
<!DOCTYPE html
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIU</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../style/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../style/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../style/css/login.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<style>
    body{
        background-image: url("../images/33.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .loginH2{
        font-size: 60px;
        color:white;
        margin-bottom:70px;

    }
    .marginTop{margin-top:90px;}
    .adminBtn,.userBtn{
        font-size:35px;
        border-radius: 15px;
        color:wheat;
    }
	</style>
</head>
<body>
<div class="container">
    <div class="row text-center ">
        <div class="col-md-12">
            <br /><br />
            <h2 class="adminLoginH2" style="color:white;"> DIU STUDENT PORTAL</h2>

            <h5 style="color:yellow;">( Login yourself to get access )</h5>
            <br />
        </div>
    </div>
    <div class="row ">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 adminPanel">
            <div class="panel panel-default adminPanel ">

                <div class="panel-heading">
                    <strong>   DIU ADMIN Login </strong>
                </div>

                <div class="panel-body adminPanel">
                    <form class="adminPanel" action="../userArea/loginProcess.php" method="post">
                        <br />
                        <div class="form-group input-group ">
                            <span class="input-group-addon"><i class="fa fa-tag" ></i></span>
                            <input type="text" class="form-control adminPanel " placeholder="Please Enter Your ID " name="officeId" required />
                        </div>
                       
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control adminPanel"  placeholder="Your Password" name="password" required/>
                        </div>
                        <div class="form-group">

                            <span class="pull-right">
                                                   <a class="forget" href="" style="color:white;">New Register</a>
                                            </span>
                        </div>
                    <br/>
                        <input type="submit" name="submit" value="Login Now" class="btn btn-primary ">
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>
<div class="container">
</div>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../style/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../style/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../style/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../style/js/custom.js"></script>

</body>
</html>
