#!/bin/bash



ls | while IFS=' ' read item
do 
	if [[ "$item" == *".php"* ]]
	then
		cat $item | while IFS=' ' read row
		do
			if [[ "$row" == *"/AddVendor.php"* ]] 
			then
				#string to insert where we stop
				echo "                <li><a href="/OwnerViewExpense.php">View Expense</a></li>" >> temp.php;
				echo "DONE MASTER";
			fi
			echo "$row" >> temp.php;
		done
		#copy the temp file to the orginal file

		echo $item; 
		cat temp.php  > "$item"
		#remove the temp file
		rm temp.php
	fi
done
