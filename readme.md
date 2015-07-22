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
    
    <?php
    
    /**
     * This is iCalParse
     *
     * @category Parser
     * @author   Timo Henke <phpstuff@thenke.de>
     * @license  http://www.opensource.org/licenses/mit-license.php  MIT License
     */
    
    	class iCalParse
    	{
    		const VERSION = "1.0";
    
    		public function doParse( $data )
    		{
    			$lines = preg_split('/\\r?\
    /',$data,-1, PREG_SPLIT_NO_EMPTY);
        		if( preg_match('/^BEGIN:VCALENDAR/i',$lines[0]) && preg_match('/^END:VCALENDAR/i',$lines[sizeof($lines)-1]) )
        		{
    				$res = array();
    				$addTo = array();
    				$addToElement = '';
    				foreach ($lines as $line)
    				{
    					if( preg_match('/^(BEGIN|END):(VTODO|VEVENT|VCALENDAR|DAYLIGHT|VTIMEZONE|STANDARD)/s',$line,$m) )
    					{
    						switch( $m[1] )
    						{
    							case 'BEGIN' :
    								$addTo[] = trim( (sizeof($addTo) > 0 ? $addTo[sizeof($addTo)-1] : '') . '/' . $m[2],'/');
    								break;
    							case 'END' :
    								array_pop($addTo);
    								break;
    						}
    						if( sizeof($addTo) > 0 )
    						{
    							$addToElement = $addTo[sizeof($addTo)-1];
    						}
    					}
    					else
    					{
    						if( substr($line,0,1) != ' ' )
    						{
    			                list($lastkey,$value) = $this->splitKeyValue($line);
    							$this->arrayPathSet($res,$addToElement.'/'.$lastkey,$value);
    
    						}
    						else
    						{
    							$this->arrayPathSet($res,$addToElement.'/'.$lastkey,$this->arrayPathGet($res,$addToElement.'/'.$lastkey) . substr($line,1));
    						}
    					}
    				}
       			}
       			return $res;
    		}
    
    		function arrayPathSet(&$a, $path, $value)
    		{
    			$p = explode('/',$path);
    			$key = array_shift($p);
    			if (empty($p))
    			{
    				$a[$key] = $value;
    			}
    			else
    			{
    				if (!isset($a[$key]) || !is_array($a[$key]))
    				{
    					$a[$key] = array();
    				}
    				$this->arrayPathSet($a[$key], implode('/',$p), $value);
    			}
    		}
    
    		function arrayPathGet($data, $path)
    		{
    			$found = true;
    			$path = explode("/", trim($path,'/'));
    			$r = count($path);
    			for( $x = 0; ($x < $r && $found); $x++ )
    			{
    				$key = $path[$x];
    				if (isset($data[$key]))
    				{
    					$data = $data[$key];
    				}
    				else
    				{
    					$found = false;
    				}
    			}
    			return $found ? $data : false;
    		}
    
    		public function splitKeyValue( $row )
    		{
    			preg_match("/([^:]+)[:]([\\w\\W]*)/", $row, $matches);
    			return (sizeof($matches) == 0) ? false : array_splice($matches, 1, 2);
    	}
    
    	}
    "
        }
      }
    }
