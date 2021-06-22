<?php


namespace App\Helpers;


use Carbon\Traits\Date;

class DataHelper
{
    static function obterConversaoDeDataUsaParaPtBr(Date $data) : Date
    {
        $data = Carbon::createFromFormat('Y-m-d', $data);
        return $data->format('d/m/Y');
    }

    static function obterConversaoDeDataPtBrToUsa(Date $data) : Date
    {
        $data = Carbon::createFromFormat('d/m/Y', $data);
        return $data->format('Y-m-d');
    }
}
