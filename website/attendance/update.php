<?php
    require_once './dbh.inc.php';

    $sub = $_GET["sub"];
    $val = $_GET["val"];

    $sql = "SELECT * FROM att WHERE aSub=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signIn_Up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s",$sub );
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($resultData);
    
    mysqli_stmt_close($stmt);

?>
