<?php



$dbconn = pg_connect ("Webpagedb");



$result = pg_query('SELECT * FROM Edit_Store_Information');

while ($row = pg_fetch_array($result)) {

    $json = row_to_json($row);
    print $json;

}

$result = pg_query('SELECT * FROM Add_Item');

while ($row = pg_fetch_array($result)) {

    $json = row_to_json($row);
    print $json;

}

pg_close($dbconn);



?>
