<?php
echo "<pre>";

//this file has been designed to be executed from the command line; these scripts
//rely heavily on fgets(STDIN), which does some funny stuff to HTML output

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 1 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 1 ----------------------------\n\n";
	
	echo "This is the 'Sum of Digits' exercise.\n\n";
	echo "Please enter any number: ";
	$number = fgets(STDIN);
	$digits = str_split($number);
	$total = 0;
	foreach($digits as $element => $numeral){
		$total += $numeral;
	}
	echo "The sum of ".$number."'s digits is $total.\n";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 2 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 2 ----------------------------\n\n";

	echo "This is the 'Charting Random Numbers' exercise. \n\n";
	//generate array of random numbers
	$numbers = array();
	for($i = 0; $i <= 99; $i++){
		array_push($numbers, rand(1,10));
	}
	
	//count the total amount of each number
	for($i = 1; $i <= 10; $i++){
		$count = count(array_keys($numbers, $i));
		$mark = "";
		//generate a string of x for each total
		for($n = 0; $n <= $count; $n++){
			$mark .= "x";
		}
		//this if/else chain is just to adjust the spacing of the console output
		if($i <= 9 && $count <= 9){
			echo " ".$i." = ".$count."   |  ".$mark."\n";
		}
		else if($i <= 9 && $count >= 10){
			echo " ".$i." = ".$count."  |  ".$mark."\n";
		}
		else if($i >= 10 && $count <= 9){
			echo "".$i." = ".$count."   |  ".$mark."\n";
		}
		else{
			echo $i." = ".$count."  |  ".$mark."\n";
		}
	}

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 3 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 3 ----------------------------\n\n";

	echo "This is the 'guess the number' exercise.\n\n";
	//generate random number
	$number = rand(0,100);
	echo "The object of this game is to guess the computer's number.\n";
	echo "Please enter an integer between 0 and 100. Type ctrl-c to quit. >";
	//get user input
	$line = intval(fgets(STDIN));
	$guess = 0;
	//allow for more than one iteration of these options
	while($line != $number){
		//discard invalid input (non-integers)
		if($line == NULL){
			echo "Invalid entry. Please enter an integer between 0 and 100. Type ctrl-c to quit. > ";
			$line = intval(fgets(STDIN));
		}
		//hint that the guess is too high
		else if($line > $number){
			$guess++;
			echo "That's too high. You have made $guess guesses.\n";
			echo "Guess again. Please enter an integer between 0 and 100. Type ctrl-c to quit. > ";
			$line = intval(fgets(STDIN));
		}
		//hint that it is too low
		else if($line < $number){
			$guess++;
			echo "That's too low. You have made $guess guesses.\n";
			echo "Guess again. Please enter an integer between 0 and 100. Type ctrl-c to quit. > ";
			$line = intval(fgets(STDIN));
		}
	}
	//win conditions, aren't you proud of yourself
	echo "You guessed it! The number is $number.\n";
	echo "It took you $guess guesses.\n";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 4 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 4 ----------------------------\n\n";

	echo "This is the 'Monaco gas station' exercise.\n\n";
	
	//a couple of constants for easy parameter adjustment
	define("FILLTIME", 8); //minutes
	define("WORKDAY", 90); //8-minute cycles in a 12-hour workday
	//variables for a one-pump station
	$numCustomers = 0;
	$waitTime = 0;
	$waitTotal = array();
	//variables for a two-pump station 
	$numCustomers2 = 0;
	$waitTime2 = 0;
	$waitTotal2 = array();
	//the number of 8-minute fill cycles in a 12-hour workday
	for($n = 0; $n <= WORKDAY; $n++){
		//iterating over the minutes in an 8-minute fill cycle to check for new customers
		for($i = 0; $i <= FILLTIME; $i++){
			$customerChance = rand(0.0,1.0);
			//check if a customer has arrived
			if($customerChance <= 0.1){
				//increment the number of customers and determine the total wait time for the last customer in line
				$numCustomers++;
				$waitTime = $numCustomers*8;
				//take note of the total wait time and number of customers this iteration
				array_push($waitTotal, $waitTime, $numCustomers);
				break;
			}
			if($numCustomers >= 1){
				//if there are any customers at the end of an 8-minute cycle, one leaves
				--$numCustomers;
			}
			else if($numCustomers < 1){
				//if there are no customers, nothing happens
				break;
			}
		}
	}
	//this algorithm simulates a two-pump station
	//I am unsure if this works the way I want it to; the average wait times do not seem to be consistently lower than one pump
	//given the stochastic nature of customer arrival I suspect that enough runs of the simulation will just level off regardless
	//of the number of pumps
	for($x = 0; $x <= WORKDAY; $x++){
		for($y = 0; $y <= FILLTIME; $y++){
			//halve the lower limit to simulate a 5% chance of a new customer; I intuit that this
			//is effectively equivalent to having twice as many pumps available at any given time
			$customerChance2 = rand(0.0,1.0);
			if($customerChance2 <= 0.05){
				$numCustomers2++;
				$waitTime2 = $numCustomers2*8;
				array_push($waitTotal2, $waitTime2, $numCustomers2);
				break;
			}
			if($numCustomers2 >= 1){
				--$numCustomers2;
			}
			else if($numCustomers2 < 1){
				break;
			}
		}
	}
	//calculate the averate wait time in minutes and seconds
	$waitAverage = array_sum($waitTotal)/count($waitTotal);
	$waitAverageMins = round($waitAverage, 0);
	$waitAverageSecs = round((fmod($waitAverage, 1)*60), 0);
	//and for the second pump
	$waitAverage2 = array_sum($waitTotal2)/count($waitTotal2);
	$waitAverageMins2 = round($waitAverage2, 0);
	$waitAverageSecs2 = round((fmod($waitAverage2, 1)*60), 0);
	echo "Average wait time: ".$waitAverageMins." minutes, ".$waitAverageSecs." seconds.\n";
	echo "Longest wait time: ".max($waitTotal)." minutes.\n"; 
	echo "Most customers at once: ".(max($waitTotal)/8).".\n";
	echo "Average wait time with two pumps: ".$waitAverageMins2." minutes, ".$waitAverageSecs2." seconds.\n";
	echo "Longest wait time: ".max($waitTotal2)." minutes.\n"; 
	echo "Most customers at once: ".(max($waitTotal2)/8).".\n";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 5 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 5 ----------------------------\n\n";

	echo "This is the 'Shortest & Longest Strings in an Array' excercise.\n\n";

	$strings = array(
	    'Now is the winter of our discontent',
	    'The love of money is the root of all evil',
	    'Absence makes the heart grow fonder',
	    'The readiness is all',
	    'Wherever you go, there you are'
	);

	$lengthStrings = array();
	foreach($strings as $string){
		//create an array with each string's length in
		array_push($lengthStrings, strlen($string));
	}

	print_r($strings);
	//the element of array $strings which corresponds to the element in array $lengthStrings with the largest/smallest value
	echo "The longest string is \"".$strings[array_search(max($lengthStrings), $lengthStrings)]."\" with ".max($lengthStrings)." characters and the shortest string is \"".$strings[array_search(min($lengthStrings), $lengthStrings)]."\" with ".min($lengthStrings)." characters.\n";

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 6 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 6 ----------------------------\n\n";

	echo "This is the 'Dozens of Donuts' exercise. \n \n";
	//get input from the user
	echo "Please enter the number of doughnuts you have: ";
	$doughnuts = intval(fgets(STDIN));
	$dozenCount = 0;

	//divide the doughnuts into dozens and store the remainder in $doughnuts
	while($doughnuts >= 12){
		$dozenCount++;
		$doughnuts -= 12;
	}

	//this chain is pretty self-explanatory
	if($dozenCount > 0 && $doughnuts > 1){
		echo "You have $dozenCount dozen and $doughnuts doughnuts.\n";
	}
	else if($dozenCount > 0 && $doughnuts == 0){
		echo "You have $dozenCount dozen doughnuts.\n";
	}
	else if($dozenCount <= 0 && $doughnuts > 0){
		echo "You have $doughnuts doughnuts.\n";
	}
	else {
		echo "You have $dozenCount dozen and $doughnuts doughnut.\n";
	}

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 7 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 7 ----------------------------\n\n";

	echo "This is the 'Prime Numbers' exercise. \n\n";

	echo "Please enter a number: ";
	//get an arbitrary number from the user
	$n = fgets(STDIN);
	//error handling
	while(!intval($n)){
		echo "That is not a number. Please enter a number: ";
		$n = fgets(STDIN);
	}
	//check if $n is even and not 2
	if (($n%2) == 0 && ($n != 2)){
		$isPrime = false;
	}
	//if $n is 1 or 2 or 3, it's prime, no question; I am not sure why the rest of the script does not handle these correctly
	else if(($n == 1) || ($n == 2) || ($n == 3)){
		$isPrime = true;
	}
	else{
		//iterate over the factors of a number up to its square root; sqrt() was throwing a warning so I used $n to the power of 1/2
		for($i = 2; $i <= pow($n, 1/2); $i++){
			//if the remainder is 0 then $i is a factor and $i is always greater than 2, so $n is not prime
			if(($n%$i) == 0){
				$isPrime = false;
				break;
			}
			//assuming the above never evaluates true, $n is prime
			else{
				$isPrime = true;
			}
		}
	}
	//output
	if($isPrime == false){
		echo "$n is not prime.\n";
	}
	else{
		echo "$n is prime.\n";
	}

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 8 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 8 ----------------------------\n\n";
	
	echo "This is the 'Darwin's Elephants' exercise.\n\n";

	//accept input from the user and assume a stable number of breeding pairs with no stragglers
	echo "Please enter the starting population of elephants. This must be a multiple of two: ";
	$numElephants = fgets(STDIN);
	while(!intval($numElephants) || ($numElephants%2) != 0){
		while(!intval($numElephants)){
			echo "That is not a number. Please enter a starting population of elephants. This must be a multiple of two: ";
			$numElephants = fgets(STDIN);
		}
		while(($numElephants%2) != 0){
			echo "That is not an even number. Please enter a starting population of elephants. This must be a multple of two: ";
			$numElephants = fgets(STDIN);
		}
	}

	//get the number of pairs based on the total number of elephants at time 0
	$numPairs = $numElephants/2;

	//iterate for roughly 500 years
	for($interval = 60; $interval <= 500; $interval+=60){
		//the number of breeding pairs each generation is the number of pairs in the previous generation plus three pairs
		$numPairs = $numPairs+($numPairs*3);
		//the number elephants is the number of pairs times two
		$numElephants = $numPairs*2;
		echo "Interval ".($interval/60)."\nElephants: ".$numElephants."\n"."Pairs: ".$numPairs."\n\n";
	}

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 9 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 9 ----------------------------\n\n";

	echo "This is the 'Letter Frequency Table' exercise.\n\n";

	//I converted this script into a function for its use in the script that follows
	$output = FrequencyTable(file_get_contents('http://www.gutenberg.org/cache/epub/1400/pg1400.txt'));
	echo "letterFrequency[0] is the alphabet; letterFrequency[1] is the corresponding frequencies in the sample text (Charles Dickens' Great Expectations).\n";
	print_r($output);

	function FrequencyTable($sampleText){
		//an alphabet array against which to compare
		$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		//characters to strip from the sample text
		$illegalChars = array(" ","\t","\n","\0","\x0B","\"","'",",",".","?","/",";",":","|","!","@","#","$","%","^","&","*","(",")","-","_","+","=","1","2","3","4","5","6","7","8","9","0");
		//strip out $illegalChars and convert to lowercase
		$sampleText = strtolower(str_replace($illegalChars, "", $sampleText));
		$frequency = array();
		//iterate over each letter of the alphabet
		for($i = 0; $i <= 25; $i++){
			//get the total number of each character
			$numChar = substr_count($sampleText, $alphabet[$i]);
			$y = 0;
			//generate a placeholder variable to throw into the array
			for($n = 0; $n <= ($numChar); $n++){
				$y++;
			}
			if($y == 0){
				array_push($frequency, $y);
			}
			else{
				$y = round(($y/strlen($sampleText))*100, 4);
				array_push($frequency, $y);
			}
		}
		$letterFrequency = array();
		array_push($letterFrequency, $alphabet, $frequency);
		//return two arrays: an alphabet array and an array of 26 elements with each letter's relative frequency, converted to percent
		return $letterFrequency;
	}

