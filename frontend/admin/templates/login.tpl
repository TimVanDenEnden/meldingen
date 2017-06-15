<div class="container">
	<div class="card m-t-30">
		<div class="body">
            <form id="sign_in" method="post" action="{{ API_URL }}login/{{ RETURN_URL }}" name="loginform" novalidate="novalidate">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line loginLine">
                            <input id="login_input_username" type="text" class="form-control" name="user_name" placeholder="Username" required="" aria-required="true">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line loginLine">
                            <input id="login_input_password" type="password" class="form-control" name="user_password" placeholder="Password" required="" aria-required="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button name="login" class="btn btn-block btn-info waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
        		</form>
            </div>				
		</div>
	</div>
</div>