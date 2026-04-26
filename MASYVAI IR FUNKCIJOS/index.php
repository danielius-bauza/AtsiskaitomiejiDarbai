<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversions</title>
</head>
<body>

<?php

function miles($miles) {
    return $miles * 1.609;
}

function kilometers($kilometers) {
    return $kilometers / 1.609;
}

function speed_time($speed, $time) {
    return $speed * $time;
}

function kelvin($kelvin) {
    return $kelvin - 273.15;
}

function voltage_power($voltage_power, $current_power) {
    return $voltage_power * $current_power;
}

function voltage_current($voltage_current, $resistance) {
    return $voltage_current / $resistance;
    
}


$miles_val = 0;
$kilometers_val = 0;
$speed_val = 0;
$time_val = 0;
$kelvin_val = 0;
$voltage_power_val = 0;
$current_power_val = 0;
$voltage_current_val = 0;
$resistance_val = 0;


$miles_result = "";
$kilometers_result = "";
$distance_result = "";
$kelvin_result = "";
$power_result = "";
$current_result = "";


if (isset($_POST['convert_miles'])) {
    $miles_val = $_POST['miles'];
    $miles_result = miles($miles_val);
}

if (isset($_POST['convert_km'])) {
    $kilometers_val = $_POST['kilometers'];
    $kilometers_result = kilometers($kilometers_val);
}

if (isset($_POST['calculate_distance'])) {
    $speed_val = $_POST['speed'];
    $time_val = $_POST['time'];
    $distance_result = speed_time($speed_val, $time_val);
}

if (isset($_POST['convert_kelvin'])) {
    $kelvin_val = $_POST['kelvin'];
    $kelvin_result = kelvin($kelvin_val);
}

if (isset($_POST['calculate_power'])) {
    $voltage_power_val = $_POST['voltage_power'];
    $current_power_val = $_POST['current_power'];
    $power_result = voltage_power($voltage_power_val, $current_power_val);
}

if (isset($_POST['calculate_current'])) {
    $voltage_current_val = $_POST['voltage_current'];
    $resistance_val = $_POST['resistance'];
    $current_result = voltage_current($voltage_current_val, $resistance_val);
}
?>

<form method="POST">

    <h3>Miles to Kilometers</h3>
    <input type="number" name="miles" value="<?php echo $miles_val; ?>" placeholder="Miles">
    <button type="submit" name="convert_miles">Convert</button>
    <p>Result: <?php echo "$miles_result mi" ?></p>

    <hr>

    <h3>Kilometers to Miles</h3>
    <input type="number" name="kilometers" value="<?php echo $kilometers_val; ?>" placeholder="Kilometers">
    <button type="submit" name="convert_km">Convert</button>
    <p>Result: <?php echo "$kilometers_result km"; ?></p>

    <hr>

    <h3>Distance (Speed(meters/s) × Time(seconds))</h3>
    <input type="number" name="speed" value="<?php echo $speed_val; ?>" placeholder="Speed">
    <input type="number" name="time" value="<?php echo $time_val; ?>" placeholder="Time">
    <button type="submit" name="calculate_distance">Calculate</button>
    <p>Result: <?php echo "$distance_result meters"; ?></p>

    <hr>

    <h3>Kelvin to Celsius</h3>
    <input type="number" name="kelvin" value="<?php echo $kelvin_val; ?>" placeholder="Kelvin">
    <button type="submit" name="convert_kelvin">Convert</button>
    <p>Result: <?php echo "$kelvin_result kelvins" ?></p>

    <hr>

    <h3>Power (Voltage(V) × Current(A))</h3>
    <input type="number" name="voltage_power" value="<?php echo $voltage_power_val; ?>" placeholder="Voltage">
    <input type="number" name="current_power" value="<?php echo $current_power_val; ?>" placeholder="Current">
    <button type="submit" name="calculate_power">Calculate</button>
    <p>Result: <?php echo "$power_result wats" ?></p>

    <hr>

    <h3>Current (Voltage(V) / Resistance(Ohms))</h3>
    <input type="number" name="voltage_current" value="<?php echo $voltage_current_val; ?>" placeholder="Voltage">
    <input type="number" name="resistance" value="<?php echo $resistance_val; ?>" placeholder="Resistance">
    <button type="submit" name="calculate_current">Calculate</button>
    <p>Result: <?php echo "$current_result A" ?></p>

</form>

</body>
</html>