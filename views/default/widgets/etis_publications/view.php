<?php

    $body = "";
    $profile_url = $vars['entity']->profile_url;

	if ($profile_url) {
		// Construct ETISPublications object
		$etis_publications = new ETISPublications($profile_url);

		$body .= '<div class="etis_widget_content">';
		if ($etis_publications->getPersonVID()) {
			/*translation:Publications count*/
			$body .= '<div class="contentWrapper"><label>'.elgg_echo('etis:widget:label:pubs_count').': <a href="'.$etis_publications->getProfileURL().'" target="_blank">'.$etis_publications->getPubsCount().'</a></label></div>';
			foreach ($etis_publications->getPubs() as $pub) {
				$body .= '<div class="contentWrapper">';
				$body .= $pub;
				$body .= '</div>';
			}
		}
		$body .= '</div>';
	}

	echo $body;
	unset($body);
?>
