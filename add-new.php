<?php
include "db_conn.php"; // Stellt die Verbindung zur Datenbank her

if (isset($_POST["submit"])) { // Überprüft, ob das Formular abgesendet wurde
    $aufgabe = $_POST['aufgabe']; // Holt die Aufgabe aus dem Formular
    $datum = $_POST['tag'] . '-' . $_POST['monat'] . '-' . $_POST['jahr']; // Formatiert das Datum als "Tag-Monat-Jahr"
    $wichtigkeit = $_POST['wichtigkeit']; // Holt die Wichtigkeit aus dem Formular

    $sql = "INSERT INTO `crud`(`id`, `aufgabe`, `datum`, `wichtigkeit`) VALUES (NULL, '$aufgabe', '$datum', '$wichtigkeit')"; // SQL-Anweisung zum Einfügen der Daten

    $result = mysqli_query($conn, $sql); // Führt die SQL-Anweisung aus

    if ($result) {
        header("Location: index.php?msg=New record created successfully"); // Leitet bei Erfolg zur Startseite weiter
    } else {
        echo "Fehler beim Einfügen der Daten: " . mysqli_error($conn); // Gibt bei Fehler eine Fehlermeldung aus
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"> <!-- Definiert die Zeichencodierung als UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Stellt sicher, dass die Seite im neuesten Modus des Browsers angezeigt wird -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Macht die Seite auf mobilen Geräten responsive -->

    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>To-Do Liste</title> <!-- Der Titel der Webseite, der im Tab des Browsers angezeigt wird -->
</head>
<body>
    <div class="container"> <!-- Container, um den Inhalt zu zentrieren und zu umschließen -->
        <div class="text-center mb-4"> <!-- Zentriert den Text und fügt einen unteren Abstand hinzu -->
            <h3>Neue Aufgabe hinzufügen</h3> <!-- Hauptüberschrift der Seite -->
            <p class="text-muted">Aufgabe hinzufügen</p> <!-- Untertitel mit grauer Farbe -->
        </div>

        <div class="container d-flex justify-content-center"> <!-- Container zur Zentrierung des Formulars -->
            <form action="" method="post" style="width:50vw; min-width:300px;"> <!-- Formular zur Datenübermittlung -->
                <div class="row mb-3"> <!-- Zeile mit unterem Abstand -->
                    <div class="col"> <!-- Spalte für das Eingabefeld der Aufgabe -->
                        <label class="form-label">Aufgabe:</label> <!-- Beschriftung für das Eingabefeld -->
                        <input type="text" class="form-control" name="aufgabe" placeholder="Arbeiten"> <!-- Eingabefeld für die Aufgabe -->
                    </div>

                    <div class="col"> <!-- Spalte für die Datumsauswahl -->
                        <label class="form-label">Datum:</label> <!-- Beschriftung für die Datumsauswahl -->
                        <div class="row"> <!-- Zeile für die Dropdown-Menüs -->
                            <div class="col"> <!-- Spalte für das Tag-Dropdown-Menü -->
                                <select class="form-select" name="tag"> <!-- Dropdown-Menü für den Tag -->
                                    <option value="">Tag</option> <!-- Platzhalter-Option -->
                                    <?php for ($i = 1; $i <= 31; $i++): ?> <!-- Schleife zum Erstellen der Optionen für Tage -->
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <!-- Option für jeden Tag -->
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col"> <!-- Spalte für das Monat-Dropdown-Menü -->
                                <select class="form-select" name="monat"> <!-- Dropdown-Menü für den Monat -->
                                    <option value="">Monat</option> <!-- Platzhalter-Option -->
                                    <?php for ($i = 1; $i <= 12; $i++): ?> <!-- Schleife zum Erstellen der Optionen für Monate -->
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <!-- Option für jeden Monat -->
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col"> <!-- Spalte für das Jahr-Dropdown-Menü -->
                                <select class="form-select" name="jahr"> <!-- Dropdown-Menü für das Jahr -->
                                    <option value="">Jahr</option> <!-- Platzhalter-Option -->
                                    <?php for ($i = 2024; $i <= 2034; $i++): ?> <!-- Schleife zum Erstellen der Optionen für Jahre -->
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <!-- Option für jedes Jahr -->
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3"> <!-- Gruppe für die Radio-Buttons zur Auswahl der Wichtigkeit -->
                    <label>Wichtigkeit:</label> <!-- Beschriftung für die Wichtigkeit -->
                    &nbsp; <!-- Ein kleiner Leerraum -->
                    <input type="radio" class="form-check-input" name="wichtigkeit" id="sehr_wichtig" value="sehr_wichtig"> <!-- Radio-Button für sehr wichtig -->
                    <label for="sehr_wichtig" class="form-check-label">sehr wichtig</label> <!-- Beschriftung für sehr wichtig -->
                    &nbsp; <!-- Ein kleiner Leerraum -->
                    <input type="radio" class="form-check-input" name="wichtigkeit" id="wichtig" value="wichtig"> <!-- Radio-Button für wichtig -->
                    <label for="wichtig" class="form-check-label">wichtig</label> <!-- Beschriftung für wichtig -->
                    &nbsp; <!-- Ein kleiner Leerraum -->
                    <input type="radio" class="form-check-input" name="wichtigkeit" id="normal" value="normal"> <!-- Radio-Button für normal -->
                    <label for="normal" class="form-check-label">normal</label> <!-- Beschriftung für normal -->
                    &nbsp; <!-- Ein kleiner Leerraum -->
                    <input type="radio" class="form-check-input" name="wichtigkeit" id="unwichtig" value="unwichtig"> <!-- Radio-Button für unwichtig -->
                    <label for="unwichtig" class="form-check-label">unwichtig</label> <!-- Beschriftung für unwichtig -->
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Speichern</button> <!-- Button zum Absenden des Formulars -->
                    <a href="index.php" class="btn btn-danger">Abbrechen</a> <!-- Link zum Abbrechen und Zurückkehren zur Startseite -->
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JavaScript einbinden -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
