<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
    header("Content-Type: text/plain");

	$devserver = &Database::getPostgreSQL('devserver');

	$query = 'SELECT "com_itemid", "com_weight", "itn_german", "itn_english"'
    .PHP_EOL.' FROM common, itemname'
    .PHP_EOL.' WHERE "com_itemid" = "itn_itemid"'
    .PHP_EOL.' ORDER BY "com_itemid"'
	;
    $devserver->setQuery($query);
	$common = $devserver->loadAssocList();

    echo '/NOP/',PHP_EOL;
	if (!is_null($common)) {
	   foreach($common as $key=>$item) {
	       echo $key,',0,1,',$item['com_itemid'],',0,3,0,',$item['com_weight'],',0,0,0,"","',$item['itn_german'],'","',$item['itn_english'],'",0,',PHP_EOL;
	   }
	}
?>
