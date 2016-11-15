<?php
header( 'Content-Type: text/plain; charset=UTF-8' );
include ( 'iCalEasyReader.php' );
$ical = new iCalEasyReader();
$lines = $ical->load( file_get_contents( __DIR__.'/google_3.ics' ) );

echo json_encode( $lines );
//var_dump( $lines );
