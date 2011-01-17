<?php

    $body = "";
    $profile_url = $vars['entity']->profile_url;

	if ($profile_url) {
		$body .= '<div class="etis_widget_content">';
		$personVID = etis_extractPersonVID($profile_url);
		if ($personVID) {
			$parsed_url = 'https://www.etis.ee/portaal/isikuPublikatsioonid.aspx?PersonVID='.$personVID.'&lang=et';
			$data = mb_convert_encoding(file_get_contents($parsed_url), 'HTML-ENTITIES', 'UTF-8');

			$doc = new DOMDocument();
			$doc->loadHTML($data);

			$pubs = $doc->getElementById('ctl00_ContentPlaceHolder1_PortaalIsikuPublikatsioonid1_GridView1');
			$pubs_a = $pubs->getElementsByTagName('a');
			/*translation:Publications count*/
			$body .= '<div class="contentWrapper"><label>'.elgg_echo('etis:widget:label:pubs_count').': <a href="'.$profile_url.'" target="_blank">'.$pubs_a->length.'</a></label></div>';
			foreach ($pubs_a as $pub) {
				$body .= '<div class="contentWrapper">';
				$body .= $pub->nodeValue;
				$body .= '</div>';
			}
		}
		$body .= '</div>';
	}

	echo $body;
	unset($body);
?>