/////////////////////////////////////////////////////////////////////////////////
//		Code for Exercise 10 follows
/////////////////////////////////////////////////////////////////////////////////
echo "\n\n-------------------  Exercise 10 ----------------------------\n\n";
	
	echo "This is the 'Letter Frequency Decryption Program' exercise.\n\n";
	//this script is unfinished; I am still trying to figure out the solution
	$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$plaintextSortedFrequency = FrequencyAlphabet(file_get_contents('http://www.gutenberg.org/cache/epub/1400/pg1400.txt'));
	$ciphertextSortedFrequency = FrequencyAlphabet(file_get_contents('http://huco.artsrn.ualberta.ca/~dmckechn/secret.txt'));
	print_r($plaintextSortedFrequency);
	print_r($ciphertextSortedFrequency);
	foreach($plaintextSortedFrequency as $letter => $frequency){
		$match = ClosestNumber($frequency, $ciphertextSortedFrequency);
	}
	print_r($match);

	// functions ////////////////////////////////////////////////////////////////

	function FrequencyAlphabet($sampleText){
		$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$textFrequency = FrequencyTable($sampleText);
		$textFreqSort = array_keys($textFrequency[1]);
		$textFreqSort = array_flip(array_combine($textFrequency[1], $alphabet));
		return $textFreqSort;
	}

	/* declaring FrequencyTable() twice causes problems; included but commented out for completion's sake
	function FrequencyTable($sampleText){
		$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$illegalChars = array(" ","\t","\n","\0","\x0B","\"","'",",",".","?","/",";",":","|","!","@","#","$","%","^","&","*","(",")","-","_","+","=","1","2","3","4","5","6","7","8","9","0");
		$sampleText = strtolower(str_replace($illegalChars, "", $sampleText));
		$frequency = array();
		for($i = 0; $i <= 25; $i++){
			$numChar = substr_count($sampleText, $alphabet[$i]);
			$y = 0;
			for($n = 0; $n <= $numChar; $n++){
				$y++;
			}
			if($y == 0){
				array_push($frequency, $y);
			}
			else{
				$y = round(($y/strlen($sampleText))*100, 4);
				array_push($frequency, $y);
			}
		}
		$letterFrequency = array();
		array_push($letterFrequency, $alphabet, $frequency);
		return $letterFrequency;
	}
	

	//this function is unfinished
	function ClosestNumber($master, $search) { 
	    foreach($array1 as $label => $value){
	    	array_search($master[$value]) 
	    }
	} 
	*/

echo "</pre>";
?>