<?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5) { ?>
    <section class="content">
        <div class="login-logo">
            <a href="#"><b> 3 Steps to access</b> Orange Credits Micro Loan</a>
        </div><!-- /.login-logo -->
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&do=viewall&bid=<?php echo
                    $_SESSION['H_USER_SESSION_ID'] ?>">

                                        <span class="info-box-icon bg-yellow">
                                        <i class="fas fa-id-card"></i>
                                        </span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">FILL OR UPDATE YOU KYC FORM</span>
                        <span class="info-box-number">
                         <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&do=viewall&bid=<?php echo
                         $_SESSION['H_USER_SESSION_ID'] ?>" class="btn btn-danger btn-lg active" role="button">FILL KYC HERE</a>
                         <a href="#" class="btn btn-primary btn-lg active" role="button">UPDATE KYC HERE</a>                       
                        </span>
                        <span class="info-box-number"><small>When your KYC is validated you can proceed and request for a Micro Loan</small></span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

            </div>
            <?php if (!empty($kyc_Is_Approved) && $kyc_Is_Approved->kyc_status == 'APPROVED') { ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=add&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                        <span class="info-box-icon bg-aqua">
                            <i class="far fa-folder-open"></i>
                        </span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">PAY AND FILL YOUR BUSINESS PLAN</span>
                            <span class="info-box-number">
                                <a href="<?php echo H_ADMIN; ?>&view=orange_credit_business_plan&do=add&bid=<?php echo
                                $_SESSION['H_USER_SESSION_ID'] ?>" class="btn btn-primary btn-lg active" role="button">MY BUSINESS INFO</a>
                            </span>
                            <span class="info-box-number"><small>Access to your Micro Loan is one step away. </small>
                            </span>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=add&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                        <span class="info-box-icon bg-aqua">
                            <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">FUND ACCOUNT WITH CARD OR PAYMENT TOKEN</span>
                            <span class="info-box-number">
                                <button type="button" class="btn btn-danger btn-lg active" data-toggle="modal"
                                        data-target="#fundAccountModal">CARD PAYMENT</button>
                                <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=fundAccount&account_number=<?php echo $_SESSION['H_USER_ACCOUNT_NUMBER']; ?>"
                                   class="btn btn-primary btn-lg active" role="button">COUPON PAYMENT</a>
                            </span>
                            <span class="info-box-number"><small>Funding and Savings in your Wallet guarantees how much load you can access. </small>
                            </span>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=add&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                        <span class="info-box-icon bg-green">
                            <i class="far fa-credit-card"></i>
                        </span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">MICRO LOAN REQUEST AND ACTIVATION</span>
                            <span class="info-box-number">
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=add&bid=<?php echo
                            $_SESSION['H_USER_SESSION_ID'] ?>" class="btn btn-danger btn-lg active" role="button">REQUEST LOAN</a>
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=viewall&bid=<?php echo
                            $_SESSION['H_USER_SESSION_ID']; ?>" class="btn btn-primary btn-lg active" role="button">VIEW LOAN</a>
                        <span class="info-box-number"><small> Now is your moment click to apply for a micro Loan</small></span>
                        </span>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            <?php } ?>
        </div>

        <form>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
            <input name="first_name" type="hidden" id="first_name" value="<?php echo
            $user_personal_info->first_name ?>"/>
            <input name="last_name" type="hidden" id="last_name" value="<?php echo $user_personal_info->
            last_name ?>"/>
            <input name="email" type="hidden" id="email" value="<?php echo $user_personal_info->
            email ?>"/>
            <input name="phone" type="hidden" id="phone" value="<?php echo $user_personal_info->
            phone ?>"/>
            <input name="credit_request_charge" id="credit_request_charge" type="hidden" value=""/>
            <input name="amount_deposit" id="amount_deposit" type="hidden" value=""/>

        </form>

    </section>
    <?php if (!empty($kyc_Is_Approved) && $kyc_Is_Approved->kyc_status == 'APPROVED') { ?>
        <section class="content">
            <div class="referral_link">
                <b>Referal Code & link:</b><a
                        href="http://orangecred.com/index.php?pg=login&ref=<?php echo
                        $ref_code_link = $haccess->get_referal_code(); ?>">
                    http://orangecred.com/index.php?pg=login&ref=<?php echo $ref_code_link =
                        $haccess->get_referal_code(); ?></a>
            </div><!-- /.referral_link -->
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_request&do=viewall&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">

                                        <span class="info-box-icon bg-aqua">
                                        <i class="far fa-credit-card"></i>
                                        </span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">CREDIT REQUESTS</span>
                            <span class="info-box-number">
                        <?php echo $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'requests'); ?>
                        <small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&do=viewall&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-red">
                                        <i class="fa fa-folder-open"></i></span>
                        </a>

                        <div class="info-box-content">
                            <span class="info-box-text">APPLICATION STATUS</span>
                            <span class="info-box-number"><?php $bankc = $haccess->
                                getCount($_SESSION['H_USER_SESSION_ID'], 'applications'); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_transactions&do=viewall&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-green">
                                        <i class="fas fa-hand-holding-usd"></i></span>
                        </a>

                        <div class="info-box-content">
                            <span class="info-box-text">TRANSACTION HISTORY</span>
                            <span class="info-box-number"><?php $bankc = $haccess->
                                getCount($_SESSION['H_USER_SESSION_ID'], 'transactions'); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payment_history&do=viewall&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-yellow">
                                            <i class="fas fa-history"></i></span>
                        </a>

                        <div class="info-box-content">
                            <span class="info-box-text">PAYMENT HISTORY</span>
                            <span class="info-box-number"><?php $bankc = $haccess->
                                getCount($_SESSION['H_USER_SESSION_ID'], 'payment-history'); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=viewall&bid=<?php echo
                        $_SESSION['H_USER_SESSION_ID'] ?>">

                                        <span class="info-box-icon bg-aqua">
                                       <i class="fa fa-user-circle"></i></span>
                        </a>
                        <div class="info-box-content">
                            <span class="info-box-text">ACCOUNTS</span>
                            <span class="info-box-number"><?php $bankc = $haccess->
                                getCount($_SESSION['H_USER_SESSION_ID'], 'accounts'); ?><small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->


                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="#">
                                        <span class="info-box-icon bg-yellow">
                                            <i class="fas fa-gifts"></i></span>
                        </a>

                        <div class="info-box-content">
                            <span class="info-box-text">REFER AND EARN</span>
                            <span class="info-box-number"><?php $bankc = $haccess->
                                getCount($_SESSION['H_USER_SESSION_ID'], 'referrals'); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- Modal -->
    <?php } ?>
    <div class="modal fade" id="bizPlanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <span>..</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fundAccountModal" tabindex="-1" role="dialog" aria-labelledby="myAccountModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Fund Account with Card Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="funding_amount">Amount to Fund Account / Deposit</label>
                        <input id="funding_amount" name="funding_amount" placeholder="Minimum value of #500 is required"
                               type="number" min="500" value="" class="form-control styler"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="callFundAccount" class="btn btn-primary" data-dismiss="modal">Fund
                        Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#callFundAccount').on('click', function () {
            // business logic...
            makePaymentNow();
        })

        function makePaymentNow() {
            console.log('Start');

            var charge = document.getElementById('credit_request_charge').value;
            var mobile = document.getElementById('phone').value;
            var fname = document.getElementById('first_name').value;
            var lname = document.getElementById('last_name').value;
            var email = document.getElementById('email').value;
            var amount_deposit = document.getElementById('funding_amount').value;

            if (charge === '' && mobile === '' && fname === '' && lname === '' && email === '' && amount_deposit === '') {
                console.log('email', {
                    'email': email,
                    'mobile': mobile,
                    'fname': fname,
                    'lname': lname,
                    'charge': charge
                });
                alert('Some error noted, please reload the page and try again.')
                return;
            }

            <?php if (PAYMENT_PREFERENCE === 'PAYSTACK'): ?>

            var amountPayable = document.getElementById('credit_request_charge').value;
            var total_Amount = amount_deposit > amountPayable ? amount_deposit : amountPayable;

            var handler = PaystackPop.setup({
                key: '<?php echo STORE_STATUS == 'development' ? PAYSTACK_TEST_KEY :
                    PAYSTACK_LIVE_KEY; ?>',
                email: document.getElementById('email').value,
                amount: Math.floor((total_Amount * 100)).toFixed(2),
                currency: "NGN",
                ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                firstname: document.getElementById('first_name').value,
                lastname: document.getElementById('last_name').value,
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: "+2348012345678"
                        }
                    ]
                },
                callback: function (response) {
                    // console.log('response',response);
                    // alert('success. transaction ref is ' + response.reference);
                    var userInfo = {
                        tid: response.transaction,
                        trans_ref: response.trxref,
                        amount: total_Amount,
                        desc: 'ACCOUNT FUNDING REQUEST',
                        provider: 'PAYSTACK',
                        user:<?php echo $_SESSION['H_USER_SESSION_ID']; ?>
                    }
                    // console.log('userInfo',userInfo);
                    savePaymentInfo(userInfo);
                },
                onClose: function () {
                    alert('window closed');
                }
            });
            handler.openIframe();

            <?php elseif (PAYMENT_PREFERENCE === 'RAVE_FLUTTERWAVE'): ?>
            const API_publicKey = '<?php echo STORE_STATUS == 'development' ?
                RAVE_FLUTTER_TEST_KEY : RAVE_FLUTTER_LIVE_KEY; ?>';
            var amountPayable = document.getElementById('credit_request_charge').value;
            var total_Amount = amount_deposit > amountPayable ? amount_deposit : amountPayable
            var paymentmodal = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_firstname: document.getElementById('first_name').value,
                customer_lastname: document.getElementById('last_name').value,
                customer_email: document.getElementById('email').value,
                custom_description: 'PAYMENT FOR FUNDING ACCOUNT',
                payment_options: ['card', 'account', 'ussd'],
                amount: Math.floor((total_Amount)).toFixed(2),
                customer_phone: document.getElementById('phone').value,
                currency: "NGN",
                txref: 'ORC<?php echo random_str('alphanum', 10); ?>',
                meta: [{
                    metaname: "AccountFunding",
                    metavalue: "<?php echo random_str('alphanum', 10); ?>"
                }],
                onclose: function () {
                },
                callback: function (response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        // redirect to a success page
                        var userInfo = {
                            tid: response.tx.orderRef,
                            trans_ref: response.tx.txRef,
                            amount: total_Amount,
                            account: response.tx.customer.phone,
                            fullname: response.tx.customer.fullName,
                            desc: 'ACCOUNT FUNDING REQUEST',
                            provider: 'FLUTTER-RAVE',
                            user:<?php echo $_SESSION['H_USER_SESSION_ID']; ?>
                        }
                        // console.log('userInfo',userInfo);
                        savePaymentInfo(userInfo);
                    } else {
                        // redirect to a failure page.
                    }

                    paymentmodal.close(); // use this to close the modal immediately after payment.
                },
                customizations: {
                    title: "ORANGE CREDIT",
                    description: "Account Funding",
                    logo: "https://assets.piedpiper.com/logo.png",
                },
            });
            <?php endif; ?>
        }
    </script>

<?php } ?>
