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
        ini_set('display_errors', 1); //skriver ut felmedelande
         // Kopplar till vår databas
        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 

        //All info om patienten
        $p_id = $_GET["patientid"];
        $p_team = $_GET["teamid"];

        $usql = ()

        echo $p_id;
        //afterTreat är det enda som ej finns med, NULL nu.

        echo "<h3> Your patient has successfully been added in the queue for team $p_team!</h3>";
        echo "<h5> The waiting time for your patient is: BLA </h5>";
        ?>

  
    </div>

</body>
</html>

