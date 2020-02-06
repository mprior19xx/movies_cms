<?php

include_once('../config/database.php');
include_once('../config/database_old.php');

$start = microtime(true);

# the new way
$database = Database::getInstance()->getConnection();
$i = 0;
while($i<100){
    $new_time = microtime(true) - $start;
    $i++;
}

$new_time = microtime(true) - $start;

$start = microtime(true);
$i = 0;
while($i<100){
    $database_old = new Database_Old();
    $database_connection = $database_old->getConnection();
    $i++;
}
$old_time = microtime(true) - $start;

printf('New Connection takes ==> %s ms'.PHP_EOL, $new_time*1000);
printf('<br>Old Connection takes ==> %s ms'.PHP_EOL, $old_time*1000);
printf('<br>You saved ==> %s ms'.PHP_EOL, ($old_time - $new_time)*1000);
printf('<br>New connection only takes %s%% of old connection'.PHP_EOL, ($new_time/$old_time)*100);