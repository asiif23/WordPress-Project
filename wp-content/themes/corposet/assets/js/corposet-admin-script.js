( function ( $ ) {
	$( document ).ready( function () {
		$( '.corposet-btn-get-started' ).on( 'click', function ( e ) {
			e.preventDefault();
			$( this )
				.html( 'Processing.. Please wait' )
				.addClass( 'updating-message' );
			$.post(
				corposet_ajax_object.ajax_url,
				{ action: 'install_act_plugin' },
				function ( response ) {
					location.href =
						'customize.php?corposet_notice=dismiss-get-started';
				}
			);
		} );
	} );

	$( document ).on(
		'click',
		'.notice-get-started-class .notice-dismiss',
		function () {
			// Read the "data-notice" information to track which notice
			// is being dismissed and send it via AJAX
			const type = $( this )
				.closest( '.notice-get-started-class' )
				.data( 'notice' );
			// Make an AJAX call
			$.ajax( ajaxurl, {
				type: 'POST',
				data: {
					action: 'corposet_dismissed_notice_handler',
					type,
				},
			} );
		}
	);
} )( jQuery );
