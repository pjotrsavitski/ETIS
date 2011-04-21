<?php

    // Getting ready for 1.8 that includes autoloading classes
    // Make a manu al load only if dealign with version prior to 1.8
    if (get_version()<2011032200) {
        if (!class_exists('ETISPublications')) {
		    require_once(dirname(__FILE__).'/classes/ETISPublications.php');
	    }
	}

    function etis_init() {
		add_widget_type('etis_publications',
			/*translation:ETIS publications*/
			elgg_echo('etis:widget:title:etis_publications'),
			/*translation:Shows publications in ETIS.*/
			elgg_echo('etis:widget:description:etis_publications')
		);
		extend_view('css', 'etis/css');
		// Extend 'profile/userdetails' with own view to extend profile with information
	}

    // Initialize
    register_elgg_event_handler('init', 'system', 'etis_init');

?>
