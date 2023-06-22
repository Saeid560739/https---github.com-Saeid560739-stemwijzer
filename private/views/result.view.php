<?php

// Controleren of de coördinaten zijn opgeslagen in de sessie
if (isset($_SESSION['coordinaten'])) {
    $coordinaten = $_SESSION['coordinaten'];
    echo "Coördinaten: $coordinaten";

    // Haal de x- en y-coördinaten op
    $coordinatenArr = explode(',', $coordinaten);
    $coordinaten_x = $coordinatenArr[0];
    $coordinaten_y = $coordinatenArr[1];

    // Haal de gegevens van de partijen op die zijn doorgegeven aan de weergave
    if (is_array($data)) {
        $partijen = $data;

        // Array om de afstanden op te slaan
        $afstanden = array();

        // Loop door de partijen om de afstand tot de gebruiker te berekenen
        foreach ($partijen as $partij) {
            $partijX = $partij->x;
            $partijY = $partij->y;

            // Bereken de afstand tussen de gebruiker en de partijcoördinaten
            $afstand = sqrt(pow($partijX - $coordinaten_x, 2) + pow($partijY - $coordinaten_y, 2));

            // Voeg de afstand toe aan de array
            $afstanden[$partij->abbreviation] = $afstand;
        }

        // Sorteer de partijen op basis van de afstanden (van laag naar hoog)
        asort($afstanden);

        echo "<h3>Top 3 resultaten:</h3>";

        // Neem de top 3 partijen op basis van de kortste afstanden
        $top3Partijen = array_slice($afstanden, 0, 3, true);

        // Toon de resultaten
        foreach ($top3Partijen as $partijNaam => $afstand) {
            echo "<p>Partij: $partijNaam (Afstand: $afstand)</p>";
        }
    } else {
        echo "Geen geldige partijgegevens.";
    }
}
?>
