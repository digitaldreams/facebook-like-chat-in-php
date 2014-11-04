<?php
class mytime{
	/**
	*This function will return difference between two dates
	*
	*Print this date in Human readable format.It will take timestamp
	*/
	public function dateDiffer($firstDate,$secondDate){
		$times= array();
		 $timeDiffer=$firstDate-$secondDate;
		 $day=$timeDiffer/86400;
		$times['day']=floor($day);
		   $hour=$timeDiffer%86400;
		   $hours=$hour/3600;//Now its time to convert those seconds into  hours.
		   $times['hour']=floor($hours);
			$min=$hour%3600;//There have some modulas of $hours those are minutes. we find by the modulas way.
	      $times['minute']=floor($min/60);
	     $sec=$min%60;//There have some seonds left wich is below 60 seconds.
	    $times['second']=floor($sec);
		return $times;
		
		}
		
		
		/**
		*In this function i like to show like facebook how many minutes or seocnd or days ago this post was posted
		*
		*It only take one argument of happing date of something which definately a past date.THen in this function i hold present date in a variable then start giving condition about what format it should return like 5days ago or 1 hours ago or 1 minutes ago or a few minutes ago
		*/
	public function timesAgo($givenTime){
		 $presentTime=time();
	
		 $difference=($presentTime - $givenTime);
		
		 if($difference<60){
			echo ($difference)." seconds ago";
			 
			 }
		elseif($difference>=60 && $difference<3600)
		{
			echo floor($difference/60) ." Minutes ago";
			
			}
		elseif($difference>=3600 && $difference<86400)
			{
			echo floor($difference/3600) ." Hours ago";
			
			}
		elseif($difference>=86400 && $difference<2592000)
			{
			echo floor($difference/86400) ." Days ago";
			
			}
		elseif($difference>=2592000 && $difference<31104000)
			{
			echo floor($difference/2592000) ." Months  ago";
			
			}
		elseif($difference>=31104000)
			{
			echo floor($difference/31104000) ." Years   ago";
			
			}
	
		}
	
	}//End of the datetime function
	
	
?>