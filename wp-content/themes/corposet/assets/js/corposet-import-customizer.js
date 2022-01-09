( function ( api ) {
	api.sectionConstructor.corposet_import_section = api.Section.extend( {
		// No events for this type of section.
		attachEvents() {},

		// Always make the section active.
		isContextuallyActive() {
			return true;
		},
	} );
} )( wp.customize );
