<?php 
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

$fp = fopen('runthis.txt', 'r+');
fwrite($fp, 'Cats chase mice');
fclose($fp);

// write this to another file and see if you can compile and run that file
$textcase1= "class sayHi{ 
	 public static void main(String[] args) {
        // test cases
        String name1 = "nish";
        String name2 = "eric";
        String name3 = "gus";
        
        sayHi(name1);
        sayHi(name2);
        sayHi(name3);
    }
   public static void sayHi(String name1)
    { " 

    . $post. "}}"



	// Simple compile of .java
	exec('javac hello.java');

	// Attempting to get .java to run
	exec('java sayHi', $output);
	print_r($output);

	$hi = "hey";
	$hi2 = "please work";
	


	// for ($x = 0; $x < 4; $x++) 
	// {
 //    print "$output[x]";
	// }


	// if ($output[1] == $hi2) 
	// {
	// 	echo "this works";
	// } 

 

	echo "COME ON WORK!!!!!\n";
	
?>