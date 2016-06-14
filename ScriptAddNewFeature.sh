a#!/bin/bash



ls | while IFS=' ' read item
do 
	if [[ "$item" == *".php"* ]]
	then
		cat $item | while IFS=' ' read row
		do

		    echo "$row" >> temp.php;
			if [[ "$row" == *'RemoveExpenseType.php">Remove Expense Type'* ]] 
			then
				#string to insert where we stop
				echo '				`</ul></li><li>'  >> temp.php;
				echo '   			<a  href="#acc">Account</a>'  >> temp.php;
				echo '   			<ul>'  >> temp.php;
				echo '   			<li><a href="/ChangeOwnerPassword.php">Change Password</a></li>' >> temp.php;
				echo "DONE MASTER";
				echo $item;
			fi
		done
		#copy the temp file to the orginal file

		#echo $item; 
		cat temp.php  > "$item"
		#remove the temp file
		rm temp.php
	fi
done
