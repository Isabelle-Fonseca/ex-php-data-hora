<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Conversor</title>
</head>
<body>
    <section class="bg">
        <div class="container">
            <section class="header">
                <h2>Conversor de Horário</h2>
            </section>
            <form method="POST" action="">
                <div class="form-content">
                    <label for="datetime">Data e Hora</label>
                    <input type="datetime-local" id="datetime" name="datetime" required>
                </div>
                <div class="form-content">
                    <label for="timezone">Escolha o Fuso Horário</label>
                    <select id="timezone" name="timezone" required>
                        <option value="America/Sao_Paulo">São Paulo</option>
                        <option value="Europe/London">Londres</option>
                    </select>
                </div>
                <button type="submit">Converter</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datetime = $_POST['datetime'];
                $datetimezone = $_POST['timezone'];

                // Convertendo data e hora 
                $date = new DateTime($datetime, new DateTimeZone($datetimezone));
                $convercao_time = $date->format('Y-m-d H:i:s');

                //  data e hora atuais de SP
                $dateSP = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
                $dateLondon = new DateTime("now", new DateTimeZone("Europe/London"));

                // data e hora atuais
                $now_date = date("d-m-Y");
                $now_time = date("H:i:s");

                echo "<div class='form-content'>";
                echo "<label>Data/Hora Convertida:</label>";
                echo "<span>$convercao_time</span>";
                echo "</div>";

                echo "<div class='form-content'>";
                echo "<label>Data/Hora em São Paulo:</label>";
                echo "<span>" . $dateSP->format('Y-m-d H:i:s') . "</span>";
                echo "</div>";

                echo "<div class='form-content'>";
                echo "<label>Data/Hora em Londres:</label>";
                echo "<span>" . $dateLondon->format('Y-m-d H:i:s') . "</span>";
                echo "</div>";

                echo "<div class='form-content'>";
                echo "<label>Data Atual:</label>";
                echo "<span>$now_date</span>";
                echo "</div>";

                echo "<div class='form-content'>";
                echo "<label>Hora Atual:</label>";
                echo "<span>$now_time</span>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</body>
</html>
