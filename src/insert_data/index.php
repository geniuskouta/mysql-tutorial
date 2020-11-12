<?php
require_once 'InsertDataDemo.php';

$obj = new InsertDataDemo();
// $inserted = $obj->insert();
$inserted = $obj->insertSingleRow(
    'MySQL PHP Insert Tutorial',
    'MySQL PHP Insert using prepared statement',
    '2013-01-01',
    '2013-01-02'
);

if (!$inserted) {
    echo "Failed inserting data.";
    return;
}

echo "Successfully inserted data.";
