<?php
// COM sınıfı ile tekrar yazılacak
shell_exec('mode COM3 BAUD=9600 PARITY=n DATA=8');
if ($_POST['data'] == 'on') {
    shell_exec('echo o > COM3');
} elseif ($_POST['data'] == 'off') {
    shell_exec('echo p > COM3');
}

$comPort = "COM3";
$psScriptPath = "read_comport.ps1";
$baudRate = 9600;
$maxAttempts = 25; // maximum number of attempts"
$authorizedData = [
    ["id" => "1458764e", "username" => "ece sensoz", "age" => 30],
    ["id" => "98765432", "username" => "ozgur vurgun", "age" => 25],
    ["id" => "87654321", "username" => "ahmet necdet sezer", "age" => 28]
];

$foundValidData = false;
$validData = "";

for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
    $command = "powershell.exe -ExecutionPolicy Bypass -NoProfile -File \"$psScriptPath\" -comPort \"$comPort\" -baudRate \"$baudRate\" 2>&1";
    $output = shell_exec($command);
    $trimmedOutput = trim($output);
    if (strlen($trimmedOutput) == 8 || strlen($trimmedOutput) == 13) {
        $foundValidData = true;
        $validData = $trimmedOutput;
        break;
    }
    usleep(100000); // 100ms
}

if ($foundValidData) {
    $validId = $validData;
    $userInfo = null;

    foreach ($authorizedData as $data) {
        if ($data["id"] === $validId) {
            $userInfo = $data;
            break;
        }
    }

    if ($userInfo !== null) {
        echo "Authorized access!<br> Username: " . strtoupper($userInfo["username"]) . ". Welcome to the gym.";
    } else {
        echo "Unauthorized Access!";
    }
} else {
    echo "No suitable data found.";
}
