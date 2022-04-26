<body id="page" class="login-page">
	<div class="overlay">
	</div>
	<div id="showRoll" class="container">
		<div class="codrops-top">
			<div class="clr">
			</div>
		</div>
		<!--/ Codrops top bar -->
		<header>
			<h1 class="col-xs-0 hidden-xs">
				Welcome to
				<span>
					Orange Credit
				</span>
			</h1>
			<h2 class="col-xs-0 hidden-xs">
				...helping dreams come alive.
			</h2>
			<p class="codrops-demos col-xs-0 hidden-xs">
				<a href="<?php echo H_LOGIN; ?>">Home</a>
				<a href="<?php echo H_ABOUT; ?>">Products/Service</a>
				<a href="<?php echo H_TERMS; ?>" class="active">Terms and Privacy</a>
				<a href="<?php echo H_FAQS; ?>">Investment Calculator</a>
				<a href="<?php echo H_CALC; ?>">Loan Calculator</a>
				<a href="<?php echo H_CONTACT; ?>">Contact Us</a>
			</p>
		</header>
		<nav class="navbar navbar-default hidden-sm hidden-md hidden-lg">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">
							Toggle navigation
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
					</button>
					<a class="navbar-brand" href="#">Brand</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav nav-pills">
						<li role="presentation">
							<a href="<?php echo H_LOGIN; ?>">Home</a>
						</li>
						<li role="presentation">
							<a href="<?php echo H_ABOUT; ?>">Products/Service</a>
						</li>
						<li role="presentation">
							<a href="<?php echo H_TERMS; ?>">Terms and Privacy</a>
						</li>
						<li role="presentation">
							<a href="<?php echo H_FAQS; ?>">Investment Calculator</a>
						</li>
						<li role="presentation">
							<a href="<?php echo H_CALC; ?>">Loan Calculator</a>
						</li>
						<li role="presentation" class="active">
							<a href="<?php echo H_CONTACT; ?>">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mx-auto">
					<div class="card card-body text-center mt-5">
						<h1 class="heading display-5 pb-3">
							Contact us
						</h1>
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
									<form action="<?php echo H_ADMIN_MAIN . '&view=hsys_users&do=contactpro'; ?>" method="post" name="hezecomform" id="hezecomform" enctype="multipart/form-data" class="form-horizontal">
										<div class="output">
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2">
													Full Name
												</span>
												<input type="text" name="name" id="name" class="form-control" placeholder="Your Full name here" />
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2">
													E-mail
												</span>
												<input type="email" name="email" id="email" class="form-control" placeholder="Your E-mail here" />
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2">
													Phone No
												</span>
												<input type="number" name="phone" id="phone" class="form-control" placeholder="Your Phone No here" />
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2">
													Message Here
												</span>
												<textarea name="message" id="message" class="form-control" placeholder="Your Message Here">
												</textarea>
											</div>
										</div>
										<div class="controls">
											<div class="col-xs-12" style="padding-top: 20px;">
												<input type="submit" name="button" id="hButton" class="btn btn-success btn-lg" value="Submit" />
											</div>
										</div>
									</form>
								</div>
                                 <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                 <div style="text-align: left;">
                                    <blockquote>
                                      <p><strong>Phone</strong>: +234 809 2979045</p>
                                      <p><strong>Email</strong>: business[@]orangecred.com</p>
                                    </blockquote>
                                    </div>
                                </div><!-- /.col-lg-6 -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>