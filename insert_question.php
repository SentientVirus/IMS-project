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
   }?>
