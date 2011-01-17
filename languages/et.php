<?php

    $et_translation = array(

    
        /* 
        File: /etis/views/default/widgets/etis_publications/edit.php
        Lines: 5
        Text: ETIS profile URL
        _missing_translation_
        */
        "etis:widget:etis_profile_url" => "ETIS profile URL",
        
        /* 
        File: /etis/start.php
        Lines: 6
        Text: ETIS publications
        _missing_translation_
        */
        "etis:widget:title:etis_publications" => "ETIS publications",
        
        /* 
        File: /etis/start.php
        Lines: 8
        Text: Shows publications in ETIS.
        _missing_translation_
        */
        "etis:widget:description:etis_publications" => "Shows publications in ETIS.",
        
        /* 
        File: /etis/views/default/widgets/etis_publications/view.php
        Lines: 19
        Text: Publications count
        _missing_translation_
        */
        "etis:widget:label:pubs_count" => "Publications count",
        
    );

    if ( function_exists("add_translation") ) {
        add_translation("et",$et_translation);
    }

?>