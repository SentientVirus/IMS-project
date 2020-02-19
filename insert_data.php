<?php
include("connectDB.php");

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
mysqli_query($link, $sql);

    //--------------------------------------------------------
    //----------- insert into the Traits table ---------------
    //--------------------------------------------------------
    $sql = "Insert into Traits (id, question)
        values
        (1,'Recently, are you in poor appetite or overeating?'),
        (2,'On leisure time, do you go to sports club or gym?'),
        (3,'Is your workplace very noisy?'),
        (4,'Is your workplace very hot?'),
        (5,'Is particulate air pollution (pm2.5) a problem in your city or living area?'),
        (6,'Have you noticed your change of speed in moving or speaking?'),
        (7,'Have you had any physical exercise in last 4 weeks?'),
        (8,'Have you felt pain in your back or shoulder in last month?'),
        (9,'Have you experienced stomach or abdominal pain in last month?'),
        (10,'Have you ever experienced tinnitus?'),
        (11,'Have you ever experienced frequent headache over a month or do you have migraine?'),
        (12,'Frequently exposed to LOUD MUSIC?'),
        (13,'Do you usually drive faster than motorway speed limit?'),
        (14,'Do you suffer from chest pain from time to time?'),
        (15,'Do you smoke currently?'),
        (16,'Do you prefer semi-skimmed milk than other types of milk?'),
        (17,'Do you own your housing?'),
        (18,'Do you own vehicles?'),
        (19,'Do you live alone?'),
        (20,'Do you intake vitamin or mineral supplements as routine?'),
        (21,'Do you have trouble falling asleep, or sleeping more than 10h/day?'),
        (22,'Do you have siblings who has ever been diagnosised depression?'),
        (23,'Do you have long-term diseases in digestive system?'),
        (24,'Do you have hearing difficulties or problems?'),
        (25,'Do you have fresh fruit intake everyday?'),
        (26,'Do you have frequent mood swings?'),
        (27,'Do you have extrodinary poor eye sight or other eye problems?'),
        (28,'Do you have any mouth or teeth dental problems?'),
        (29,'Do you have a Bachelar Degree or equivalent?'),
        (30,'Do you frequently use solarium or sunlamp?'),
        (31,'Do you feel hated by family member as a child?'),
        (32,'Do you drink alcohol from time to time?'),
        (33,'Do you consider walking a pleasure?'),
        (34,'Are you satisfied with your own health?'),
        (35,'Are you now used to getting up early in morning?'),
        (36,'Are you employed now?'),
        (37,'Always worry too long after embarrassment?');";

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
         (1, 1, 0.5093),
         (2, 1, -0.3118),
         (3, 1, 0.312),
         (4, 1, 0.3374),
         (5, 1, 0.3815),
         (6, 1, 0.7527),
         (7, 1, -0.3158),
         (8, 1, 0.5314),
         (9, 1, 0.6481),
         (10, 1, 0.3589),
         (11, 1, 0.4979),
         (12, 1, 0.2871),
         (13, 1, -0.1604),
         (14, 1, 0.4847),
         (15, 1, 0.4962),
         (16, 1, -0.2846),
         (17, 1, -0.1806),
         (18, 1, -0.2567),
         (19, 1, 0.6287),
         (20, 1, -0.2037),
         (21, 1, 0.5735),
         (22, 1, 0.6651),
         (23, 1, 0.523),
         (24, 1, 0.2892),
         (25, 1, -0.1678),
         (26, 1, 0.7014),
         (27, 1, 0.4118),
         (28, 1, 0.2635),
         (29, 1, -0.1579),
         (30, 1, 0.26),
         (31, 1, 0.4372),
         (32, 1, 0.707),
         (33, 1, -0.4807),
         (34, 1, -0.5543),
         (35, 1, -0.2834),
         (36, 1, -0.2438),
         (37, 1, 0.3648);";

      if ($link->query($sql) === TRUE) {
          echo "<br>Data: Correlations inserted successfully";
      } else {
          echo "<br>Error inserting Correlations data " . $link->error;
include("disconnectDB.php");
}?>
