#!/bin/bash

touch "$1""Okay.php"
touch "$1""Error.php"

cp "$1.php" "$1""Okay.php" 
cp "$1.php" "$1""Error.php" 
