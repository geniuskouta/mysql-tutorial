<?php
    require_once 'CreateTableDemo.php';
    $obj = new CreateTableDemo();
    $isCreated = $obj->createTaskTable();
    if($isCreated) {
        echo 'TASK table created.';
        return ;
    }
    echo 'Failed to create TASK table.';