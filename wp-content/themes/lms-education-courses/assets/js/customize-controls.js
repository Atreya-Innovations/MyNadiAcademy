( function( api ) {

	// Extends our custom "lms-education-courses" section.
	api.sectionConstructor['lms-education-courses'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );