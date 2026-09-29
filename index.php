<?php

$db = new PDO('mysql:host=localhost;dbname=darbu_maldyklas;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['prideti'])) {
    $darbas = $_POST['darbas'];
    $laikas = !empty($_POST['laikas']) ? $_POST['laikas'] : NULL;
    $stmt = $db->prepare("INSERT INTO darbai (darbas, laikas) VALUES (?, ?)");
    $stmt->execute([$darbas, $laikas]);
    header('Location: index.php');
    exit;
}

if (isset($_POST['atlikti'])) {
    $id = $_POST['id'];
    $stmt = $db->prepare("UPDATE darbai SET atliktas = 1 WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
    exit;
}

$dabartinis_laikas = date('Y-m-d H:i:s');

$rezultatas = $db->query("SELECT * FROM darbai ORDER BY atliktas ASC, laikas IS NULL ASC, laikas ASC");
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darbų valdymas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5" style="max-width: 800px;">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Pridėti naują darbą</h4>
        </div>
        <div class="card-body">
            <form method="POST" class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label font-weight-bold">Darbas:</label>
                    <input type="text" name="darbas" class="form-control" placeholder="Įveskite užduotį..." required>
                </div>
                <div class="col-md-4">
                    <label class="form-label font-weight-bold">Laikas (neprivaloma):</label>
                    <input type="datetime-local" name="laikas" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="submit" name="prideti" class="btn btn-primary w-100">Pridėti</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Darbų sąrašas</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Darbas</th>
                            <th>Terminas</th>
                            <th>Būsena</th>
                            <th class="text-end">Veiksmas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $duomenys = $rezultatas->fetchAll(PDO::FETCH_ASSOC);
                        if (count($duomenys) > 0): 
                            foreach ($duomenys as $eile): 
                        ?>
                                <tr>
                                    <td>
                                        <span class="<?php echo $eile['atliktas'] == 1 ? 'text-decoration-line-through text-muted' : 'fw-bold'; ?>">
                                            <?php echo htmlspecialchars($eile['darbas']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($eile['laikas'] != NULL) {
                                            echo htmlspecialchars($eile['laikas']);
                                        } else {
                                            echo '<span class="text-muted italic">Be termino</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($eile['atliktas'] == 1) {
                                            echo '<span class="badge bg-success">Atlikta</span>';
                                        } elseif ($eile['laikas'] != NULL && $eile['laikas'] < $dabartinis_laikas) {
                                            echo '<span class="badge bg-danger">VĖLUOJAMA!</span>';
                                        } else {
                                            echo '<span class="badge bg-warning text-dark">Vykdoma</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-end">
                                        <?php if ($eile['atliktas'] == 0): ?>
                                            <form method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?php echo $eile['id']; ?>">
                                                <button type="submit" name="atlikti" class="btn btn-sm btn-outline-success">
                                                    Pažymėti kaip atliktą
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-3 text-muted">Darbų sąrašas tuščias.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>