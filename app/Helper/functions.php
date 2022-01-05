<?php

use App\Models\Offer;
use App\Models\Topic;

function getDistance($where_from_latitude, $where_from_longitude, $to_where_latitude, $to_where_longitude)
{
    $distance = round((((acos(sin(($where_from_latitude * pi() / 180)) * sin(($to_where_latitude * pi() / 180)) + cos(($where_from_latitude * pi() / 180)) * cos(($to_where_latitude * pi() / 180)) * cos((($where_from_longitude - $to_where_longitude) * pi() / 180)))) * 180 / pi()) * 60 * 1.1515 * 1.609344), 2);
    return  $distance;
}
function status($status)
{
    switch ($status) {
        case 0:
            return __('words.waiting');
            break;
        case 1:
            return __('words.ignited');
            break;
        case 2:
            return __('words.delivered');
            break;
        case 3:
            return __('words.cancelled');
            break;
    }
}
function priceFormat($price)
{
    return number_format($price, 2, '.', '.');
}
