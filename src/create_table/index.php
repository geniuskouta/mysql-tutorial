<?php
    require_once 'CreateTableDemo.php';
    $obj = new CreateTableDemo();
    $created = $obj->createTaskTable();
    if(!$created) {
        echo 'Failed to create TASK table.';
        return ;
    }

    echo "Created TASK table";
