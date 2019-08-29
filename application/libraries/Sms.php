<?php
/**
 * Created by PhpStorm.
 * User: Gurubachan
 * Date: 7/20/2018
 * Time: 9:25 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Sms
{
	public function send($contact,$message){
		try{
			//Login User Id and Password
			$userId="atreya";
			$password="atreya@123";

			//Multiple mobiles numbers seperated by comma
			$mobileNumber = "$contact";

//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "GETOTP";

//Your message to send, Add URL endcoding here.
			$message = urlencode("$message");

//Assign Route here
//1 = PROMOTIONAL,  2 = TRANSACTIONAL
			$route = "7";

//Prepare you post parameters
			$postData = array(
				'route' => $route,
				'senderid' => $senderId,
				'destination' => $mobileNumber,
				'msgtxt' => $message
			);

//API URL
//		 $url="http://sms.cheapsmsindia.in/smsapi.aspx?userid=$userId&pwd=$password&route=$route&senderid=$senderId&destination=$mobileNumber&message=$message";
		 //$url="http://sms.thinksimple.co.in/vendorsms/pushsms.aspx?user=$userId&password=$password&msisdn=$contact&sid=$senderId&msg=$message&fl=0&gwid=2";
            $url = "http://sms.thinksimple.co.in/app/smsapi/index.php?key=55D5CD033A32F6&campaign=8168&routeid=$route&type=text&contacts=$contact&senderid=$senderId&msg=$message";
// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
				//,CURLOPT_FOLLOWLOCATION => true
			));

//get response
			$output = curl_exec($ch);

			curl_close($ch);

			return $output;
		}catch (Exception $exception){
			echo "Message : ".$exception->getMessage();
		}
	}
}
