
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

        <form action="doctor3.php" method="get">
            <div class="container">
            
                <div class="form-group">
                <label for="sel1">Select patient:</label>
                  <select class="form-control" id="sel1" name="patient">

                    <?php
                      ini_set('display_errors', 1); //skriver ut felmedelande
                        
                        // Kopplar till vår databas
                        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 
                        $p_team = $_GET["team"];

                        $sql = "SELECT * from queue, patient WHERE queue.teamid = $p_team and patient.patientid = queue.patientid;";
                        $res = pg_query($dbconn, $sql);
                        while($row = pg_fetch_array($res, null, PGSQL_ASSOC)){
                            echo"<option value='".$row['patientid']."' name='patientid'>Name: ".$row['name']. ", Personal Nr: " .$row['patientid']."</option>";}
                  ?>
                  </select>
            <input class="btn btn-info"  role="button" type ="submit">

            </div>
        </form>
        </main>
    </body>
</html>