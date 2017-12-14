<?php
class Numbertime{
  private $timezone = 'Asia/Jakarta';
  public function timestamp_to_time($timestamp,$format = 'Y-m-d H:i:s'){
		$dt = new DateTime('@'.$timestamp);
		$dt->setTimeZone(new DateTimeZone($this->timezone));
    return $dt->format($format);
  }

  public function time_to_timestamp(){

  }
}