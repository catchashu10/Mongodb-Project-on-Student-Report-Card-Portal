<?php
    require_once('./StudentResult.php');
    $db = new Student; //instance of the class
    $db1 = new Professor;
    session_start();
    $id = $_SESSION['prof'];
	foreach($db1->fetchData() as $item){
        if($item->id == $id){
            $data=$item;
            break;
        }
        
    }
?>
        <?php 
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    foreach($db->fetchData() as $item){
                            $adm= $item->admissionNo;
                            $co= "co".$adm;  $algo= "algo".$adm; $toc= "toc".$adm; $maths= "maths".$adm; $eng= "eng".$adm;
                            $coc= "cocgpa".$adm;  $algoc= "algocgpa".$adm; $tocc= "toccgpa".$adm; $mathsc= "mathscgpa".$adm; $engc= "engcgpa".$adm;

                        if( isset( $_POST[$co] ) ){
                            $val= $_POST[$coc];
                            $db->updateData($adm, 'co', $val);
                        }
                        if( isset( $_POST[$algo] ) ){
                            $val= $_POST[$algoc];
                            $db->updateData($adm, 'algo',$val);
                        }
                        if( isset( $_POST[$toc] ) ){
                            $val= $_POST[$tocc];
                            $db->updateData($adm, 'toc', $val);
                        }
                        if( isset( $_POST[$maths] ) ){
                            $val= $_POST[$mathsc];
                            $db->updateData($adm, 'maths', $val);
                        }
                        if( isset( $_POST[$eng] ) ){
                            $val= $_POST[$engc];
                            $db->updateData($adm, 'eng', $val);
                        }
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
            <h2 style="color:white; display:inline-block;text-decoration:underline;">Student Result Entry</h2>
            <a href="./index.php" style="color:white;display:inline-block;padding-left:920px;"><h4>Logout</h4></a>
                        
        </nav>
        <div class="container">
             <div class="container">
                            <h1 style="text-decoration:underline;margin-top:20px;margin-bottom: 10px;text-align:center;">Welcome</h1>
                            
                        </div>
        </div>
         <div class="container">
                        <div class="container">
                            <h3 style="margin-bottom: 30px;text-align:center;">Mr. <?php echo $data->pname ?></h3>
                            
                        </div>
            </div>
        <div class="col-sm-12">
        <form class="form-horizontal" action="./treport.php" method="post">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead >
                <th>Sl.no</th>
                <th>Name</th>
                <th>Admission No.</th>
                <th>Computer Organization</th>
                <th>Algorithms</th>
                <th>Theory Of Computing</th>
                <th>Maths</th>
                <th>English</th>
            </thead>
            <tbody>
        <?php
            $count=0;
            foreach( $db->fetchData() as $item ){
                $count++;
                ?>
                    <tr>
                        <td><div style="width:2em"><?php echo $count?></div></td>
                        <td ><div style="width:7em"><?php echo $item->name ?></div></td>
                        <td><div style="width:7em"><?php echo $item->admissionNo ?></div></td>
                        <td><div style="width:8em"><input type="number" name="<?php echo "cocgpa".$item->admissionNo ?>" min="1" max="10" style="width:5em;display: inline-block;" class="form-control" value="<?php echo $item->co?>"/>
                        <button type="submit" name="<?php echo "co".$item->admissionNo ?>" class="btn-primary btn-xs">Submit</button>
                        </div></td>
                        <td><div style="width:8em"><input type="number" name="<?php echo "algocgpa".$item->admissionNo ?>" min="1" max="10" style="width:5em;display: inline-block;" class="form-control" value="<?php echo $item->algo?>"/>
                        <button type="submit" name="<?php echo "algo".$item->admissionNo ?>" class="btn-primary btn-xs">Submit</button>
                        </div></td>
                        <td><div style="width:8em"><input type="number" name="<?php echo "toccgpa".$item->admissionNo ?>" min="1" max="10" style="width:5em;display: inline-block;" class="form-control" value="<?php echo $item->toc?>"/>
                        <button type="submit" name="<?php echo "toc".$item->admissionNo ?>" class="btn-primary btn-xs" >Submit</button>
                        </div></td>
                        <td><div style="width:8em"><input type="number" name="<?php echo "mathscgpa".$item->admissionNo ?>" min="1" max="10" style="width:5em;display: inline-block;" class="form-control" value="<?php echo $item->maths?>"/>
                        <button type="submit" name="<?php echo "maths".$item->admissionNo ?>" class="btn-primary btn-xs" >Submit</button>
                        </div></td>
                        <td><div style="width:8em"><input type="number" name="<?php echo "engcgpa".$item->admissionNo ?>" min="1" max="10" style="width:5em;display: inline-block;" class="form-control" value="<?php echo $item->eng?>"/>
                        <button type="submit" name="<?php echo "eng".$item->admissionNo ?>" class="btn-primary btn-xs" >Submit</button>
                        </div></td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</form>
</div>
                
    </body>
</html>