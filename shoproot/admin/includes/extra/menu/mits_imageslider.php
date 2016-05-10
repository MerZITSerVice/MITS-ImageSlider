<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
	
	defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

	//BOX_HEADING_TOOLS = Name der box in der der neue Menueeintrag erscheinen soll
	$add_contents[BOX_HEADING_TOOLS][] = array( 
		'admin_access_name' => 'mits_imageslider',   	//Eintrag fuer Adminrechte
		'filename' 			=> 'mits_imageslider.php',  //Dateiname der neuen Admindatei
		'boxname' 			=> MITS_BOX_IMAGESLIDER,    //Anzeigename im Menue
		'parameter'			=> '',                  //zusaetzliche Parameter z.B. 'set=export'
		'ssl' 				=> ''                   //SSL oder NONSSL, kein Eintrag = NONSSL
	);

?>