<?php
include("system/config.inc.php");
//$_SESSION['pattern'] = $_POST['pattern']; 


/*---  product query ----*/
if($_POST['eleid'])
{
   $cond = $_POST['eleid']; 
   echo $cond; die();
	$sql = "SELECT product.*,productoption.*
		from `product`
		LEFT OUTER JOIN `productoption` ON
		product.productid = productoption.productid  
		WHERE   ".$cond."
		GROUP BY `product`.`productid` ".$order."";

}
$result=$obj_db->select($sql);
?>


SELECT *
FROM (

SELECT count( productoption.productoptionid ) AS total, product.productname, product.image, productoption.optiontypeid, product.productid
FROM `product`
LEFT OUTER JOIN `productoption` ON product.productid = productoption.productid
WHERE `optiontypeid` = '4'
OR `optiontypeid` = '8'
OR `optiontypeid` = '0'
OR `optiontypeid` = '0'
OR `optiontypeid` = '0'
GROUP BY product.productid
ORDER BY product.productid ASC
) AS tbl
WHERE total =2
LIMIT 0 , 30
