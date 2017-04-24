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

	 <?php
	    ini_set('display_errors', 1); //skriver ut felmedelande
	    
	    // Kopplar till vår databas
	    $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 

	    // All information from the patient in the form
        $p_name = $_GET["name"];
	    $p_age = $_GET["age"];
	    $p_gender = $_GET["gender"];
	    $p_issueid = $_GET["issue"];
	    $p_prio = $_GET["prio"];
        $p_arrival = $_GET["arrival"];
        $p_id = $_GET["patientid"];
        $p_atime = date("Y-m-d h:i:s");


         //Lägger in patienten i databasen
        $sql = "INSERT INTO Patient VALUES('$p_name', $p_age, $p_id, NULL, $p_prio, '$p_atime', '$p_arrival', NULL, $p_issueid, '$p_gender');";
        $insert = pg_query($dbconn, $sql);

    ?>

    <form action="nurse3.php" method="get">

    	<div class="container">
      			<h2>Available Queues for your patients issues:</h2>

      			     <?php
      			       ini_set('display_errors', 1);
                        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 
                        $queueQuery = "SELECT queue.patientid, priority, position, t.teamID, patient.name from patient, queue, (SELECT teamID from Treats where issueid1 = $p_issueid or issueid2 = $p_issueid or issueid3 = $p_issueid) as t where queue.teamid = t.teamid and queue.patientid = patient.patientid;";
                        $res = pg_query($dbconn, $queueQuery);     
                    
                        while($r = pg_fetch_array($res, null, PGSQL_ASSOC)){
                            if ("".$r['position']."" == "1"){
                                echo "<br>";
                                echo "<h4>Queue for team: " .$r['teamid']."</h4>";
                            }
                            echo  "<p> <strong>Name:</strong> ".$r['name']. " <strong>ID:</strong> " .$r['patientid']. " <strong>Priority:</strong> " .$r['priority']. " <strong>Position:</strong> " .$r['position']."</p>";
                        }
                    ?>
                     <br>

                <div class="form-group">
                <label>Select patient:</label>
                     <select class="form-control" id="sel1" name="patientid">
                    <?php 
                        $p_name = $_GET["name"];
                        echo "<option value='$p_id'>$p_name</label>";
                    ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Select queue:</label>
                    <select class="form-control" id="sel1" name="teamid">
                        <?php
                        	$dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 
                        	$sql = "SELECT teamID from Treats where issueid1 = $p_issueid or issueid2 = $p_issueid or issueid3 = $p_issueid;";
                            $res = pg_query($dbconn, $sql);
                                while($row = pg_fetch_array($res, null, PGSQL_ASSOC)){
                                    echo"<option value='".$row['teamid']."'>".$row['teamid']."</option>";}
                        ?>
                  </select>
                </div>

                <input class="btn btn-info"  role="button" type ="submit">
    </form>


</div>
</body>
</html>