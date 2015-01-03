
<!-- BEGIN REGISTRATION FORM -->
{{ Form::open(array('route'=>'homeToRegister','class'=>'register-form')) }}

    <h3>Sign Up</h3>
    <p>
        Enter your personal details below:
    </p>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
        <div class="controls">
            <div class="input-icon">
                <i class="fa fa-check"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation"/>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button id="register-back-btn" type="button" class="btn">
            <i class="m-icon-swapleft"></i> Back </button>
        <button type="submit" id="register-submit-btn" class="btn green pull-right">
            Sign Up <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>

    <div class="login-options">
        <h4>Or register with</h4>
        <ul class="social-icons">
            <li>
                <a class="facebook" data-original-title="facebook" href="/anvard/login/Facebook">
                </a>
            </li>
            <li>
                <a class="twitter" data-original-title="Twitter" href="/anvard/login/Twitter">
                </a>
            </li>
            <li>
                <a class="googleplus" data-original-title="Goole Plus" href="#">
                </a>
            </li>
        </ul>
    </div>

    {{ Form::hidden('formName','register') }}

{{ Form::close() }}


<!-- END REGISTRATION FORM -->