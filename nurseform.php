
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

        <main>
        <div class="container">
            <!-- Form for enter a patient  -->
            <h3>Enter Patient's info</h3>

            <form action="nurse2.php" method="get">
                <div class="form-group">
                  <label for="usr">Name:</label>
                  <!-- Namninputten  -->
                  <input type="text" class="form-control" id="usr" name="name">
                  
                </div>

                   <div class="form-group">
                  <label for="usr">Personal ID:</label>
                  <!-- Namninputten  -->
                    <input type="number" min="0" max="9999999999999" name="patientid">
                  
                </div>

                <div class="form-group">
                    <label for="pwd">Age:</label>
                    <input type="number" min="0" max="200" name="age">
                    
                </div>

                <div class="form-group">
                    <label for="pwd">Gender: </label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Other">Other</label>
                </div>

                <div class="form-group">
                    <label for="sel1">Select Medical Issue:</label>
                  <select class="form-control" id="sel1" name="issue">

                  <?php
                      ini_set('display_errors', 1); //skriver ut felmedelande
                        
                        // Kopplar till vår databas
                        $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error()); 

                        $sql = "SELECT * from MedicalIssue;";
                        $res = pg_query($dbconn, $sql);
                        while($row = pg_fetch_array($res, null, PGSQL_ASSOC)){
                            echo"<option value='".$row['issueid']."' name='issue'>".$row['issuename']."</option>";}
                  ?>


                  </select>
                </div>

                <div class="form-group">
                    <label for="sel1">Priority:</label>
                    <label class="radio-inline"><input type="radio" name="prio" value="1">1</label>
                    <label class="radio-inline"><input type="radio" name="prio" value="2">2</label>
                    <label class="radio-inline"><input type="radio" name="prio" value="3">3</label>                
                    <label class="radio-inline"><input type="radio" name="prio" value="4">4</label>
                    <label class="radio-inline"><input type="radio" name="prio" value="5">5</label>
                 </div>

                  <div class="form-group">
                    <label for="sel1">Arrival:</label>
                    <label class="radio-inline"><input type="radio" name="arrival" value="Ambulance">By Ambulance</label>
                    <label class="radio-inline"><input type="radio" name="arrival" value="On their own">On their own</label>
                 </div>

                <input class="btn btn-info"  role="button" type ="submit">
            </form>
        </main>
        </div>
    </div>
    </body>
</html>