<?php
    require_once 'dbconfig.php';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    /* select query */
    $sql = 'SELECT subject, start_date, description
    FROM tasks
    ORDER BY start_date';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>Tasks</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>start_date</th>
                        <th>subject</th>
                        <th>desc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['subject']) ?></td>
                            <td><?php echo htmlspecialchars($row['description']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>
