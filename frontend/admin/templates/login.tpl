<div class="container p-sm-0">
	<div class="headerImage"></div>
	<div class="block-header">
		<div class="card">
			<div class="header headerTitle">
				Aanmelden
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<form method="post" action="{{ API_URL }}login/{{ RETURN_URL }}" name="loginform">
			<label for="login_input_username">Username</label>
			<input id="login_input_username" class="login_input" type="text" name="user_name" required />

			<label for="login_input_password">Password</label>
			<input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

			<input type="submit"  name="login" value="Log in" />
		</form>
	</div>
</div>

<!--
<form method="post" action="{{ API_URL }}login" name="loginform">

    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

    <input type="submit"  name="login" value="Log in" />

</form>
-->