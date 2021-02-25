<?php


namespace App\Repositories\Namaz;


class NamazRepository extends \App\Repositories\BasicRepository implements NamazRepositoryInterface
{

    public function prayerTimeForSpecificDay($month,$year)
    {
        $url = "http://api.aladhan.com/v1/calendar?latitude=23.8335415&longitude=90.4167688&method=1&month=".$month."&year=".$year."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        return json_decode($response);
    }
}
