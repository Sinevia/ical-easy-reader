## iCalEasyReader ##
Usage:
----------

    <?php
    header( 'Content-Type: text/plain; charset=UTF-8' );
    include ( 'iCalEasyReader.php' );
    $ical = new iCalEasyReader();
    $lines = $ical->load( file_get_contents( 'example2.ics' ) );
    var_dump( $lines );
    ?>

Output:
----------

    array(4) {
      ["PRODID"]=>
      string(48) "-//Mozilla.org/NONSGML Mozilla Calendar V1.1//EN"
      ["VERSION"]=>
      string(3) "2.0"
      ["VTIMEZONE"]=>
      array(3) {
        [0]=>
        array(2) {
          ["TZID"]=>
          string(13) "Europe/Berlin"
          ["X-LIC-LOCATION"]=>
          string(13) "Europe/Berlin"
        }
        ["DAYLIGHT"]=>
        array(1) {
          [0]=>
          array(5) {
            ["TZOFFSETFROM"]=>
            string(5) "+0100"
            ["TZOFFSETTO"]=>
            string(5) "+0200"
            ["TZNAME"]=>
            string(4) "CEST"
            ["DTSTART"]=>
            string(15) "19700329T020000"
            ["RRULE"]=>
            array(3) {
              ["FREQ"]=>
              string(6) "YEARLY"
              ["BYDAY"]=>
              string(4) "-1SU"
              ["BYMONTH"]=>
              string(1) "3"
            }
          }
        }
        ["STANDARD"]=>
        array(1) {
          [0]=>
          array(5) {
            ["TZOFFSETFROM"]=>
            string(5) "+0200"
            ["TZOFFSETTO"]=>
            string(5) "+0100"
            ["TZNAME"]=>
            string(3) "CET"
            ["DTSTART"]=>
            string(15) "19701025T030000"
            ["RRULE"]=>
            array(3) {
              ["FREQ"]=>
              string(6) "YEARLY"
              ["BYDAY"]=>
              string(4) "-1SU"
              ["BYMONTH"]=>
              string(2) "10"
            }
          }
        }
      }
      ["VEVENT"]=>
      array(1) {
        [0]=>
        array(9) {
          ["CREATED"]=>
          string(16) "20140107T092011Z"
          ["LAST-MODIFIED"]=>
          string(16) "20140107T121503Z"
          ["DTSTAMP"]=>
          string(16) "20140107T121503Z"
          ["UID"]=>
          string(36) "20f78720-d755-4de7-92e5-e41af487e4db"
          ["SUMMARY"]=>
          string(11) "Just a Test"
          ["DTSTART"]=>
          array(2) {
            ["value"]=>
            string(15) "20140102T110000"
            ["TZID"]=>
            string(13) "Europe/Berlin"
          }
          ["DTEND"]=>
          array(2) {
            ["value"]=>
            string(15) "20140102T120000"
            ["TZID"]=>
            string(13) "Europe/Berlin"
          }
          ["X-MOZ-GENERATION"]=>
          string(1) "4"
          ["DESCRIPTION"]=>
          &string(2298) "Here is a new Class:
    