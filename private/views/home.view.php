<?php $this->view('inclodes/header')?>
    <script>
        $(document).ready(function() {
            var statements = <?php echo json_encode($data); ?>;
            var statementIndex = 0;
            var politicalSpectrum = {
                "x": 0,
                "y": 0
            };
            var answeredStatements = [];

            toonStatement(statements, statementIndex);

            // Volgende statement
            $('#volgende-btn').click(function() {
                statementIndex++;
                if (statementIndex < statements.length) {
                    toonStatement(statements, statementIndex);
                } else {
                    berekenCoordinaten();
                    toonResultaat();
                }
            });

            // Vorige statement
            $('#vorige-btn').click(function() {
                if (statementIndex > 0) {
                    statementIndex--;
                    toonStatement(statements, statementIndex);
                }
            });

            // Verwerk antwoord
            $(document).on('click', '.antwoord', function() {
                var antwoord = $(this).text();
                var politicalDirection = statements[statementIndex].political_direction;

                // Controleer of de stelling al eerder is beantwoord
                var index = answeredStatements.findIndex(function(element) {
                    return element.statementIndex === statementIndex;
                });

                if (index !== -1) {
                    // Stelling is eerder beantwoord, wijzig het antwoord
                    answeredStatements[index].antwoord = antwoord;
                } else {
                    answeredStatements.push({
                        statementIndex: statementIndex,
                        antwoord: antwoord
                    });
                }

                statementIndex++;
                if (statementIndex < statements.length) {
                    toonStatement(statements, statementIndex);
                } else {
                    berekenCoordinaten();
                    toonResultaat();
                }
            });

            function toonStatement(statements, index) {
                var statement = statements[index];
                $('#statement').text(statement.text);
                $('#antwoorden').empty();
                $('#antwoorden').append('<button class="btn btn-success antwoord rounded-circle shadow-lg p-4" data-antwoord="Eens"><i class="icon-nav" data-feather="thumbs-up"></button>');
                $('#antwoorden').append('<button class="btn btn-light antwoord rounded-circle shadow-lg p-4" data-antwoord="Weet ik niet"><i class="icon-nav" data-feather="square"></button>');
                $('#antwoorden').append('<button class="btn btn-danger antwoord rounded-circle shadow-lg p-4" data-antwoord="Oneens"><i class="icon-nav" data-feather="thumbs-down"></button>');
                    feather.replace()

                // Controleer of de stelling al eerder is beantwoord
                var previousAnswer = getPreviousAnswer(index);
                if (previousAnswer) {
                    $('button.antwoord').each(function() {
                        if ($(this).text() === previousAnswer) {
                            $(this).addClass('selected');
                        }
                    });
                }
            }

            function berekenCoordinaten() {
                // Bereken en toon de uiteindelijke coördinaten
                for (var i = 0; i < answeredStatements.length; i++) {
                    var statement = statements[answeredStatements[i].statementIndex];
                    var antwoord = answeredStatements[i].antwoord;
                    var politicalDirection = statement.political_direction;
                    verwerkAntwoord(antwoord, politicalDirection, false);
                }
            }

            function verwerkAntwoord(antwoord, politicalDirection, isPrevious) {
                switch (politicalDirection) {
                    case 'links':
                        if (antwoord === 'Eens') {
                            politicalSpectrum.x--;
                        } else if (antwoord === 'Oneens') {
                            politicalSpectrum.x++;
                        }
                        break;
                    case 'rechts':
                        if (antwoord === 'Eens') {
                            politicalSpectrum.x++;
                        } else if (antwoord === 'Oneens') {
                            politicalSpectrum.x--;
                        }
                        break;
                    case 'progressief':
                        if (antwoord === 'Eens') {
                            politicalSpectrum.y--;
                        } else if (antwoord === 'Oneens') {
                            politicalSpectrum.y++;
                        }
                        break;
                    case 'conservatief':
                        if (antwoord === 'Eens') {
                            politicalSpectrum.y++;
                        } else if (antwoord === 'Oneens') {
                            politicalSpectrum.y--;
                        }
                        break;
                }

                if (!isPrevious) {
                    $('#coordinaten').text("Coördinaten: " + politicalSpectrum.x + "," + politicalSpectrum.y);
                }
            }

            function getPreviousAnswer(statementIndex) {
                var previousAnswer = null;
                var index = answeredStatements.findIndex(function(element) {
                    return element.statementIndex === statementIndex;
                });
                if (index !== -1) {
                    previousAnswer = answeredStatements[index].antwoord;
                }
                return previousAnswer;
            }

            function toonResultaat() {
                var coordinaten = politicalSpectrum.x + "," + politicalSpectrum.y;

                window.location.href = "<?=ROOT?>/result?coordinaten=" + coordinaten;
            }
        });
    </script>
<div class="d-flex justify-content-center flex-column mb-3 text-center ">
    <div class="p-2"><p id="statement"></p></div>

</div>

<div class="fixed-bottom d-flex justify-content-around mb-5">
    <div type="button" id="antwoord1"></div>
    <div id="antwoorden"></div>
</div>

<div>
    <button id="vorige-btn">Vorige</button>
    <button id="volgende-btn">Volgende</button>
</div>

