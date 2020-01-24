<!-- Can be deleted later, just for testing purposes -->


<!-- Compare the two versions of data base queries -->
<!-- find duration and compare, which is faster? which is better? -->
<?php
    include_once('../config/database.php');
    include_once('../config/database_old.php');

    // The New File
    $start = microtime(true);
    $i = 0;
    while($i<100){
        $database = Database::getInstance()->getConnection();
        $i++;
    }
    $new_time = microtime(true) - $start;

    // The Old File
    $start = microtime(true);
    $i = 0;
    while($i<100){
        $database_old = new Database_old();
        $database_connection = $database_old->getConnection();
        $i++;
    }
    $old_time = microtime(true) - $start;


    //Print comparisons done by php as human readable text. 
    //format as best as possible for readability.
    //use printf when debugging, not echo or print.
    printf('New Connection takes -> %s ms'.PHP_EOL, $new_time*1000);
    printf('<br>Old Connection takes -> %s ms'.PHP_EOL, $old_time*1000);
    printf('<br>You saved %s ms'.PHP_EOL, ($old_time - $new_time)*1000);
    printf('<br>New connection only takes %s%% of the Old connection'.PHP_EOL, ($new_time/$old_time)*100);