<body id="page" class="login-page">
<div class="overlay"></div>
<div id="showRoll" class="container">
    <div class="codrops-top">
        <div class="clr"></div>
    </div><!--/ Codrops top bar -->
    <header>
        <h1 class="col-xs-0 hidden-xs">Welcome to <span>Orange Credit</span></h1>
        <h2 class="col-xs-0 hidden-xs">...helping dreams come alive.</h2>
        <p class="codrops-demos col-xs-0 hidden-xs">
            <a href="<?php echo H_LOGIN ;?>">Home</a>
            <a href="<?php echo H_ABOUT ;?>">Products/Service</a>
            <a href="<?php echo H_TERMS ;?>" class="active">Terms and Privacy</a>
            <a href="<?php echo H_FAQS ;?>">Investment Calculator</a>
            <a href="<?php echo H_CALC ;?>">Loan Calculator</a>
            <a href="<?php echo H_CONTACT ;?>">Contact Us</a>          
        </p>  
    </header>
<nav class="navbar navbar-default hidden-sm hidden-md hidden-lg">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="<?php echo H_LOGIN; ?>">Home</a></li>
                        <li role="presentation"><a href="<?php echo H_ABOUT; ?>">Products/Service</a></li>
                        <li role="presentation"><a href="<?php echo H_TERMS; ?>">Terms and Privacy</a></li>
                        <li role="presentation"  class="active"><a href="<?php echo H_FAQS; ?>">Investment Calculator</a></li>
                        <li role="presentation"><a href="<?php echo H_CALC; ?>">Loan Calculator</a></li>
                        <li role="presentation"><a href="<?php echo H_CONTACT; ?>">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
<div class="container">
		<div class="row">
		  <div class="col-md-12 mx-auto">
			<div class="card card-body text-center mt-5">
			  <h1 class="heading display-5 pb-3">Investment Calculator</h1>
             
			</div>
			  <form method="post" id="loan-form">
				<div class="form-group">
				  <div class="input-group">				  
						<span class="input-group-addon" id="sizing-addon2"> &#x20A6; </i></span>
					<input type="number" name="" id="ammount" class="form-control" placeholder="Amount to Invest, We allow a minimum investment of N500,000" />
				  </div>
				</div>
				<div class="form-group">
				  <div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"> <i class="fas fa-percentage"></i></span>			
					<input type="number" name="" id="interest" class="form-control" placeholder="Interest Rate Amount" value="<?php echo '4.17'; ?>" />
				  </div>
				</div>
				<div class="form-group">
				  <div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"> <i class="far fa-clock"></i></span>			
					 <input type="number" name="" id="years" class="form-control" placeholder="Number of months to Invest we allow a minimum of 3 months" />
				  </div>
				</div>
				<div class="form-group">
				  <input type="submit" value="Calculate Loan Interest" class="btn btn-danger btn-lg btn-block" />
				</div>
			  </form>
               <div id="loading">
				<img src="<?php echo H_THEME; ?>/images/loading.gif" alt="" />
			  </div>
              	  <div id="loan-results">
					<div class="container">
					  <div class="row">
						<div class="col-sm">
							<div class="form-group">
							  <div class="input-group">
								<span class="input-group-addon" id="sizing-addon2"> First Monthly Payment :</span>							
								<input type="text" name="" id="monthly-payment" class="form-control" disabled />
                                <span class="input-group-addon"><?php echo '&#x20A6;' ?></span>
							
							  </div>
							</div>							
							<div class="form-group">
							  <div class="input-group">
								<span class="input-group-addon" id="sizing-addon2"> Total Payment :</span>						
								<input type="text" name="" id="total-payment" class="form-control" disabled />
							<span class="input-group-addon"><?php echo '&#x20A6;' ?></span>
						
							  </div>
							</div>
							<div class="form-group">
							  <div class="input-group">
							     <span class="input-group-addon" id="sizing-addon2"> Total Interest :</span>							
								<input type="text" name="" id="total-interest" class="form-control" disabled />
								<span class="input-group-addon"><?php echo '&#x20A6;' ?></span>							
							  </div>
							</div>
						</div>					
					  </div>
					</div>
			  </div>
		  </div>
		</div>
	</div>
    
</div>
