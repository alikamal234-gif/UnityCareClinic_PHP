<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_id']==1 ) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "hello ".$_SESSION['email'];

?>
</body>
</html>