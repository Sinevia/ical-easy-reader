<?php
header( 'Content-Type: text/plain; charset=UTF-8' );
include ( 'iCalEasyReader.php' );
$ical = new iCalEasyReader();
$lines = $ical->load( file_get_contents( 'simple2.ics' ) );

var_dump( $lines );
