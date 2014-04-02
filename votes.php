<?php
/* votes.php
 * Returns a JSON-encoded votes array
 */

require_once( 'database.php' );

/* Get votes */
$color = $_REQUEST['color'];
$votes = null;

if( $stmt = $db->prepare( 'SELECT `color`, SUM(`votes`) as `votes` FROM `votes` WHERE `color`=? GROUP BY `color`' ) ) {
	$stmt->bind_param("s", $color);
	$stmt->execute();
	$stmt->bind_result($c, $votes);
	$stmt->fetch();
	$stmt->close();
}

//header( 'Content-type: application/json' );
echo json_encode( array( 'votes' => $votes ) );
