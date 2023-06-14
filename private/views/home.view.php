<!DOCTYPE html>
<html>
<head>
    <title>Statements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
    <style>
        #statement {
            transition: transform 0.05s ease-out;
        }

        .statement-hidden {
            transform: translateX(-200%);
        }
    </style>
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
                var antwoord = $(this).data('antwoord');
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

                $('#statement').addClass('statement-hidden');

                setTimeout(function() {
                    statementIndex++;
                    if (statementIndex < statements.length) {
                        toonStatement(statements, statementIndex);
                    } else {
                        berekenCoordinaten();
                        toonResultaat();
                    }
                }, 400);
            });

            function toonStatement(statements, index) {
                var statement = statements[index];
                $('#statement').text(statement.text);
                $('#antwoorden').empty();
                feather.replace();

                // Controleer of de stelling al eerder is beantwoord
                var previousAnswer = getPreviousAnswer(index);
                if (previousAnswer) {
                    $('button.antwoord').each(function() {
                        if ($(this).data('antwoord') === previousAnswer) {
                            $(this).addClass('selected');
                        }
                    });
                }

                // Update teller
                var teller = (index + 1) + "/" + statements.length;
                $('#teller').text(teller);

                $('#statement').removeClass('statement-hidden');
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
</head>
<body>
<?php $this->view('inclodes/header')?>

<div>
    <button id="vorige-btn">Vorige</button>
    <span id="teller"></span>
</div>
<div class="position-absolute top-50 start-50 translate-middle">
    <div>
        <p style="font-size: 30pt" id="statement"></p>
        <div id="antwoorden"></div>
    </div>
</div>

<div class="fixed-bottom mb-4">
    <div class="row">
        <div class="col text-center">
            <button class="btn btn-success antwoord rounded-circle shadow-lg p-4" data-antwoord="Eens"><i class="icon-nav" data-feather="thumbs-up"></i></button>
        </div>
        <div class="col text-center">
            <button class="btn btn-light antwoord rounded-circle shadow-lg p-4" data-antwoord="Weet ik niet"><i class="icon-nav" data-feather="square"></i></button>
        </div>
        <div class="col text-center">
            <button class="btn btn-danger antwoord rounded-circle shadow-lg p-4" data-antwoord="Oneens"><i class="icon-nav" data-feather="thumbs-down"></i></button>
        </div>
    </div>
</div>
</body>
</html>