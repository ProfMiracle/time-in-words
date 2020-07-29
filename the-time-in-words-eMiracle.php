<?php

$initialTime = "01:54";



class checkTime
{
    private $hour;
    private $minute;

    public function __construct($initialTime)
    {
        $Time = explode(':', $initialTime);
        $this->hour = intval($Time[0]);
        $this->minute = intval($Time[1]);
    }

    private function hour($hour=NULL)
    {
        if ($hour==NULL) {
            $hour = $this->hour;
        }

        $hourArray = array(NULL, 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve');
        $hour = $hourArray[$hour];
        return $hour;
    }

    private function minute()
    {
        $min = 60;
        if (($this->minute)>30) 
        {
            $minute = $min - ($this->minute);
        }
        else
        {
            $minute = $this->minute;
        }

        if($minute !=0)
        {
            $minuteArray = array(NULL, 'one minute', 'two minutes', 'three minutes', 'four minutes', 'five minutes', 'six minutes', 'seven minutes', 'eight minutes', 'nine minutes',
                            'ten minutes', 'eleven minutes', 'twelve minutes', 'thirteen minutes', 'fourtheen minutes', 'quater', 'sixteen minutes', 'seventeen minutes', 'eighteen minutes',
                            'nineteen nimutes', 'twenty minutes', 'twenty one minutes', 'twenty two minutes', 'twenty three minutes', 'twenty four minutes', 'twenty five minutes', 'twenty six minutes',
                        'twenty seven minutes', 'twenty eight minutes', 'twenty nine minutes', 'half');
        return $minuteArray[$minute];
        }
        else{
            return '';
        }
    }

    public function time()
    {
        $hour = $this->hour($this->hour);
        $minute = $this->minute($this->minute);

        if($this->minute == 0)
        {
            $suffix = '';
        }
        elseif($this->minute>30)
        {
            $suffix = 'to';
        }
        else
        {
            $suffix = 'past';
        }

        switch ($suffix) 
        {
            case 'to':
                $hour = $this->hour($this->hour + 1);
                return $minute. ' '. $suffix. ' '.$hour;
                break;
            case 'past':
                return $minute. ' '. $suffix. ' '.$hour;
                break;
                    
            default:
                return $hour. ' o\' clock';
                break;
        }
    }
}

$check = new checkTime($initialTime);
echo $check->time();