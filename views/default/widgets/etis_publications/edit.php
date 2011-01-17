<?php

    $body = "";
    /*translation:ETIS profile URL*/
    $body .= elgg_echo('etis:widget:etis_profile_url');
	$body .= elgg_view('input/text', array('internalname' => 'params[profile_url]', 'value' => $vars['entity']->profile_url));

	echo $body;
	unset($body);
?>
