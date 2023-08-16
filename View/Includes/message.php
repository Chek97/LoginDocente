<?php
    session_start();
    if (isset($_SESSION['message'])) {
?>
    <p><?php echo ($_SESSION['status'] . ": " . $_SESSION['message']); ?></p>
<?php
    }
    session_unset();
    session_destroy();
?>