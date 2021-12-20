<?php
function getDistance($where_from_latitude, $where_from_longitude, $to_where_latitude, $to_where_longitude)
{
    $distance = round((((acos(sin(($where_from_latitude * pi() / 180)) * sin(($to_where_latitude * pi() / 180)) + cos(($where_from_latitude * pi() / 180)) * cos(($to_where_latitude * pi() / 180)) * cos((($where_from_longitude - $to_where_longitude) * pi() / 180)))) * 180 / pi()) * 60 * 1.1515 * 1.609344), 2);
    return  $distance;
}
