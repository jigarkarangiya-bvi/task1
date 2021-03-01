<?php
if (isset($_POST['fetch'])) {
	$posturl = $_POST['posturl'];
	$url = $posturl . '?__a=1';
	//echo $url;

	$response = json_decode(file_get_contents($url), true);
	//$profilepic = $response['graphql']['user']['profile_pic_url_hd'];
	$DisplayUrl = $response['graphql']['shortcode_media']['display_url'];
	$captiondata = $response['graphql']['shortcode_media']['edge_media_to_caption']['edges'];
	$caption = $captiondata[0]['node']['text'];
	$comments = $response['graphql']['shortcode_media']['edge_media_to_parent_comment']['count'];
	//echo $comments;
	//echo "<pre>";
	//print_r($captiondata);
	//die();

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Instagram Fetch</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
	<div class="container">

	<form method="post" action="<?php echo $PHP_SELF; ?>" class="form">
		<br>
		<div class="form-group">
			<label>Enter Post URL:</label>
			<input type="text" name="posturl" value="">
		</div>
		<div class="form-group">
			<input type="submit" name="fetch">
		</div>

	</form>

<?php if (isset($_POST['fetch'])) {

	?>
	<form>
		<table class="table">
			<tr>
				<td>Post:</td>
				<td>
					<img src="<?php echo $DisplayUrl; ?>" height="200px;">
				</td>
			</tr>


			<tr>
				<td><label>Caption:</label></td>
				<td><textarea name="caption" rows="10">
					<?php echo $caption; ?>
				</textarea></td>
			</tr>
			<tr>
				<td>This post has <input type="text" name="comments" value="<?php echo $comments; ?>"> Comments.</td>

			</tr>

		</table>
	</form>
	<?php
}
?>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>