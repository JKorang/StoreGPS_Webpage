<?php


$dbconn = pg_connect ("host=localhost dbname=webpagedb user=webpagedb password=");

//split the table into two smaller queries one for the stores and one for the items
$store_query = pg_query($dbconn, "SELECT data FROM web_webform_submitted_data Where nid = 9");
$item_query = pg_query($dbconn, "SELECT data FROM web_webform_submitted_data Where nid = 10");

//if one of the queries can not be accessed an error is thrown
if (!$store_query || !$item_query) {
  echo "An error occurred.\n";
  exit;
}


$stores = array();
//go through the store_query and add the data to an array
while($storeRow = pg_fetch_array($store_query)){
  
  $stores[] = $storeRow['data'];
  //echo $storeRow['data'];

}

$items = array();
//go through the item_query and add the data to an array
while($itemRow = pg_fetch_array($item_query)){
  
  $items[] = $item_query['data'];
  //echo $itemRow['data'];

}

//json items of the stores array and the items array
$jsonStores = array_to_json($stores);

$jsonItems = array_to_json($items);



pg_close($dbconn);

?>
