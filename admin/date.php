<?php

								$fridays = array();
								$fridays[0] = date('d',strtotime('first fri of this month'));
								$fridays[1] = $fridays[0] + 7;
								$fridays[2] =  $fridays[0] + 14;
								$fridays[3] =  $fridays[0] + 21;
								$fridays['last'] = date('d',strtotime('last fri of this month'));

								if($fridays[3] == $fridays['last']){
								  unset($fridays['last']);
								  $counter=4;
								}
								else {
								  $fridays[4] = $fridays['last'];
								  unset($fridays['last']);
								  $counter=5;
								  
								}
								
								print_r($counter);
								
								
								
								

?>
