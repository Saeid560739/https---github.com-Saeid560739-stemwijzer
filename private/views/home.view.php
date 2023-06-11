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
                $('#antwoorden').append('<button class="antwoord">Eens</button> ');
                $('#antwoorden').append('<button class="antwoord">Weet ik niet</button> ');
                $('#antwoorden').append('<button class="antwoord">Oneens</button>');

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
    <style>
        .selected {
            background-color: #ccc;
        }
    </style>
</head>
<body>
<h1>Statements</h1>
<div>
    <p id="statement"></p>
    <div id="antwoorden"></div>
</div>
<div>
    <button id="vorige-btn">Vorige</button>
    <button id="volgende-btn">Volgende</button>
</div>
</body>
</html>
