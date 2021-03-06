<!-- BEGIN LOGIN SECTION -->
<section class="section-account">
<div class="spacer"></div>
<div class="card contain-xs style-transparent">
	<div class="card-body">
		<div class="row">
			<div class="col-xs-12">
				<br/>
				<span class="text-lg text-bold text-primary">LOGIN TO START YOUR SESSION</span>
				<br/><br/>
				<?= $this->session->flashdata('msg');?>
				<form class="form floating-label" action="<?= base_url().'login/auth'?>" accept-charset="utf-8" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" required>
						<label for="username">Username</label>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" required>
						<label for="password">Password</label>
						
					</div>
					<br/>
					<div class="row">
						<div class="col-xs-6 text-left">
							<div class="checkbox checkbox-inline checkbox-styled">
								<label>
									<input type="checkbox"> <span>Tetap Masuk</span>
								</label>
							</div>
						</div><!--end .col -->
						<div class="col-xs-6 text-right">
							<button class="btn btn-primary btn-raised" type="submit"><span class="fa fa-lock"></span> Login</button>
						</div><!--end .col -->
					</div><!--end .row -->
				</form>
			</div><!--end .col -->
			
				</div><!--end .row -->
			</div><!--end .card-body -->
		</div><!--end .card -->
	</section>
	<!-- END LOGIN SECTION -->