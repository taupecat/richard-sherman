<?php
/**
 * @package Richard_Sherman
 * @version 1.0
 */
/*
Plugin Name: Richard Sherman
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Because when you make the game-clinching interception in the end zone, you just have to go berserk on national TV.
Author: Tracy Rotton
Version: 1.0
Author URI: http://taupecat.com/
*/

function richard_sherman_get_interview() {
	/** This is the transcript of Richard Sherman's interview immediately following
		the Seahawks' victory in the NFC championship game. */
	$interview = "Well I'm the best corner in the game!
When you try me with a sorry receiver like Crabtree
That's the result you gonna get
Don't you ever talk about me
Don't you open your mouth about the best
Or I'm going to shut it real quick
LOB";

	// Here we split it into lines
	$interview = explode( "\n", $interview );

	// And then randomly choose a line
	return wptexturize( $interview[ mt_rand( 0, count( $interview ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function richard_sherman() {
	$chosen = richard_sherman_get_interview();
	echo "<p id='richardsherman'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'richard_sherman' );

// We need some CSS to position the paragraph
function richardsherman_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#richardsherman {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'richardsherman_css' );

?>
