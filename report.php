<?php
    require_once('./StudentResult.php');
    $db = new Student; //instance of the class
    //----- Finding the student details -------------------
    session_start();
    $student = $_SESSION['student'];
	foreach($db->fetchData() as $item){
        if($item->admissionNo == $student){
            $data=$item;
            break;
        }
        
    }
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

    <body style="text-align: left;background-color:white;">
    
        <nav class="navbar navbar-inverse" style=" background-color: #337ab7;border-color: #337ab7;border-radius: 0px;">
            <h2 style="color:white; display:inline-block;text-decoration:underline;">Your Report Card</h2>
            
            <a href="./index.php" style="color:white;display:inline-block;padding-left:950px;"><h4>Logout</h4></a>
                        
        </nav>
            <div class="col-sm-12" style="padding-right: 60px;padding-left: 54px;width: 120%;">
            <div class="box-body">

                <div class="row"> <!--  Row -->
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="row"> <!-- First Row -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sname">Name</label>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $data->name ?>             <!--------------------------Add from Php-------------------->                      
                                     </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="admnno">Admission No.</label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo $data->admissionNo ?>               <!-------------------------Add from php -------------------->
                                     </div>
                                </div> 

                            </div>
                            <div class="row"> <!-- Second Row -->
                                 <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="displine">Discipline</label>
                                </div>
                                </div> 
                                 <div class="col-md-6">
                                 <div class="form-group">
							          <?php echo $data->branch ?>	<!-------------------Add from php---------->						     
                                 </div>
                                 </div> 
                        
                                 <div class="col-md-2">
                                    <div class="form-group">
                                         <label for="semester">Semester</label>

                                    </div>
                                </div> 
                                <div class="col-md-2">
                                <div class="form-group">
                                  <?php echo $data->semester ?>                   <!---Add from php------------------------>             
                                </div>
                                 </div>
                </div>
                
                <hr>
<!------------------------------ Table for core and honour starts-------------------------------------------->      
            <?php  
                $algo= $data->algo*8;
                $co = $data->co*8;
                $toc = $data->toc*6;
                $maths = $data->maths*7;
                $eng = $data->eng*6;
                $tcp = $algo+$co+$toc+$maths+$eng;
                $grade = array(
                        10 => "A+",
                        9  => "A",
                        8  => "B+",
                        7  => "B",
                        6  => "C+",
                        5  => "C",
                        4  => "D+",
                        3  => "D",
                        2  => "E+",
                        1  => "E"
                );
                $gpa = $tcp/35;
                $gpa = floor($gpa*100)/100;
                $result = "PASS";
             ?>      
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <table class="table table-bordered table-striped" id="membook_tbl">
                                <thead>
                                   <tr>
                                     <td width="2%" align="center">Sr.No</td>
                                        <td width="30%">Name of the Subject</td>
                                        <td width="4%" align="center">Credit Hours</td>
                                         <td width="4%" align="center">Credit Points</td>
                                        <td width="3%" align="center">Grade</td>
                                       <td width="2%" align="center">Remarks</td>
                                    </tr>
                                </thead>
                                <tbody>
                                      <tr>
                                            <td align="center">1</td>
                                             <td>Algorithm Design and Analysis</td>
                                             <td align="center">8</td>
                                             <td align="center"><?php echo $algo ?></td>          <!--------Calculate from database------------------>
                                             <td align="center"><?php echo $grade[$data->algo] ?></td>          <!--------Calculate from Database------------------>
                                             <td align="center"><?php if($data->algo<5){ echo "FAIL"; $result ="FAIL"; } else echo"PASS"; ?></td>
                                    </tr>
                                        
                                     <tr>
                                             <td align="center">2</td>
                                             <td>Computer Organistion</td>
                                             <td align="center">8</td>
                                             <td align="center"><?php echo $co ?></td>
                                             <td align="center"><?php echo $grade[$data->co] ?></td>
                                             <td align="center"><?php if($data->co<5){ echo "FAIL"; $result ="FAIL"; } else echo"PASS"; ?></td>                                                                                
                                     </tr>
                                        
                                    <tr>
                                            <td align="center">8</td>
                                             <td>Theory of Computing</td>
                                             <td align="center">6</td>
                                             <td align="center"><?php echo $toc ?></td>
                                               <td align="center"><?php echo $grade[$data->toc] ?></td>
                                          <td align="center"><?php if($data->toc<5){ echo "FAIL"; $result ="FAIL"; } else echo"PASS"; ?></td>
                                         
                                        </tr>
                                        
                                         <tr>
                                            <td align="center">4</td>
                                             <td>Methods of Applied Mathematics</td>
                                             <td align="center">7</td>
                                             <td align="center"><?php echo $maths ?></td>
                                               <td align="center"><?php echo $grade[$data->maths] ?></td>
                                          <td align="center"><?php if($data->maths<5){ echo "FAIL"; $result ="FAIL"; } else echo"PASS"; ?></td>
                                         
                                        </tr>
                                        
                                           <tr>
                                            <td align="center">5</td>
                                             <td>English</td>
                                             <td align="center">6</td>
                                             <td align="center"><?php echo $eng ?></td>
                                               <td align="center"><?php echo $grade[$data->eng] ?></td>
                                          <td align="center"> <?php if($data->eng<5){ echo "FAIL"; $result ="FAIL"; } else echo"PASS"; ?></td>
                                         
                                        </tr>                                                                                                                 

                                </tbody>
                               <tbody><tr>
                                    <th></th>
                                     <th style="text-align:center">Result: <?php echo $result ?></th>
                                    <th style="text-align:center">35</th>
                                    <th style="text-align:center"><?php echo $tcp ?></th>
                                    <th colspan="2" style="text-align:center">GPA:<?php echo $gpa ?></th>
                                   
                                    
                               </tr>
                            </tbody></table>

                        </div>
                    </div>
                </div>
                </div>
    </body>
    </html>    