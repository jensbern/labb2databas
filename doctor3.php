
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Senaste jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <!-- Senaste Bootsrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Senaste Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" type ="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Asap|Signika:400,700" rel="stylesheet">
        <title>Doctor Form</title>
    </head>
    <body>
        <header>
            <div class="container">
                  <h3 class="formshead">
                    <a class="btn btn-default" href="index.php">
                        <span class="glyphicon glyphicon-home" aria-hidden="true">
                        </span>
                    </a>
                    Emergency Room Automation
                    <span class="besideheader">
                        Doctor/Teamleader Form
                    </span>
                </h3>
            </div>
        </header>

        <form action="doctor4.php" method="get">
            <div class="container">

               <div class="form-group">
                <label>Your selected patient:</label>
                        <select class="form-control" id="sel1" name="patient">

            <?php
                ini_set('display_errors', 1); //skriver ut felmedelande
                $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());

                 $p_id = $_GET["patient"];

                $sql = "SELECT name, issueid FROM patient WHERE patientid = $p_id;";
                $res = pg_query($dbconn, $sql);

                while($r = pg_fetch_array($res, null, PGSQL_ASSOC)){
                 echo"<option value='$p_id'>Name:".$r['name'].", Personal nr: $p_id</option>"; 
                }; 
            ?>
            </select>
            </div>
    
    <!-- PROCEDURES  -->
            
        <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select procedure nr 1:</label>
                        <select class="form-control" id="sel1" name="proc1">

              <?php 
                    ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());
                    $p_id = $_GET["patient"];

                    $procsql = "SELECT procedurename, procedureid FROM patient, Treatment, procedure WHERE patient.patientid = $p_id and patient.issueid = treatment.issueid and procedureid = procedureid1";
                     $res3 = pg_query($dbconn, $procsql);

                    echo "<option value='NULL'>Select procedure</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['procedureid']."'>".$r['procedurename']."</option>";
                     };
                ?>

                </select>
                </div>
                </div>


                    <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select procedure nr 2:</label>
                        <select class="form-control" id="sel1" name="proc2">

              <?php 
                    ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());
                    $p_id = $_GET["patient"];

                    $procsql = "SELECT procedurename, procedureid FROM patient, Treatment, procedure WHERE patient.patientid = $p_id and patient.issueid = treatment.issueid and procedureid = procedureid2";
                     $res3 = pg_query($dbconn, $procsql);

                    echo "<option value='NULL'>Select procedure</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['procedureid']."'>".$r['procedurename']."</option>";
                     };
                ?>

                </select>
                </div>
                </div>


                    <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select procedure nr 4:</label>
                        <select class="form-control" id="sel1" name="proc3">

              <?php 
                    ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());
                    $p_id = $_GET["patient"];

                    $procsql = "SELECT procedurename, procedureid FROM patient, Treatment, procedure WHERE patient.patientid = $p_id and patient.issueid = treatment.issueid and procedureid = procedureid3";
                     $res3 = pg_query($dbconn, $procsql);

                    echo "<option value='NULL'>Select procedure</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['procedureid']."'>".$r['procedurename']."</option>";
                     };
                ?>

                </select>
                </div>
                </div>


<!-- DRUGS  -->
                <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select drug nr 1:</label>
                        <select class="form-control" id="sel1" name="drug1">
                
                 <?php 
                   ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());

                    $drugs = "SELECT drugid, drugname FROM drug;";
                    $res3 = pg_query($dbconn, $drugs);

                    echo "<option value='NULL'>Select drug</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['drugid']."'>".$r['drugname']."</option>";
                     };
                ?>

                </select>
                </div>
                </div>

                <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select drug nr 2:</label>
                        <select class="form-control" id="sel1" name="drug2">
                
                 <?php 
                   ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());

                    $drugs = "SELECT drugid, drugname FROM drug;";
                    $res3 = pg_query($dbconn, $drugs);

                    echo "<option value='NULL'>Select drug</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['drugid']."'>".$r['drugname']."</option>";
                     };
                ?>

                </select>
                </div>
                </div>

                <div class = "col-md-4">
                <div class="form-group">
               
                <label>Select drug nr 3:</label>
                        <select class="form-control" id="sel1" name="drug3">
                
                 <?php 
                   ini_set('display_errors', 1); //skriver ut felmedelande
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());

                    $drugs = "SELECT drugid, drugname FROM drug;";
                    $res3 = pg_query($dbconn, $drugs);

                    echo "<option value='NULL'>Select drug</option>";
                     while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
                         echo"<option value='".$r['drugid']."'>".$r['drugname']."</option>";
                     };
                ?>

                </select>
                </div>
            </div>
            </div>

<!-- Sent home or not -->

            <div class="container">
            <div class="form-group">
                <label for="sel1">The patient will now..</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="Home">Home</label>
                <label class="radio-inline"><input type="radio" name="optradio" value=Hospital"">Hospital</label>
             </div>
            
            <input class="btn btn-info"  role="button" type ="submit">

            </div>
        </form>
        </main>
    </body>
</html>