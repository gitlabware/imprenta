	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>
			
		
				 <?php echo $this->Form->create('User',array('class' => 'form-horizontal form-bordered form-control-borderless','id' => 'form-login'));?>
				<div class="form-group">
					
					<div class="input-group">
                                            
						<div class="input-group-addon">
							<i class="entypo-user"></i>    
						</div>
                                                <?php echo $this->Form->text('username',array('class' => 'form-control','placeholder' => 'Nombre de Usuario','autocomplete'=>'off','required'));?>
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
                                                <?php echo $this->Form->password('password',array('class' => 'form-control','placeholder' => 'Password','autocomplete'=>'off','required'));?>
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Ingresar
					</button>
				</div>
				
				<!-- Implemented in v1.1.4 -->
				<!-- <div class="form-group">
					<em>- or -</em>
				</div>-->
				
				<!--<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
						Login with Facebook
						<i class="entypo-facebook"></i>
					</button>
					
				</div>--> 
				
				<!-- 
				
				You can also use other social network buttons
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
						Login with Twitter
						<i class="entypo-twitter"></i>
					</button>
					
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google+
						<i class="entypo-gplus"></i>
					</button>
					
				</div> -->
				
			
			
			
			<!--<div class="login-bottom-links">
				
				<a href="extra-forgot-password.html" class="link">Forgot your password?</a>
				
				<br />
				
				<a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
				
			</div>-->
			
		</div>
		
	</div>