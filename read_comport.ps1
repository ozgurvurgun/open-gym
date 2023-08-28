param (
    [string]$comPort,
    [int]$baudRate
)

$psPort = new-Object System.IO.Ports.SerialPort $comPort, $baudRate, None, 8, "One"
$psPort.Open()
$receivedData = ""
while ($psPort.BytesToRead -eq 0) {}
while ($psPort.BytesToRead -gt 0) { $receivedData += [char]$psPort.ReadChar() }
$psPort.Close()
$lines = $receivedData -split "`r`n"
if ($lines.Length -ge 1) { $secondToLastLine = $lines[-2]; Write-Output $secondToLastLine } else { Write-Output "Not enough lines to determine the second to last line." }
