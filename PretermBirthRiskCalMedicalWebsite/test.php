<?php
echo "Current directory: " . __DIR__;
echo "<br>";
echo "Requested URL: " . $_SERVER['REQUEST_URI'];
echo "<br>";
echo "Script name: " . $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo "Files in current directory:";
echo "<pre>";
print_r(scandir(__DIR__));
echo "</pre>";
?>