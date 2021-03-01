<?php
require 'simple_html_dom.php';
$html = file_get_html('https://bsscommerce.com/blog/category/magento-tutorial/page/1/');
$blogs = array();
$temp = array();
foreach ($html->find(".page-with-sidebar with-right-sidebar") as $element) {
	

	array_push($temp, $blogs);
}

//echo print_r($temp);
foreach ($temp as $blog) {
	echo "<pre>";
	echo print_r($blog);
	//echo "<pre>";
	//echo $blog['Title'] . "\n";
	//echo $blog['Author'] . "\n";
	//echo $blog['Date'] . "\n";
}
?>