<?php 
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

// $fp = fopen('runthis.txt', 'r+');
// fwrite($fp, 'Cats chase mice');
// fclose($fp);

// $post="public static void sayHi(String name1)
//     {
//         System.out.println(\"I want to say hi to " + name1 + "!");
//     }";

// write this to another file and see if you can compile and run that file
// $textcase1= "class sayHi{ 
// 	 public static void main(String[] args) {
//         // test cases
//         String name1 = "nish";
//         String name2 = "eric";
//         String name3 = "gus";
        
//         sayHi(name1);
//         sayHi(name2);
//         sayHi(name3);
//     }
//    " 

//     . $post . '}';

	$testcases = [1 => 'nishant', 2 => 'ricP', 3 => 'gusboom'];



	/* THIS BLOCK works */
	// Simple compile of .java
	exec('javac hello.java');
	
	$out=shell_exec("java hello $testcases[1]");
	echo "<pre>$out</pre>";
	
	$out=shell_exec("java hello $testcases[2]");
	echo "<pre>$out</pre>";
	
	$out=shell_exec("java hello $testcases[3]");
	echo "<pre>$out</pre>";


	// Attempting to get .java to run
	// exec('java hello', $output);
	// print_r($output);

	
?>