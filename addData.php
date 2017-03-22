<?php
    require_once('./StudentResult.php');
    $db = new Student; //instance of the class
    $db1 = new Professor;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Record</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    </head>
    <body style="background-color:white;">
        
        
        
        <nav class="navbar navbar-inverse" style=" background-color: #337ab7;border-color: #337ab7;border-radius: 0px;">
            <h2 style="margin-top: 9px;color:white; display:inline-block;text-decoration:underline;padding-left:20px;">Admin Database Entry</h2>
            
            <a href="./index.php" style="margin-top: 9px;color:white;display:inline-block;padding-left:950px;"><h4>Home</h4></a>
                        
        </nav>
        
        
   <!--------------------------------To enter student details-------------------------------------------->       	
		<?php
			//Check if we have data to be inserted in the database .
            if($_SERVER["REQUEST_METHOD"]=="POST"){
			if( isset( $_POST['name'] ) ){
				if( !empty($_POST['name'] ) ){
					$insertable = $db->insertNewItem([
                     	'name'   =>  $_POST['name'],
                    	 'admissionNo'   =>  $_POST['admissionNo'],
                	     'branch'     =>  $_POST['branch'],
            	         'semester' =>  $_POST['semester']
          	       ]);
					if(insertable)
                        {
                        ?>
						<div class="container">
							
                                <div class="alert alert-success">
                                    <strong>Student Record Entered</strong>
                                </div>
                                
						</div>
                        <?php
                        }
					
				}
			}
            }
          
		?>
  <!---------------------------------------------------------------------------------------------------->

  <!----------------------------------To enter Professor's Details---------------------------------------->      
        <?php
			//Check if we have data to be inserted in the database .
            if($_SERVER["REQUEST_METHOD"]=="POST"){
			if( isset( $_POST['pname'] ) ){
				if( !empty($_POST['pname'] ) ){
					$insertable = $db1->insertNewItem([
                     	'pname'   =>  $_POST['pname'],
                    	 'id'   =>  $_POST['id'],
          	       ]);
					if(insertable)
                        {
                        ?>
						<div class="container">
							
                                <div class="alert alert-success">
                                    <strong>Professor Record Entered</strong>
                                </div>
                                
						</div>
                        <?php
                        }
					
				}
			}
            }
          
		?>
   <!---------------------------------------------------------------------------------------------------->  

   <!-------------------------------------Html for Student record entry form---------------------------->   
   
        <div class="container">
            <div class="col-sm-6">

                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <b>Add Student Details</b>
                    </div> 
                <div class="panel-body">
                <!-----form begins---------------------------------------->    
                    <form action="./addData.php" method="POST">
                    
                        <div class="form-group">
                            <input type="text"  name="name" class="form-control"  placeholder="Student Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="admissionNo" class="form-control"  placeholder="Admission No." required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="branch" class="form-control"  placeholder="Branch" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="semester" class="form-control"  placeholder="Semester" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add to database</button>
                    </form>
                  <!---------form ends------------------------>  
                </div>
                    
            </div> 
		</div>
        <!--------To Show entered record on the right------------------>		
            <div class="col-sm-6">
                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <b>Student in the Database</b>
                    </div> 
                <div class="panel-body">
                                    
                <ul class="list-group">
                <?php
                        $count=0;
                    foreach( $db->fetchData() as $item )
                    {      $count++;
                        ?>
                            <li class="list-group-item">
                                <a href= "./index.php?item=<?php echo $item->_id ?>">
                                    <?php echo $count.". ".$item->name ?>
                                </a>
                            </li>
                        <?php
                        
                    }

                ?>
               </ul> 
            </div>
            </div>
            </div>
        </div>

        <!------------------------------For Professor's details entry in database----------------------------> 
         <div class="container">
            <div class="col-sm-6">

                <div class=" panel panel-default" >
                    <div class="panel-heading">
                        <b>Add Professor's Details</b>
                    </div> 
                <div class="panel-body">
                    
                    <form action="./addData.php" method="POST">
                    
                        <div class="form-group">
                            <input type="text"  name="pname" class="form-control"  placeholder="Professor Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="id" class="form-control"  placeholder="Professor Id" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to database</button>
                    </form>
                </div>
                    
            </div> 
		</div>		
            <div class="col-sm-6">
                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <b>Professor's list in the Database</b>
                    </div> 
                <div class="panel-body">
                                    
                <ul class="list-group">
                <?php
                        $count=0;
                    foreach( $db1->fetchData() as $item1 )
                    {   $count++;
                        ?>
                            <li class="list-group-item">
                                <a href= "./index.php?item=<?php echo $item1->_id ?>">
                                    <?php echo $count.". ".$item1->pname ?>
                                </a>
                            </li>
                        <?php
                        
                    }

                ?>
               </ul> 
            </div>
            </div>
            </div>
        </div>
        

    </body>
</html>