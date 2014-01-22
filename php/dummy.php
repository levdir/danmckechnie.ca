<?php
	/*
	Modify the Letter Frequency Table' program listed above to try to decrypt the following secret message 
	that has been encrypted with a simple substitution cipher. Have your program count the occurrences of 
	each letter in the encrypted message. If you can sort your letter frequency table (from the previous 
	exercise) in descending order and then sort your frequency table from the encrypted text below in 
	descending order, you should have an almost one-to-one match. Next, build a "translation hash" 
	that will convert each encrypted letter back into its plaintext form. Your program may not perform 
	the decryption process perfectly, but how close can you get? Can you explain the various decryption 
	"errors" that happen? (Perhaps surprisingly, there might be multiple causes for these errors.)
	*/
	$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$plaintextSortedFrequency = FrequencyAlphabet(file_get_contents('http://www.gutenberg.org/cache/epub/1400/pg1400.txt'));
	$ciphertextSortedFrequency = FrequencyAlphabet(file_get_contents('http://huco.artsrn.ualberta.ca/~dmckechn/secret.txt'));
	print_r($plaintextSortedFrequency);
	print_r($ciphertextSortedFrequency);
	foreach($plaintextSortedFrequency as $letter => $frequency){
		$match = closest($frequency, $ciphertextSortedFrequency);
	}
	print_r($match);
	// functions //////////////////////////////////////////////////////////////////////////

	function FrequencyAlphabet($sampleText){
		$alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$textFrequency = FrequencyTable($sampleText);
		$textFreqSort = array_keys($textFrequency[1]);
		$textFreqSort = array_flip(array_combine($textFrequency[1], $alphabet));
		return $textFreqSort;
	}

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

	// this function was found on a forum; I know it's kind of cheating but it seems like something that ought to be php already
	function ClosestNumber($master, $search) { 
	    foreach($array1 as $label => $value){
	    	array_search($master[$value], 
	    }
	} 
?>