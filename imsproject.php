<?php
include 'connectDB.php'
if mysqli = new mysqli
$query = "CREATE TABLE `f2fd`.`diseases` ( `id` INT(6) NOT NULL ,
                    `disease_name` VARCHAR(27) NOT NULL ,
                     `description` TEXT NOT NULL ,
                     PRIMARY KEY (`id`), UNIQUE (`disease_name`))
                      ENGINE = MyISAM";
include 'disconnectDB.php'
?>
