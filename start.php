<?php

    require_once('classes/etis_publications.php');

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
