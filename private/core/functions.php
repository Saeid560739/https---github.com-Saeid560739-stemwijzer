<?php
if (isset($_POST['coordinaten'])) {
    $coordinaten = $_POST['coordinaten'];
    $_SESSION['coordinaten'] = $coordinaten;
}
?>