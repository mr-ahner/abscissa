<?php
if (!isset($_SESSION['retard'])) {
    echo '
    <head>
        <meta http-equiv="refresh" content="5;url=index.php">
        <title>Access Denied</title>
    </head>
    <body>
        <p>you are not a retard >:(</p>
        <em>redirecting 5 seconds.......... loser</em>
    </body>';
    exit;
}

?>