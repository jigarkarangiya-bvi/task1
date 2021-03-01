<?php
if (isset($_POST['fetch'])) {
	$username = $_POST['username'];
	$url = 'https://www.instagram.com/' . $username . '/?__a=1';
	$response = json_decode(file_get_contents($url), true);
	$profilePage = $response['logging_page_id'];
	$bio = $response['graphql']['user']['biography'];
	$fullname = $response['graphql']['user']['full_name'];
	$exurl = $response['graphql']['user']['external_url'];
	$followers = $response['graphql']['user']['edge_followed_by']['count'];
	$following = $response['graphql']['user']['edge_follow']['count'];
	$profilepic = $response['graphql']['user']['profile_pic_url_hd'];
	$posts = $response['graphql']['user']['edge_owner_to_timeline_media']['count'];
	$uname = $response['graphql']['user']['username'];
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
			<label>Enter Username:</label>
			<input type="text" name="username" value="">
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
				<td>Profile Pic:</td>
				<td>
					<img src="<?php echo $profilepic; ?>" height="200px;">
				</td>
			</tr>
			<tr>
				<td><label>Full Name : </label></td>
				<td><input type="text" name="fullname" value="<?php echo $fullname; ?>"></td>
			</tr>
			<tr>
				<td><label>Username : </label></td>
				<td><input type="text" name="uname" value="<?php echo $uname; ?>"></td>
			</tr>
			<tr>
				<td><label>ProfilePage : </label></td>
				<td><input type="text" name="profilePage" value="<?php echo $profilePage; ?>"></td>
			</tr>
			<tr>
				<td><label>Bio:</label></td>
				<td><textarea name="bio" rows="8">
					<?php echo $bio; ?>
				</textarea></td>
			</tr>
			<tr>
				<td><label>External Url:</label></td>
				<td><input type="text" name="exurl" value="<?php echo $exurl; ?>"></td>
			</tr>
			<tr>
				<td>Followers: <input type="text" name="followers" value="<?php echo $followers; ?>">&nbsp; Following:
					<input type="text" name="following" value="<?php echo $following; ?>"> &nbsp; Posts: <input type="text" name="posts" value="<?php echo $posts; ?>">
				</td>

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