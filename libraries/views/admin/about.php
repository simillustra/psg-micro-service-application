<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Logo and responsive toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span class="glyphicon glyphicon-fire"></span>
                PSG
            </a>
        </div>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="<?php echo H_LOGIN; ?>">Register</a>
                </li>
                <li>
                    <a href="<?php echo H_LOGIN; ?>">Login</a>
                </li>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="jumbotron feature">
    <div class="container">
        <div id="feature-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#feature-carousel" data-slide-to="1"></li>
                <li data-target="#feature-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="#">
                        <img class="img-responsive"
                             src="<?php echo H_THEME; ?>/images/1.jpg"
                             width="100%"
                             alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Get Access to:</h3>
                        <p>Quality expert advisory and market opportunities.</p>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <img class="img-responsive"
                             src="<?php echo H_THEME; ?>/images/6.jpg"
                             width="100%"
                             alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Poultry Inputs </h3>
                        <p>Poultry feeds, veterinary services, vaccines and chicks</p>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <img class="img-responsive"
                             src="<?php echo H_THEME; ?>/images/2.jpg"
                             width="100%"
                             alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Access to Inputs finances</h3>
                        <p>To grow and scale your business operations</p>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#feature-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#feature-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>


<!-- Content -->
<div class="container">

    <!-- Page Intro -->
    <div class="row page-intro">
        <div class="col-lg-12">
            <h1>POULTRY SERVICE
                <small>PLATFORM</small>
            </h1>
            <p>PSG is integrating the poultry inputs and services with information technology to support the poultry
                farmer.</p>
        </div>
    </div>
    <!-- /.row -->

    <!-- Feature Row -->
    <div class="row">
        <article class="col-md-4 article-intro">
            <a href="#">
                <img class="img-responsive img-rounded" src="<?php echo H_THEME; ?>/images/4.jpg"
                     alt="">
            </a>
            <h3>
                <a href="#">Quality Advisory Services and market opportunity</a>
            </h3>
            <p>PSG provides poultry farmers with direct access to expert advice on current best and safe practices in
                poultry farming and provide direct market opportunities. To farmers using simple SMS and USSD system
                which enables two-way communication between poultry farmers and experts in the PSG value-chain network
                .</p>
        </article>
        <article class="col-md-4 article-intro">
            <a href="#">
                <img class="img-responsive img-rounded" src="<?php echo H_THEME; ?>/images/8.jpg"
                     alt="">
            </a>
            <h3>
                <a href="#">Poultry Inputs:</a>
            </h3>
            <p>PSG ensures that poultry farmers access feeds, veterinary services, vaccines, vitamins, chick and
                technical support at a highly subsidised rate to improve average yield and profitability per individual
                farmer.</p>
        </article>

        <article class="col-md-4 article-intro">
            <a href="#">
                <img class="img-responsive img-rounded" src="<?php echo H_THEME; ?>/images/3.jpg"
                     alt="">
            </a>
            <h3>
                <a href="#">Access to Inputs Finance</a>
            </h3>
            <p>
                PSG provides poultry farmers with a wallet which is used to
            <ul>
                <li>Verify farmers financial worthiness for loans or grants</li>
                <li>Originate Farmers Loan</li>
                <li>Connect Originated Loans with 3rd Party agricultural lenders</li>
                <li>Connect Disbursement to farmer’s wallet</li>
                <li>Connect Loan repayments from farmer’s wallet</li>
            </ul>
            </p>
        </article>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
