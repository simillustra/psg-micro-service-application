<?php
include_once('libraries/classes/Calculation.php');
$Calculation = new Calculation();
if (isset($_POST['submit'])) {
    $Calculation->init();
}
?>
<style>
    h1 {
        margin: 0;
        text-shadow: 0 1px 3px #4a5d48;
        color: #fff;
        font-size: 2.5em;
    }

    h2, p, ul {
        margin: 0 0 0.5em;
    }

    ul {
        padding: 0 0 0 1em;
    }

    a {
        text-decoration: none;
        color: #f36;
    }

    a:hover {
        text-decoration: underline;
    }

    form {
        max-width: 18em;
        text-align: right;
    }

    li {
        margin: 0 0 10px;
        position: relative;
    }

    form ul {
        list-style: none;
        padding: 0;
    }

    label {
        width: 10em;
        float: left;
        margin-right: 0.5em;
    }

    legend {
        font-weight: bold;
    }

    .section {
        padding: 1em;
    }

    .result {
        margin: 1em 0 0;
        padding: .5em;
        font-size: 1.3em;
        color: #2e5628;
        line-height: 1;
        box-shadow: inset 0 0 3px #555;
        background: #f8f6e9;
        min-height: 20px;
    }

    .error {
        position: absolute;
        top: 0;
        left: 20em;
        background: #fff;
        text-align: left;
        font-size: 85%;
        color: #f36;
        font-weight: bold;
        white-space: nowrap;
    }

    /* this rule changes the H1 color in IE < 10, otherwise it would be white on white  */
    .ie h1 {
        color: #4a5d48;
    }

</style>
<body id="page" class="login-page">
<div class="overlay"></div>
<!--<ul class="cb-slideshow">-->
<!--    <li><span>Image 01</span>-->
<!--        <div><h3>Need Instant, Hassel free school fees loans? Signup today.</h3></div>-->
<!--    </li>-->
<!--    <li><span>Image 02</span>-->
<!--        <div><h3>Pay school fees with orange credit and earn scholarship points.</h3></div>-->
<!--    </li>-->
<!--    <li><span>Image 03</span>-->
<!--        <div><h3>Contribute for 3 months and get school fees loans in Advance.</h3></div>-->
<!--    </li>-->
<!--    <li><span>Image 04</span>-->
<!--        <div><h3>Refer and earn 5 orange credit points per referral. T & C applies.</h3></div>-->
<!--    </li>-->
<!--    <li><span>Image 05</span>-->
<!--        <div><h3>Promo: Signup today and get express school fees loans.</h3></div>-->
<!--    </li>-->
<!--    <li><span>Image 06</span>-->
<!--        <div><h3>Orange credit card coming soon..</h3></div>-->
<!--    </li>-->
<!--</ul>-->
<div id="showRoll" class="container">
    <div class="codrops-top">
        <div class="clr"></div>
    </div><!--/ Codrops top bar -->
    <header>
        <h1 class="col-xs-0 hidden-xs">Welcome to <span>Orange Credit</span></h1>
        <h2 class="col-xs-0 hidden-xs">...helping dreams come alive.</h2>
        <p class="codrops-demos col-xs-0 hidden-xs">
            <a href="<?php echo H_LOGIN; ?>">Home</a>
            <a href="<?php echo H_ABOUT; ?>">Products/Service</a>
            <a href="<?php echo H_TERMS; ?>">Terms and Privacy</a>
            <a href="<?php echo H_FAQS; ?>">Investment Calculator</a>
            <a href="<?php echo H_CALC; ?>">Loan Calculator</a>
            <a href="<?php echo H_CONTACT; ?>">Contact Us</a>

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
                    <a class="navbar-brand" href="#">Orange Credit</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="<?php echo H_LOGIN; ?>">Home</a></li>
                        <li role="presentation"><a href="<?php echo H_ABOUT; ?>">Products/Service</a></li>
                        <li role="presentation"><a href="<?php echo H_TERMS; ?>">Terms and Privacy</a></li>
                        <li role="presentation"><a href="<?php echo H_FAQS; ?>">Investment Calculator</a></li>
                        <li role="presentation" class="active"><a href="<?php echo H_CALC; ?>">Loan Calculator</a></li>
                        <li role="presentation"><a href="<?php echo H_CONTACT; ?>">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">             
                <div class="card card-body text-left mt-5">
                   <div class="panel  panel-primary">
                	<div class="panel-heading">
                    <div class="header section" role="banner">
                        <h1 class="heading">Loan Calculator</h1>
                    </div>
                    </div>
                    <div class="section main-section" role="main">
                        <h2 class="heading">Instructions</h2>
                        <ul>
                            <li>This calculator outputs the monthly payments for a loan.</li>
                            <li>The loan amount is the total amount of money you are borrowing and must be a whole
                                number greater than zero.
                                Do not enter commas, <abbr title="for example">e.g.</abbr>, 1,000 would be entered as
                                1000.
                            </li>
                            <li>Interest is the interest rate you are paying, this is a decimal or whole number greater
                                than 0.1;
                                do not include the percent sign.
                            </li>
                            <li>The number of months is how many months the loan will be carried out. This is a whole
                                number greater than zero.
                            </li>
                        </ul>
                        <form method="post" id="loanCalcForm" role="">
                            <fieldset>
                                <legend>Loan Calculator</legend>
                                <ul>
                                    <li>
                                        <label for="loanAmount">Loan Amount</label>
                                        <input type="text" size="8" name="loanAmount" id="loanAmount"
                                               value="<?php if (isset($loanAmount)) {
                                                   echo $loanAmount;
                                               } ?>"/>
                                        <?php if (isset($errorArray[0])) {
                                            echo $errorArray[0];
                                        } ?>
                                    </li>
                                    <li>
                                        <label for="interest">Interest</label>
                                        <input type="text" size="8" name="interest" id="interest"
                                               value="<?php if (isset($interest)) {
                                                   echo $interest;
                                               }else{ echo '9.3'; } ?>"/>
                                        <?php if (isset($errorArray[1])) {
                                            echo $errorArray[1];
                                        } ?>
                                    </li>
                                    <li>
                                        <label for="numOfMonths">Number of Months</label>
                                        <input type="text" size="8" name="numOfMonths" id="numOfMonths"
                                               value="<?php if (isset($numOfMonths)) {
                                                   echo $numOfMonths;
                                               } ?>"/>
                                        <?php if (isset($errorArray[2])) {
                                            echo $errorArray[2];
                                        } ?>
                                    </li>
                                </ul>
                                <input type="submit" name="submit" value="Submit" class="button"/>
                            </fieldset>
                        </form>
                        <div id="result" class="result">
                            <?php if (isset($result)) {
                                echo $result;
                            } ?>
                        </div>
                        <div id="totalRepayment" class="totalrepayment"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="<?php echo H_THEME; ?>/js/Utils.js"></script>
    <script src="<?php echo H_THEME; ?>/js/loanCalc.js"></script>