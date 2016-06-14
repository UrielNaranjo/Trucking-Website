#!/bin/bash



ls | while IFS=' ' read item
do 
	if [[ "$item" == *".php"* ]]
	then
		cat $item | while IFS=' ' read row
		do
			if [[ "$row" == *"<!DOCTYPE html>"* ]] 
			then
			cat Security.php > temp.php
			cat $item >> temp.php
			cat temp.php > "$item"
			exit
			fi
		done
	fi
done
