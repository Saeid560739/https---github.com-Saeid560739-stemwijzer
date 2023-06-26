<?php $this->view('inclodes/header');?>
<?php $this->view('inclodes/header');?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="text-center">
                <h1 class="mb-4 mt-3" style="color: #664EEF">Top 3 Partijen</h1>
            </div>
            <?php

            // Controleren of de coördinaten zijn opgeslagen in de sessie
            if (isset($_SESSION['coordinaten'])) {
                $coordinaten = $_SESSION['coordinaten'];

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

                    // Haal alleen de top 3 partijen met de kortste afstanden
                    $topPartijen = array_slice($afstanden, 0, 3, true);

                    // Bepaal de maximale afstand binnen de top 3 partijen
                    $maxAfstand = max($topPartijen);
                    ?>

                    <div class="row">
                        <?php
                        // Toon de resultaten met het matchingspercentage voor de top 3 partijen
                        foreach ($topPartijen as $partijNaam => $afstand) {
                            $percentage = ($maxAfstand - $afstand) / $maxAfstand * 100;

                            // Rond het percentage af op twee decimalen
                            $percentage = round($percentage, 0);
                            ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $partijNaam; ?></h5>
                                        <div class="progress" style="height: 15px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage; ?>%; border-radius: 10px;" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="card-text"><?php echo $percentage; ?>%</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                } else {
                    echo "<p>Geen geldige partijgegevens.</p>";
                }
            }
            ?>
        </div>
    </div>
</div>
