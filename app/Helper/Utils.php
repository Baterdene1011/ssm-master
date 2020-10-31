<?php

function getUID() {
    return time() . str_shuffle(str_shuffle(substr((time() * rand()), 0, 6)));
}

function getUIDAdd($k) {
    return ((time() + $k) . str_shuffle(str_shuffle(substr((time() * rand()), 0, 6)))) + $k;
}

function currentDate($format = 'Y-m-d H:i:s') {
    return date($format);
}

function dateFormatter($date, $format = 'Y-m-d') {
    return !empty($date) ? date($format, strtotime($date)) : '';
}

function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

function getMimetypeByExtension($extension) {
    $mimes = array(	
        'hqx'	=>	'application/mac-binhex40',
        'cpt'	=>	'application/mac-compactpro',
        'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
        'bin'	=>	'application/macbinary',
        'dms'	=>	'application/octet-stream',
        'lha'	=>	'application/octet-stream',
        'lzh'	=>	'application/octet-stream',
        'exe'	=>	array('application/octet-stream', 'application/x-msdownload'),
        'class'	=>	'application/octet-stream',
        'psd'	=>	'application/x-photoshop',
        'so'	=>	'application/octet-stream',
        'sea'	=>	'application/octet-stream',
        'dll'	=>	'application/octet-stream',
        'oda'	=>	'application/oda',
        'pdf'	=>	array('application/pdf', 'application/x-download'),
        'ai'	=>	'application/postscript',
        'eps'	=>	'application/postscript',
        'ps'	=>	'application/postscript',
        'smi'	=>	'application/smil',
        'smil'	=>	'application/smil',
        'mif'	=>	'application/vnd.mif',
        'wbxml'	=>	'application/wbxml',
        'wmlc'	=>	'application/wmlc',
        'dcr'	=>	'application/x-director',
        'dir'	=>	'application/x-director',
        'dxr'	=>	'application/x-director',
        'dvi'	=>	'application/x-dvi',
        'gtar'	=>	'application/x-gtar',
        'gz'	=>	'application/x-gzip',
        'php'	=>	'application/x-httpd-php',
        'php4'	=>	'application/x-httpd-php',
        'php3'	=>	'application/x-httpd-php',
        'phtml'	=>	'application/x-httpd-php',
        'phps'	=>	'application/x-httpd-php-source',
        'js'	=>	'application/x-javascript',
        'swf'	=>	'application/x-shockwave-flash',
        'sit'	=>	'application/x-stuffit',
        'tar'	=>	'application/x-tar',
        'tgz'	=>	array('application/x-tar', 'application/x-gzip-compressed'),
        'xhtml'	=>	'application/xhtml+xml',
        'xht'	=>	'application/xhtml+xml',
        'zip'	=>  array('application/x-zip', 'application/zip', 'application/x-zip-compressed'),
        'mid'	=>	'audio/midi',
        'midi'	=>	'audio/midi',
        'mpga'	=>	'audio/mpeg',
        'mp2'	=>	'audio/mpeg',
        'mp3'	=>	array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
        'aif'	=>	'audio/x-aiff',
        'aiff'	=>	'audio/x-aiff',
        'aifc'	=>	'audio/x-aiff',
        'ram'	=>	'audio/x-pn-realaudio',
        'rm'	=>	'audio/x-pn-realaudio',
        'rpm'	=>	'audio/x-pn-realaudio-plugin',
        'ra'	=>	'audio/x-realaudio',
        'rv'	=>	'video/vnd.rn-realvideo',
        'wav'	=>	array('audio/x-wav', 'audio/wave', 'audio/wav'),
        'bmp'	=>	array('image/bmp', 'image/x-windows-bmp'),
        'gif'	=>	'image/gif',
        'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
        'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
        'jpe'	=>	array('image/jpeg', 'image/pjpeg'),
        'png'	=>	array('image/png',  'image/x-png'),
        'tiff'	=>	'image/tiff',
        'tif'	=>	'image/tiff',
        'css'	=>	'text/css',
        'html'	=>	'text/html',
        'htm'	=>	'text/html',
        'shtml'	=>	'text/html',
        'txt'	=>	'text/plain',
        'text'	=>	'text/plain',
        'log'	=>	array('text/plain', 'text/x-log'),
        'rtx'	=>	'text/richtext',
        'rtf'	=>	'text/rtf',
        'xml'	=>	'text/xml',
        'xsl'	=>	'text/xml',
        'mpeg'	=>	'video/mpeg',
        'mpg'	=>	'video/mpeg',
        'mpe'	=>	'video/mpeg',
        'qt'	=>	'video/quicktime',
        'mov'	=>	'video/quicktime',
        'avi'	=>	'video/x-msvideo',
        'movie'	=>	'video/x-sgi-movie',
        'word'	=>	array('application/msword', 'application/octet-stream'),
        'doc'	=>	'application/msword',
        'docx'	=>	array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip'),
        'xls'	=>	array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
        'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip'),
        'ppt'	=>	array('application/powerpoint', 'application/vnd.ms-powerpoint'),
        'xl'	=>	'application/excel',
        'eml'	=>	'message/rfc822',
        'json'      => array('application/json', 'text/json')
    );
        
    if (!isset($mimes[$extension])) {
        $mime = 'application/octet-stream';
    } else {
        $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
    }

    return $mime;    
}

function postRest($endpoint, $params = '') {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => config('app.restUrl') . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POST => true, 
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HEADER => false, 
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        )
    ));    
    
    $response = curl_exec($curl);       
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        return [
            'status' => 'error',
            'message' => $err
        ];
    } else {
        return json_decode($response, true);
    }    
}

