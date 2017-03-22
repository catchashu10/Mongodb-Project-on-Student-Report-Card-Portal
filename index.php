<?php
    require_once('./StudentResult.php');
    $db = new Student; //instance of the class
    $db1 = new Professor;
	$flag=0;
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Result Portal</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body style="background-color:white;">
		<!----------------------php for login-------------------------------------------------------------->
				<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							if( isset( $_POST['name'] ) ){
								$name=$_POST['name'];
								$adm=$_POST['admissionNo'];
								foreach( $db->fetchData() as $item )
								{      
									if($name==$item->name && $adm==$item->admissionNo){
										$flag=1;
										break;
									}
								}
								if($flag==1){
									session_start();
									$_SESSION['student'] = $adm;
									header("Location:./report.php");
								}
								else{
									$flag=3;
								}
							}
							if( isset( $_POST['pname'] ) ){
								$pname=$_POST['pname'];
								$id=$_POST['id'];
								foreach( $db1->fetchData() as $item )
								{      
									if($pname==$item->pname && $id==$item->id){
										$flag=1;
										break;
									}
								}
								if($flag==1){
									session_start();
									$_SESSION['prof']= $id;
									header("Location:./treport.php");
								}
								else{
									$flag=2;
								}
								
							}
						}
					?>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg" style="padding: 60px 0 20px 0;">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 style="text-decoration:underline;margin-top: -27px;">Student Report Card Portal</h1>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Professor Login</h3>
	                            		<p>Enter username and password to login:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-user"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="./index.php" method="post" class="login-form">
				                    	<div class="form-group">
				                        	<input type="text" name="pname" placeholder="Name" class="form-username form-control" id="form-username" required>
				                        </div>
				                        <div class="form-group">
				                        	<input type="password" name="id" placeholder="Professor Id" class="form-password form-control" id="form-password" required>
				                        </div>
				                        <button type="submit" name="plogin" class="btn">Login</button>
				                    </form>
									<?php
									if($flag==2){
									?>
										<p style="color:white;padding-top:20px;text-align:center;">Enter Correct Name and Id !</p>					
									<?php
								}
								?>
			                    </div>
		                    </div>
		                
		                	
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border" style=" margin-top: 100px;"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Student Login</h3>
	                            		<p>Enter Details to view your Report card</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-users"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="./index.php" method="post" class="registration-form">
				                    	<div class="form-group">
				                        	<input type="text" name="name" placeholder="Name" class="form-first-name form-control" id="form-first-name" required>
				                        </div>
				                        <div class="form-group">
				                        	<input type="text" name="admissionNo" placeholder="Admission No." class="form-last-name form-control" id="form-last-name" required>
				                        </div>
				        
				                        <button type="submit" name="slogin" class="btn">View Your Report Card</button>
				                    </form>
									<?php
									if($flag==3){
									?>
										<p style="color:white;padding-top:20px;text-align:center;">Enter Correct Name and Admission No. !</p>
									<?php
								}
								?>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        			
        				<a href="./addData.php"><h3 style="text-decoration:underline;margin-top: -1px;">Go to Database</h3></a>
        				
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
    </body>

</html>