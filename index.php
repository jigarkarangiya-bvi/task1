<?php
require 'simple_html_dom.php';
$html = file_get_html('https://www.theverge.com/phone-review');
$blogs = array();
$temp = array();
foreach ($html->find(".c-compact-river__entry") as $element) {
	$blogs = array("Title" => trim($element->find('.c-entry-box--compact__title', 0)->plaintext, ' '), "Author" => trim($element->find('.c-byline__item', 0)->plaintext, ' '), "Date" => trim($element->find('.c-byline__item', 1)->plaintext, ' '));

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