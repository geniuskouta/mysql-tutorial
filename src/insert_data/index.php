<?php
    require_once 'InsertDataDemo.php';

    $obj = new InsertDataDemo();
    $inserted = $obj->insert();

    if(!$inserted) {
        echo "Failed inserting data.";
        return ;    
    }

    echo "Successfully inserted $inserted";