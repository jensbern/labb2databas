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
                    <a class="btn btn-default" href="index.php">
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
    <div class="container">

        <?php
         // Kopplar till vår databas
        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 

        //All info om patienten
        $p_id = $_GET["patientid"];
        $p_team = $_GET["teamid"];

        //Lägger in teamet i patienten
        $usql = "UPDATE Patient SET teamid = $p_team WHERE patientid = $p_id;"; 
        $res = pg_query($dbconn, $usql); 

        //Hämta alla patienter som står i samma teams kö
        $queue = "SELECT queue.priority FROM queue, patient WHERE patient.patientid=$p_id and queue.teamid=$p_team and queue.priority>=patient.priority;";
        $res2 = pg_query($dbconn, $queue); 

        //Räkna ut tiden för patienten
        $w_time = 0;
        while($r = pg_fetch_array($res2, null, PGSQL_ASSOC)){
            $w_time += "".$r['priority'].""*10;
         
        };          

        //Lägger in vänttid
        $qsql = "UPDATE Patient SET queuetime = $w_time WHERE patientid = $p_id;"; 
        $uwaitsql = pg_query($dbconn, $qsql); 

        echo "<h3> Your patient has successfully been added in the queue for team $p_team!</h3>";
        echo "<h5> The waiting time for your patient is: $w_time min </h5>";

        //Lägg till patienten i kön
        $sql_prio = "SELECT priority FROM patient WHERE patientid = $p_id;";
        $res3 = pg_query($dbconn, $sql_prio);

        $p_prio = 0;
        while($r = pg_fetch_array($res3, null, PGSQL_ASSOC)){
           $p_prio += "".$r['priority']."";
        };  

        $insert_queue = "INSERT INTO queue VALUES($p_id, $p_team, $p_prio);";  
        $insert = pg_query($dbconn, $insert_queue); 
        ?>

  
    </div>

</body>
</html>

