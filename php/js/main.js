$(document).ready(function(){
		// ZeroClipboard.setMoviePath( 'js/vendor/ZeroClipboard.swf' );
        var clip = new ZeroClipboard($("#my-button"));;
        clip.setText( $("#link-text").val());

        clip.on( 'load', function ( client, args ) {
		  alert( "movie has loaded" );
		});

        clip.on('mouseDown', function (client) {
            // set text to copy here
            clip.setText($('#link-text').val());
            console.log($('#link-text').val());
            alert("mouse down"); 
        });

		clip.on( 'complete', function(client, args) {
		  this.style.display = 'none'; // "this" is the element that was clicked
		  alert("Copied text to clipboard: " + args.text );
		} );
        // clip.glue( 'view_copy' );
});