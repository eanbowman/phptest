/* main.js
 * Functions which support the simple PHP test
 */

function getColor( color ) {
	$.ajax({
		data: 'color=' + color,
		url: "votes.php",
		dataType: 'JSON',
		context: document.body
	}).done(function(data) {
		numVotes = 0;
		if( typeof data != 'undefined' && data.votes != null ) numVotes = data.votes;
		$( '.votes.'+color ).text( parseInt(numVotes) );
	});
}

function getTotal() {
	var runningTotal = 0;
	$( '.votes' ).each(function( index ) {
		currentVotes = parseInt($(this).text())
		if( currentVotes ) runningTotal += currentVotes;
		console.log( runningTotal );
	});

	$('td.total').text( runningTotal );
}

