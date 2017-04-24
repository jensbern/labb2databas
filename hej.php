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
        <title>Nurse Form</title>
    </head>
 <body>
        <header>
          <div class="container">
                <h3 class="formshead">
                    <a class="btn btn-default" href="startsida.html">
                        <span class="glyphicon glyphicon-home" aria-hidden="true">
                        </span>
                    </a>
                    Emergency Room Automation
                    <span class="besideheader">
                        Nurse Form
                    </span>
                </h3>
                </div>
        </header>
     <!--?php
        ini_set('display_errors', 1); //skriver ut felmedelande
        
        // Kopplar till vår databas
        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 

        //while($row = pg_fetch_array($res, null, PGSQL_ASSOC)){
        //    print_r ($row);
        //    echo "<br />";
        //}

        // All information from the patient in the form
        $p_name = $_GET["name"];
        $p_age = $_GET["age"];
        $p_gender = $_GET["gender"];
        $p_issueid = $_GET["issue"];
        $p_prio = $_GET["prio"];

        echo $p_name;
        echo $p_age;
        echo $p_gender;
        echo $p_issueid;
        echo $p_prio;
        echo date("Y-m-d h:i:s");
    ?-->

    <!--div class="container">
            <h2>Available Queues for your patients issues:</h2>
                 <?php
                 //ini_set('display_errors', 1); //skriver ut felmedelande
        
                    /*$dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 
                    $teams = "SELECT teamID from Treats where issueid1 = $p_issueid or issueid2 = $p_issueid or issueid3 = $p_issueid;";
                    $teamArray = array();
                    $res = pg_query($dbconn, $teams);   */     
                    //while($team = pg_fetch_array($res, null, PGSQL_ASSOC)){
                    //  array_push($teamArray, $team);
                    //}
                    //foreach ($teamArray as $t ) {
                            
                        }
                        //$queueQuery = "SELECT queue.patientid, priority, position from patient, queue where queue.teamid = $t and queue.patientid = patient.patientid;"
                        //$queues = pg_query($dbconn, $queueQuery );
                        //while($queue = pg_fetch_array($queues ,null, PGSQL_ASSOC)){
                        //      echo "hejsan";
                        //}
                        
                    } 

                ?>

            <div class="form-group">
                <label for="sel1">Select a team's queue for your patient:</label>
                <select class="form-control" id="sel1">

                <?php/*
                    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 
                    $sql = "SELECT teamID from Treats where issueid1 = $p_issueid or issueid2 = $p_issueid or issueid3 = $p_issueid;";
                    $res = pg_query($dbconn, $sql);
                        while($row = pg_fetch_array($res, null, PGSQL_ASSOC)){
                            echo"<option value='".$row['teamid']."' name='teamid'>".$row['teamid']."</option>";}*/
                ?>
              </select>
            </div>
            <a href="#" class="btn btn-info" role="button">Select this team's queue for your patient</a>
            <hr>
            <h4> Your patient will have to wait in the queue for: 40 minutes </h4-->
</div>
</body>
</html>