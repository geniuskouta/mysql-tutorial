<?php
require_once 'UpdateDataDemo.php';
$obj = new UpdateDataDemo();

if ($obj->update(2, 'MySQL PHP Update Tutorial', 
                    'MySQL PHP Update using prepared statement', 
                    '2013-01-01', 
                    '2013-01-01') !== false)
    echo 'The task has been updated successfully';
else
    echo 'Error updated the task';
