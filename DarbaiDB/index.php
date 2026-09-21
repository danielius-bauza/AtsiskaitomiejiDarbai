<?php

$db = new mysqli('localhost', 'root', '', 'darbu_maldyklas');


if (isset($_POST['prideti'])) {
   
    $darbas = $_POST['darbas'];
    $laikas = !empty($_POST['laikas']) ? $_POST['laikas'] : NULL;
    $stmt = $db->prepare("INSERT INTO darbai (darbas, laikas) VALUES (?, ?)");
    $stmt->bind_param("ss", $darbas, $laikas);
    $stmt->execute();
    header('Location: index.php');
    exit;
}

if (isset($_POST['atlikti'])) {
    $id = $_POST['id'];
    $db->query("UPDATE darbai SET atliktas = 1 WHERE id = $id");
    header('Location: index.php');
    exit;
}


$dabartinis_laikas = date('Y-m-d H:i:s');

$rezultatas = $db->query("SELECT * FROM darbai ORDER BY atliktas ASC, laikas IS NULL ASC, laikas ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Darbai</title>
</head>
<body>


    <h2>PRIDEK nauja darba</h2>

    <form method="POST">
        <label>Darbas:</label>
        <input type="text" name="darbas" required>
        <br><br>

        <label>Laikas:</label>
        <input type="datetime-local" name="laikas">
        <br><br>

        <button type="submit" name="prideti">Pridėti</button>
    </form>

    <hr>


    <h2>Darbu sarasas</h2>

   
    <table border="1">
        <tr>
            <th>Darbas</th>
            <th>Laikas</th>
            <th>Būsena</th>
            <th>Veiksmas</th>
        </tr>

        <?php while ($eile = $rezultatas->fetch_assoc()): ?>
            <tr>
               
                <td><?php echo $eile['darbas']; ?></td>

                
                <td>
                    <?php 
                    if ($eile['laikas'] != NULL) {
                        echo $eile['laikas'];
                    } else {
                        echo "Be termino";
                    }
                    ?>
                </td>

                
                <td>
                    <?php 
                    if ($eile['atliktas'] == 1) {
                        echo "Atlikta";
                    } elseif ($eile['laikas'] != NULL && $eile['laikas'] < $dabartinis_laikas) {
                        echo "VĖLUOJAMA!";
                    } else {
                        echo "Vykdoma";
                    }
                    ?>
                </td>

           
                <td>
                    <?php if ($eile['atliktas'] == 0): ?>
                        <form method="POST">
                
                            <input type="hidden" name="id" value="<?php echo $eile['id']; ?>">
                            <button type="submit" name="atlikti">Pazymek jei atliktas</button>
                        </form>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>