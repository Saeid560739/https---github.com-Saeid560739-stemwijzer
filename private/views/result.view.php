<?php

// Controleren of de coördinaten zijn opgeslagen in de sessie
if (isset($_SESSION['coordinaten'])) {
    $coordinaten = $_SESSION['coordinaten'];
    echo "Coördinaten: $coordinaten";

}
?>