function postRestToken($endpoint, $params = '') {
    // $getToken = postRest('login', array(
    //     'email' => session('authemail'),
    //     'password' => session('authpassword'),
    // ));
    
    // $token = '';
    // if ($getToken['status'] == 'success') {
    //     $token = $getToken['token'];
    // }
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => config('app.restUrl') . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POST => true, 
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HEADER => false, 
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        //     'Authorization: Bearer ' . $token,
        )
    ));    
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        return [
            'status' => 'error',
            'message' => $err
        ];
    } elseif (!isJson($response)) {
        return [
            'status' => 'error',
            'message' => $response
        ];           
    } else {
        return json_decode($response, true);
    }    
}

function getRestToken($endpoint, $token) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => config('app.restUrl') . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HEADER => false, 
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        )
    ));    
    
    $response = curl_exec($curl);       
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        return [
            'status' => 'error',
            'message' => $err
        ];
    } elseif (!isJson($response)) {
        return [
            'status' => 'error',
            'message' => $response
        ];        
    } else {
        return [
            'status' => 'success',
            'result' => json_decode($response, true)
        ];
    }    
}

class Date
{

    public static function format($format, $datetime, $translate = false) 
    {
        if (empty($datetime)) {
            return null;
        }
        $datetime = str_replace(
                    array("+", "T", "00:00:00 08:00", "00:00:00 09:00", "00:00:00 01:00"), 
                    array(" ", " ", "00:00:00",   "00:00:00" , "00:00:00"), $datetime);
        $date = new DateTime($datetime);
        $date = $date->format($format);
        
        if ($translate && class_exists('Language')) {
            $date = str_replace(
                    array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"), 
                    array(Lang::line('date_monday'), Lang::line('date_tuesday'), Lang::line('date_wednesday'), Lang::line('date_thursday'), 
                        Lang::line('date_friday'), Lang::line('date_saturday'), Lang::line('date_sunday')), 
                    $date);

            $date = str_replace(
                    array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"), 
                    array(Lang::line('date_january'), Lang::line('date_febrary'), Lang::line('date_march'), Lang::line('date_april'), 
                        Lang::line('date_may'), Lang::line('date_june'), Lang::line('date_july'), Lang::line('date_august'), 
                        Lang::line('date_september'), Lang::line('date_october'), Lang::line('date_november'), Lang::line('date_december')), 
                    $date);
        }
        return $date;
    }
    
    public static function formatter($date, $format = 'Y-m-d') {
        return !empty($date) ? date($format, strtotime($date)) : '';
    }
    
    public static function nextDate($date, $days, $format = 'Y-m-d') {
        return date($format, strtotime($date . ' + ' . $days . ' days'));
    }    

    public static function betweenMonth($date1, $date2) {
        /*$d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        $interval = $d2->diff($d1);
        return $interval->format('%m');*/
        $date1 = strtotime(self::formatter($date1, 'Y-m-d'));
        $date2 = strtotime(self::formatter($date2, 'Y-m-d'));
        $months = 0;
        while (strtotime('+1 MONTH', $date1) < $date2) {
            $months++;
            $date1 = strtotime('+1 MONTH', $date1);
        }
        
        return $months.' '.Lang::line('date_month').', '. ($date2 - $date1) / (60*60*24).' '.Lang::line('date_day');
    }
    
    public static function diffDays($date1, $date2, $dateType = 'day') {
        $d1 = new DateTime(self::formatter($date1, 'Y-m-d'));
        $d2 = new DateTime(self::formatter($date2, 'Y-m-d'));
        $interval = $d2->diff($d1);
        
        if ($dateType == 'day') {
            return $interval->format('%d');
        } elseif ($dateType == 'month') {
            return $interval->format('%m');
        } elseif ($dateType == 'year') {
            return $interval->format('%y');
        }
    }
    
    public static function currentDate($format = 'Y-m-d H:i:s') {
        return date($format);
    }
    
    public static function currentTimestamp() {
        return time();
    }
    
    public static function timestampToDate($time, $format = 'Y-m-d H:i:s') {
        return !empty($time) ? date($format, $time) : '';
    }
    
    public static function beforeDate($format, $days) {
        return date($format, strtotime($days));
    }
    
    public static function weekdayAfter($format, $date, $day) {
        return date($format, strtotime($day, strtotime($date)));
    }
    
    public static function lastDay($format, $date, $day) {
        return date($format, strtotime('previous '.$day, strtotime($date)));
    }
    
    public static function monthList() {
        for ($i=1;$i<13;$i++) {
            $months[] = array('MONTH_ID' => $i , 'MONTH_NAME' => $i) ;
        }
        return $months ;
    }
    
    public static function sumTime($time1, $time2) {
        $times = array($time1, $time2);
        $seconds = 0;
        foreach ($times as $time) {
            list($hour,$minute,$second) = explode(':', $time);
            $seconds += $hour*3600;
            $seconds += $minute*60;
            $seconds += $second;
        }
        $hours = floor($seconds/3600);
        $seconds -= $hours*3600;
        $minutes  = floor($seconds/60);
        $seconds -= $minutes*60;
        // return "{$hours}:{$minutes}:{$seconds}";
        return sprintf('%02d:%02d', $hours, $minutes);
    }
    
    public static function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {
            $dates[] = date($format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }
    
    public static function diffMonths($date1, $date2) {
        $d1 = new DateTime(self::formatter($date1, 'Y-m').'-01');
        $d2 = new DateTime(self::formatter($date2, 'Y-m').'-01');
        $interval = $d2->diff($d1);
        return $interval->format('%m');
    }

}