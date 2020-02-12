<<<<<<< HEAD
<?php
include("connectDB.php");

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
mysqli_query($link, $sql);
$sql = "Insert into Traits (id, question)
    values
    (1,'Have you ever been diagnosed for mental health?'),
    (2,'Do you feel worried, tensed, felt anxious for  a long time?'),
    (3,'Have you ever come across fed up situations?'),
    (4,'Do you face trouble during sleeping or falling asleep?'),
    (5,'Do you have any eye related problems?'),
    (6,'Do you have frequent headaches?'),
    (7,'Have you ever experienced pain in throat or Chest ?'),
    (8,'Do you face trouble during walking?'),
    (9,'Do you problem listening to high range of sounds?'),
    (10,'Do you have siblings?'),
    (11,'Have you recently subjected to fractures (say like in past 5 years)'),
    (12,'Do you smoke?'),
    (13,'Do you have a habit of tea intake?'),
    (14,'Do you have diabetes?'),
    (15,'Do you usually intake Vitamin, Mineral supplements?'),
    (16,'Do you have any mouth problems?'),
    (17,'Do you face trouble waking up in mornings?'),
    (18,'Do you experience any trouble in doing  physical exercises for last 4 weeks?'),
    (19,'Do you intake alcohol frequently?');";

   if ($link->query($sql) === TRUE) {
       echo "<br>Data inserted successfully";
   } else {
       echo "<br>Error inserting data " . $link->error;
   }
?>
//--------------------------------------------------------
//----------- insert into the Diseases table ---------------
//--------------------------------------------------------
$sql = "Insert into Diseases (id, disease_name, description)
values
(1, 'Depression', 'You get depressive if you get this disease');";

if ($link->query($sql) === TRUE) {
    echo "<br>Data: Diseases inserted successfully";
} else {
    echo "<br>Error inserting Diseases data " . $link->error;}


?>

<?php
//--------------------------------------------------------
//----------- insert into the Correlations table ---------------
//--------------------------------------------------------
$sql = "Insert into Correlations (trait_id, disease_id, rg)
values
(1, 1, 0.9716),
(2, 1, 0.6884),
(3, 1, 0.6523),
(4, 1, 0.5735),
(5, 1, 0.4118),
(6, 1, 0.3979),
(7, 1, 0.4097),
(8, 1, 0.3626),
(9, 1, 0.2871),
(10, 1, 0.2422),
(11, 1, 0.2197),
(12, 1, 0.1857),
(13, 1, 0.164),
(14, 1, 0.1492),
(15, 1, 0.2037),
(16, 1, 0.2635),
(17, 1, 0.2834),
(18, 1, 0.3158),
(19, 1, 0.3697);";

if ($link->query($sql) === TRUE) {
    echo "<br>Data: Correlations inserted successfully";
} else {
    echo "<br>Error inserting Correlations data " . $link->error;
  }

 include("disconnectDB.php")
 ?>
=======
<?php
include("connectDB.php");

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
mysqli_query($link, $sql);

    //--------------------------------------------------------
    //----------- insert into the Traits table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Traits (id, question)
        values
        (1,'Have you ever been diagnosed for mental diseases?'),
        (2,'Have you ever felt worried, anxious for a long time?'),
        (3,'Have you ever experienced burnt out?'),
        (4,'Do you have trouble falling asleep frequently?'),
        (5,'Do you have any eye-related problems?'),
        (6,'Do you have frequent headaches?'),
        (7,'Have you ever experienced pain in throat or chest?'),
        (8,'Do you feel pain in leg after 10 minutes walk?'),
        (9,'Are you frequently exposed to high volume music?'),
        (10,'Do you have siblings?'),
        (11,'Have you broken your bone in past 5 years?'),
        (12,'Have you smoked?'),
        (13,'Do you have a habit of drinking tea?'),
        (14,'Do you have diabetes?'),
        (15,'Do you usually intake Vitamin, Mineral supplements?'),
        (16,'Do you have any teeth problems?'),
        (17,'Do you usually get up early?'),
        (18,'Do you have regular physical exercises?'),
        (19,'Do you drink alcohol from time to time?');";

       if ($link->query($sql) === TRUE) {
           echo "<br>Data: Traits inserted successfully";
       } else {
           echo "<br>Error inserting Traits data " . $link->error;}

    //--------------------------------------------------------
    //----------- insert into the Diseases table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Diseases (id, disease_name, description)
         values
         (1, 'Depression', 'You get depressed if you get this disease');";

       if ($link->query($sql) === TRUE) {
           echo "<br>Data: Diseases inserted successfully";
       } else {
           echo "<br>Error inserting Diseases data " . $link->error;}

    //--------------------------------------------------------
    //----------- insert into the Correlations table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Correlations (trait_id, disease_id, rg)
         values
         (1, 1, 0.9716),
         (2, 1, 0.6884),
         (3, 1, 0.6523),
         (4, 1, 0.5735),
         (5, 1, 0.4118),
         (6, 1, 0.3979),
         (7, 1, 0.4097),
         (8, 1, 0.3626),
         (9, 1, 0.2871),
         (10, 1, 0.2422),
         (11, 1, 0.2197),
         (12, 1, 0.1857),
         (13, 1, 0.164),
         (14, 1, 0.1492),
         (15, 1, 0.2037),
         (16, 1, 0.2635),
         (17, 1, 0.2834),
         (18, 1, 0.3158),
         (19, 1, 0.3697);";

      if ($link->query($sql) === TRUE) {
          echo "<br>Data: Correlations inserted successfully";
      } else {
          echo "<br>Error inserting Correlations data " . $link->error;
include("disconnectDB.php");
}?>
>>>>>>> 5f66c3990f97055105452836db3583dee6098109
