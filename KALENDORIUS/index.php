<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendorius</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 600px;
        font-size: 20px;
        text-align: center;
        padding: 20px;
        font-family: "Bangers", system-ui;
        font-weight: 400;
        font-style: normal;
        letter-spacing: 1.5px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 15px;
    }

    th,
    .melyna {
        background-color: #c3fbffff;
    }
</style>

<body>

    <?php

    // Grazina menesio pavadinima
    function menesioPavadinimas($menuo)
    {
        $menesiai = array(
            "Sausis",
            "Vasaris",
            "Kovas",
            "Balandis",
            "Geguze",
            "Birzelis",
            "Liepa",
            "Rugpjutis",
            "Rugsejis",
            "Spalis",
            "Lapkritis",
            "Gruodis"
        );

        return $menesiai[$menuo - 1];
    }

    // Grazina savaites dienu eilute
    function savaitesDienos()
    {
        $dienos = ["Pr", "A", "T", "K", "Pe", "Š", "S"];

        $html = "<tr>";
        $html .= "<th>{$dienos[0]}</th>";
        $html .= "<th>{$dienos[1]}</th>";
        $html .= "<th>{$dienos[2]}</th>";
        $html .= "<th>{$dienos[3]}</th>";
        $html .= "<th>{$dienos[4]}</th>";
        $html .= "<th>{$dienos[5]}</th>";
        $html .= "<th>{$dienos[6]}</th>";
        $html .= "</tr>";

        return $html;
    }

    // Grazina pirma menesio savaites diena
    function pirmaDiena($metai, $menuo)
    {
        $pirma_diena = date("N", mktime(0, 0, 0, $menuo, 1, $metai));
        return $pirma_diena;
    }

    // Grazina kiek menesyje yra dienu
    function dienuSkaicius($metai, $menuo)
    {
        $dienu_skaicius = cal_days_in_month(CAL_GREGORIAN, $menuo, $metai);
        return $dienu_skaicius;
    }

    // Patikrina ar tai siandien
    function siandien($metai, $menuo, $diena)
    {
        $siandienos_diena = date('d');
        $siandienos_menuo = date('n');
        $siandienos_metai = date("Y");

        if ($siandienos_metai == $metai and $siandienos_menuo == $menuo and $siandienos_diena == $diena) {
            return true;
        } else {
            return false;
        }
    }

    // Sugeneruoja kalendoriu
    function kalendorius($metai, $menuo)
    {
        $pirma_diena = pirmaDiena($metai, $menuo);
        $dienu_skaicius = dienuSkaicius($metai, $menuo);

        // Praeitas menuo
        $praeitas_menuo = $menuo - 1;
        $praeiti_metai = $metai;

        if ($praeitas_menuo == 0) {
            $praeitas_menuo = 12;
            $praeiti_metai--;
        }

        $praeito_menesio_dienos = dienuSkaicius($praeiti_metai, $praeitas_menuo);

        // Kitas menuo
        $kitas_menuo = $menuo + 1;
        $kiti_metai = $metai;

        if ($kitas_menuo == 13) {
            $kitas_menuo = 1;
            $kiti_metai++;
        }

        $html = '<table>';

        // Virsus su metais ir menesiu
        $html .= '<tr>';
        $html .= '<td colspan="7" class="melyna">';
        $html .= $metai . " " . menesioPavadinimas($menuo);
        $html .= '</td>';
        $html .= '</tr>';

        // Savaites dienos
        $html .= savaitesDienos();
        $html .= "<tr>";

        // Praeito menesio dienos pradzioje
        $pradzia = $praeito_menesio_dienos - $pirma_diena + 2;

        for ($i = $pradzia; $i <= $praeito_menesio_dienos; $i++) {
            $html .= "<td style='color:gray;'>$i</td>";
        }

        // Einamo menesio dienos
        $langeliu_skaicius = ($pirma_diena - 1);

        for ($d = 1; $d <= $dienu_skaicius; $d++) {

            if (siandien($metai, $menuo, $d)) {
                $html .= "<td style='background:yellow;'>$d</td>";
            } else {
                $html .= "<td>$d</td>";
            }

            $langeliu_skaicius++;

            if ($langeliu_skaicius % 7 == 0) {
                $html .= "</tr><tr>";
            }
        }

        // Kito menesio dienos pabaigoje
        $kita_diena = 1;

        while ($langeliu_skaicius % 7 != 0) {
            $html .= "<td style='color:gray;'>$kita_diena</td>";
            $kita_diena++;
            $langeliu_skaicius++;
        }

        $html .= "</tr>";
        $html .= "</table>";

        return $html;
    }

    echo kalendorius(2020, 10);

    ?>

</body>

</html>