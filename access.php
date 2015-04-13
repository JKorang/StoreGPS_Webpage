<?php

$dbconn = pg_connect ("host=localhost dbname=webpagedb user=webpagedb password=");


echo "hello world";

$result = pg_query($dbconn, "SELECT * FROM Edit_Store_Information");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
  
echo $result;


while ($row = pg_fetch_array($result)) {

echo "in loop";
    echo json_encode($row);

}

pg_free_result($result);

$result = pg_query("SELECT * FROM Add_Item");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_array($result)) {

   echo json_encode($row);

}

pg_close($dbconn);



?>
