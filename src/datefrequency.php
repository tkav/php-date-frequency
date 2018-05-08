<?php
// Date Frequency Calculator and Public Holiday Checker
// By Tom Kavanagh https://github.com/tkav/php-date-frequency

class DateFrequency {
  
  public static function nextOccurrence($date, $x, $interval, $preference = 'none', $format = 'Y-m-d') {    
    $add = '+ '.$x.' '.$interval;
    $date = new DateTime($date);
    $date->modify($add);
    if ($preference <> 'none') {
      $date->format('m');
      $date->modify($preference.' of this month')->format($format);
    }
    $response = $date->format($format);
    return $response;
  }
  
}

class publicHoliday {

  public static function datastore($query, $resource_id = '253d63c0-af1f-4f4c-b8d5-eb9d9b1d46ab')
  {
      $parameters = $resource_id.'&q='.$query;
      $url  = 'https://data.gov.au/api/3/action/datastore_search?resource_id=' . $parameters;
      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL            => $url,
          CURLOPT_HEADER         => false,
          CURLOPT_SSL_VERIFYPEER => true,
          CURLOPT_RETURNTRANSFER => true,
      ));

      $response = curl_exec($curl);

      if ($error = curl_error($curl)) {
          return false;
      }

      curl_close($curl);
      $response = json_decode($response, true);

      if (!$response) {
          return false;
      }
      
      return $response;
  }
  
  public static function isHoliday($date) {
    $timestamp = strtotime($date);
    $date = date("Ymd", $timestamp);
    $check = self::datastore($date);
    if(empty($check["result"]["records"][0])){
      $holiday = 'false';
    } else {
      $holiday = 'true';
    }
    return $holiday;
  }
  
  public static function holidayName($date) {
    $timestamp = strtotime($date);
    $date = date("Ymd", $timestamp);
    $check = self::datastore($date);    
    if(empty($check["result"]["records"][0]["Holiday Name"])){
      $result = 'Unavailable';
    } else {
      $result = $check["result"]["records"][0]["Holiday Name"];
    }
    return $result;
  }
  
}

?>