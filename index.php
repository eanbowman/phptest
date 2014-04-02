<?php
/* PHP Quick Test
 *
 * Create a web page in PHP that uses the two MySQL tables above “Colors” and “Votes”. 
 * The left column should be populated from reading all the entries in the Colors table. 
 * The colors should be links, so that when you click on it, an Ajax call populates the Votes 
 * (obtained from MySQL) in the right column next to the color. 
 * When Clicking on “Total”, use JavaScript only (no server involvement) to add up and present the 
 * totals shown. 
 * Write something that you would feel comfortable shipping & maintaining.
 */

require_once('database.php');

/* Get colors */
$colors = $db->query( 'SELECT * FROM `colors`' );

/* Build view for colors */
$output = '';
foreach( $colors as $color ) {
	if( $color != '' ) $output .= '<tr><th class="color"><a href="javascript:getColor(\'' . $color['color'] . '\')">' . $color['color'] . '</a></th><td class="votes ' . $color['color'] . '"></td></tr>';
}


?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="container">
			<h1>Colors</h1>
			<p>Click on the color name to see how many voted for that color.<br>When you do click on TOTAL, the sum of the above numbers will show.</p>
			<table class="colorListing">
				<tr><th class="column">Color</th><th class="column">Votes</th></tr>
				<?php echo $output; ?>
				<tr><th class="total"><a href="javascript:getTotal();">TOTAL</a></th><td class="total"></td></tr>
			</table>
	    </div>
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
