<?php

    $body = "";
    $profile_url = $vars['entity']->profile_url;

	if ($profile_url) {
		// Construct ETISPublications object
		$etis_publications = new ETISPublications($profile_url);

		$body .= '<div class="etis_widget_content">';
		if ($etis_publications->getPersonVID()) {
            $body .= "<ul class=\"elgg-list elgg-list-entity\">";
			/*translation:Publications count*/
			$body .= '<li class="elgg-item"><label>'.elgg_echo('etis:widget:label:pubs_count').': <a href="'.$etis_publications->getProfileURL().'" target="_blank">'.$etis_publications->getPubsCount().'</a></label></li>';
			foreach ($etis_publications->getPubs() as $pub) {
				$body .= "<li class=\"elgg-item\">";
				$body .= $pub;
				$body .= "</li>";
			}
            $body .= "</ul>";
		}
		$body .= '</div>';
	}

	echo $body;
	unset($body);
?>
