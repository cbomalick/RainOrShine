<?php

class Visitor {

	public function __construct()
	{
		//Get location
		$this->ipAddress = $_SERVER['REMOTE_ADDR'];
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$this->ipAddress"));
		$this->city = $geo["geoplugin_city"];
		$this->state = $geo["geoplugin_regionCode"];
		$this->latitude = $geo["geoplugin_latitude"];
		$this->longitude = $geo["geoplugin_longitude"];

		//Get time and timezone
		$this->timezone = $geo["geoplugin_timezone"];
		date_default_timezone_set($this->timezone);
		$this->timestamp = date("g:ia F jS Y");

		//Get weather
		$config = parse_ini_file('src/config.ini');
        $API_KEY = $config['weather_api_key'];
		$url = 'https://api.openweathermap.org/data/2.5/onecall?units=imperial&lat='.$this->latitude.'&lon='.$this->longitude.'&exclude=minutely,hourly&appid=' . $API_KEY;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response=json_decode($response_json, true);

		$this->temp = round($response['current']['temp']);
		$this->description = $response['current']['weather'][0]['main'];
		$this->icon = 'http://openweathermap.org/img/wn/'.$response['current']['weather'][0]['icon'].'@2x.png';
		$this->tempMin = round($response['daily'][0]['temp']['min']);
		$this->tempMax = round($response['daily'][0]['temp']['max']);
		$this->humidity = $response['current']['humidity'];

		Echo json_encode($this);

		// Echo"<pre>";
		// var_dump($response['daily'][0]['temp']['max']);
		// Echo"</pre><br><br>";

	}
}

?>