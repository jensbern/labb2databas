
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
    <main>
    <div class="container">

         <?php 
            ini_set('display_errors', 1); //skriver ut felmedelande
            $dbconn = pg_connect("host=localhost port=5432 dbname=labb2") or die('Could not connect: ' . pg_last_error());

            //All information om patienten som behövs
            $p_id = $_GET["patient"];
            $p_proc1 = $_GET["proc1"];
            $p_proc2 = $_GET["proc2"];
            $p_proc3 = $_GET["proc3"];
            $p_drug1 = $_GET["drug1"];
            $p_drug2 = $_GET["drug2"];
            $p_drug3 = $_GET["drug3"];
            $p_after = $_GET["optradio"];

            //uppdatera patient med "Home" eller "Hospital"
            $a_sql = "UPDATE Patient SET aftertreat = '$p_after' WHERE patientid = $p_id;"; 
            $after_sql = pg_query($dbconn, $a_sql); 

            //Ta bort patienten ur queue
            $q_sql = "DELETE FROM queue WHERE patientid = $p_id;"; 
            $queue_sql = pg_query($dbconn, $q_sql); 
            
            //lägga in informationen om droger i drugstaken
            $d_sql = "INSERT INTO drugstaken VALUES($p_id, $p_drug1, $p_drug2, $p_drug3);"; 
            $drugtaken_sql = pg_query($dbconn, $d_sql); 

            //resterande variabler om patienten

            $all_info = "SELECT * FROM patient WHERE patientid = $p_id;";
            $info = pg_query($dbconn, $all_info);

            $p_age = 0;
            $p_gender = "";
            $p_name = "";
            $p_issue = 0;
            $p_wait = 0;
            $p_date = "";
            while($r = pg_fetch_array($info, null, PGSQL_ASSOC)){
                $p_age += "".$r['age']."";
                $p_gender = "".$r['gender']."";
                $p_name = "".$r['name']."";
                $p_issue += "".$r['issueid']."";
                $p_wait += "".$r['queuetime']."";
                $p_date = "".$r['arrivaltime']."";
            };  

            $n_issue = "";
            $issue_sql = "SELECT issuename FROM Medicalissue WHERE issueid = $p_issue;";
            $issuee = pg_query($dbconn, $issue_sql);
            while($r = pg_fetch_array($issuee, null, PGSQL_ASSOC)){
                $n_issue = "".$r['issuename']."";
            };          

            //procedures
            $total_price = 0;
            $n_proc1 = "";
            if ($p_proc1 != NULL){
                $sql = "SELECT cost, procedurename FROM procedure WHERE procedureid = '$p_proc1';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_proc1 = "".$r['procedurename']."";
                };
            };
            $n_proc2 = "";
            if ($p_proc2 != NULL){
                $sql = "SELECT cost, procedurename FROM procedure WHERE procedureid = '$p_proc2';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_proc2 = "".$r['procedurename']."";
                };
            };  
            $n_proc3 = "";
            if ($p_proc3 != NULL){
                $sql = "SELECT cost, procedurename FROM procedure WHERE procedureid = '$p_proc3';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_proc3 = "".$r['procedurename']."";
                };
            };

            //droger
            $n_drug1 = "";
                if ($p_drug1 != NULL){
                $sql = "SELECT cost, drugname FROM drug WHERE drugid = '$p_drug1';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_drug1 = "".$r['drugname']."";
                };
            };
            $n_drug2 ="";
            if ($p_drug2 != NULL){
                $sql = "SELECT cost, drugname FROM drug WHERE drugid = '$p_drug2';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_drug2 = "".$r['drugname']."";
                };
            };  
            $n_drug3 = "";
            if ($p_drug3 != NULL){
                $sql = "SELECT cost, drugname FROM drug WHERE drugid = '$p_drug3';";
                $psql = pg_query($dbconn, $sql);
                while($r = pg_fetch_array($psql, null, PGSQL_ASSOC)){
                    $total_price += "".$r['cost']."";
                    $n_drug3 = "".$r['drugname']."";
                };
            };


            //lägga in all information om patienten i patientlog
            $d_sql = "INSERT INTO patientlog VALUES($p_id, '$p_name', '$p_gender', $p_age, '$n_drug1', '$n_drug2', '$n_drug3', '$n_proc1','$n_proc2','$n_proc3', $total_price, '$p_after', '$n_issue', '$p_date', $p_wait);"; 
            $drugtaken_sql = pg_query($dbconn, $d_sql); 

            //Skriver ut patient loggen
            echo"<h1>Patients Log</h1>";
            echo "<hr>";
            echo"<h3>Basic Info:</h3>";
            echo"<p><strong>Name: </strong>$p_name</p>";
            echo"<p><strong>Personal Number: </strong>$p_id</p>";
            echo"<p><strong>Age: </strong>$p_age</p>";
            echo"<p><strong>Gender: </strong>$p_gender</p>";

            echo "<hr>";
            echo"<h3>Medical info:</h3>";
            echo"<p><strong>Issue: </strong>$n_issue</p>";
            echo"<p><strong>Arrival time: </strong>$p_date</p>";
            echo"<p><strong>Waited for: </strong>$p_wait minutes</p>";

            echo "<hr>";
            echo"<h3>Treatment info:</h3>";
            echo"<p><strong>Procedures: </strong></p>";
              if ($n_proc1 != NULL){
                echo"<p>$n_proc1</p>";
            };
              if ($n_proc2 != NULL){
                echo"<p>$n_proc2</p>";
            };
              if ($n_proc3 != NULL){
                echo"<p>$n_proc3</p>";
            };

            echo "<br>";
            echo"<p><strong>Drugs: </strong></p>";
            if ($n_drug1 != NULL){
                echo"<p>$n_drug1</p>";
            };
              if ($n_drug2 != NULL){
                echo"<p>$n_drug2</p>";
            };
              if ($n_drug3 != NULL){
                echo"<p>$n_drug3</p>";
            };

            echo "<hr>";
            echo"<p><strong>Total Price: </strong>$total_price kronor</p>";
           
        ?>
        </div>
    </main>
</body>
</html>