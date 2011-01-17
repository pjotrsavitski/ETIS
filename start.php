<?php

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

	function etis_extractPersonVID($uri) {
		if(preg_match('#PersonVID=([^&]+)#i', $uri, $vid)) {
			if (is_array($vid) && sizeof($vid)>1) {
				return $vid[1];
			}
		}
		return "";
	}

?>
