<?php
 
    // Initialize 
    elgg_register_event_handler('init', 'system', 'etis_init');

    function etis_init() {
        // Register ETIS widget 
		elgg_register_widget_type('etis_publications',
			/*translation:ETIS publications*/
			elgg_echo('etis:widget:title:etis_publications'),
			/*translation:Shows publications in ETIS.*/
			elgg_echo('etis:widget:description:etis_publications')
		);
        // Extend CSS
		elgg_extend_view('css/elgg', 'etis/css');
        // Add suppression setting to config (use false to log errors)
        elgg_set_config('etis:libxml_use_internal_errors', true);
	}
