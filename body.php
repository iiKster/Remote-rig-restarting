<?php

    //check if the get variable exists
    if (isset($_GET['reboot']))
    {
        reboot($_GET['reboot']);
    }

    function Reboot($rig)
    {
        // Run the script and display popup message
        echo '<script type="text/javascript">alert("Rig ' . $rig . ' rebooting.")</script>';
        shell_exec("sudo /home/pi/scripts/monitoring/reboot.sh '"  . $rig . "' ");
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }

// The old shell_exec line
// $rig1=shell_exec("curl -s  http://192.168.8.124:3333 | cut -d'<' -f1 | sed -n '2p'  | jq -rc  '.result ['2']' |  cut -d';' -f1");

$rig1=shell_exec("curl -s  http://192.168.8.124:3333 | cut -d'<' -f1 | jq -rc  '.result ['2']' |  cut -d';' -f1");
$rig2=shell_exec("curl -s  http://192.168.8.140:3333 | cut -d'<' -f1 | jq -rc  '.result ['2']' |  cut -d';' -f1");
$rig3=shell_exec("curl -s  http://192.168.8.152:3333 | cut -d'<' -f1 | jq -rc  '.result ['2']' |  cut -d';' -f1");
$rig4=shell_exec("curl -s  http://192.168.8.144:3333 | cut -d'<' -f1 | jq -rc  '.result ['2']' |  cut -d';' -f1");

$color = "blue";        // Init color blue to see if it updates to red or green
$status="";

// Make the table

echo "  <tr><td><p>Rig 1</p>    </td><td><p> ";
         echo $rig1;
if ($rig1 > 10) {
        $color="lime";
        $status="OK!";
        }
else {
        $color="red";
        $status="FAIL!";
        }
echo "</p></td><td bgcolor=";
echo $color;
echo "><p>";
echo $status ;
echo "</p></td><td><a href='?reboot=1'>Hard reboot</a></td></tr>";



echo "<tr><td><p>Rig 2</p></td><td><p> ";
         echo $rig2;
if ($rig2 > 10) {
        $color="lime";
        $status="OK!";
        }
else {
        $color="red";
        $status="FAIL!";
        }
echo "</p></td><td bgcolor=";
echo $color;
echo "><p>";
echo $status ;
echo "</p></td><td><a href='?reboot=2'>Hard reboot</a></td></tr>";



echo "<tr><td><p>Rig 3</p></td><td><p> ";
         echo $rig3;
if ($rig3 > 10) {
        $color="lime";
        $status="OK!";
        }
else {
        $color="red";
        $status="FAIL!";
        }
echo "</p></td><td bgcolor=";
echo $color;
echo "><p>";
echo $status ;
echo "</p></td><td><a href='?reboot=3'>Hard reboot</a></td></tr>";



echo "  <tr><td><p>Rig 4</p></td><td><p> ";
         echo $rig4;
if ($rig4 > 10) {
        $color="lime";
        $status="OK!";
        }
else {
        $color="red";
        $status="FAIL!";
        }
echo "</p></td><td bgcolor=";
echo $color;
echo " ><p>";
echo $status ;
echo "</p></td><td><a href='?reboot=4'>Hard reboot</a></td></tr>";
?>
