<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_micro_loan_request&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">           
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-reorder"></i>
                    <?php echo LANG_CREATE_NEW; ?>
                    Orange Credit Micro Loan Request
                </h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="loan_type">Loan Type</label>
                    <select  name="loan_type" id="loan_type"
                             class="required form-control styler choz" onchange="SetCreditRecurrentCharge(this)">
                        <option>SELECT ORANGE CREDIT LOAN TYPE</option>
                        <?php foreach ($credit_request_types as $credit) { ?>
                            <option value="<?php echo $credit->id; ?>" loancharge="<?php echo $credit->activation_charge ?>"
                                    loanminamount="<?php echo $credit->minimum_amount ?>"
                                    loantenure="<?php echo $credit->loan_tenure ?>"
                                    loaninterest="<?php echo $credit->interest ?>">
                                <?php echo $credit->loan_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                 <div class="form-group">
                    <label class="control-label" for="business_type">Beneficiary Info</label>
                    <select id="business_type" name="business_type"
                            class="required form-control styler choz" onchange="SetBusinessPlanAmount(this)">
                        <option>SELECT BUSINESS PLAN INFORMATION</option>
                        <?php foreach ($business_plans as $bplan) { ?>
                            <option value="<?php echo $bplan->id; ?>"
                                    amount="<?php echo $bplan->business_investment; ?>"
                                    monthly_revenue="<?php echo $bplan->business_expected_monthly_sales?>" >
                                <?php echo $bplan->business_plan_title; ?> | <?php echo $bplan->business_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_revenue">Monthly Revenue</label>
                    <input id="monthly_revenue" name="monthly_revenue"placeholder="You can only access a hundred percent of your savings with a maximum value of 100,0000.00 only" type="number" min="1000" step="100" maxlength="255" value=""
                           class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_tenure">Loan Tenure</label>
                    <input id="loan_tenure" name="loan_tenure" type="number" readonly="readonly"  value=""
                           class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="loan_interest">Loan Interest rate</label>
                    <input id="loan_interest" name="loan_interest" type="number" readonly="readonly"  value=""
                           class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="loan_request_amount">Loan Request Amount</label>
                    <input id="loan_request_amount" name="loan_request_amount" type="number"  value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_request_deposit">Collateral Deposit</label>
                    <input id="loan_request_deposit" name="loan_request_deposit" type="number" min="1000" value=""
                           class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_repayment_amount">Loan Repayment Amount</label>
                    <input id="loan_repayment_amount" name="loan_repayment_amount" type="number" value="" readonly="readonly"
                           class="form-control styler"/>
                    <div id="monthlyRepayment"></div>
                    <div id="totalRepayment"></div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="activation_fee">Activation Fee</label>
                    <input id="credit_request_charge" name="activation_fee" type="number" readonly="readonly" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <input name="request_date" class="datepicker form-control styler" type="hidden" maxlength="20"
                           value="<?php echo date('Y-m-d'); ?>"/>
                    <input name="loan_status" id="credit_request_activated" type="hidden" maxlength="20" value="PENDING"/>
                    <input id="userid" name="userid" type="hidden" maxlength="20"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler"/>
                </div>


                <input id="credit_request_activated" name="credit_request_activated" type="hidden" maxlength="100"
                       value="" class="form-control styler"/>
                <input id="beneficary_email" name="beneficary_email" type="hidden" maxlength="100" value="<?php echo $beneficary_types->email ; ?>"
                       class="form-control styler"/>
                <input id="beneficary_mobile" name="beneficary_mobile" type="hidden" maxlength="100" value="<?php echo $beneficary_types->phone ; ?>"
                       class="form-control styler"/>
                <input id="beneficary_fn" name="beneficary_fn" type="hidden" maxlength="100" value="<?php echo $beneficary_types->first_name ; ?>"
                       class="form-control styler"/>
                <input id="beneficary_ln" name="beneficary_ln" type="hidden" maxlength="100" value="<?php echo $beneficary_types->last_name ; ?>"
                       class="form-control styler"/>
                <input id="activation_code" name="activation_code" type="hidden" maxlength="100" value="<?php echo random_str('num', 8)?>"
                       class="form-control styler"/>
                <input id="transaction" name="transaction" type="hidden" maxlength="100" value=""
                       class="form-control styler"/>

                <div class="output"></div>
            </div>

            <div class="panel-footer" style="border-bottom:solid 2px #CCC; align-items: center">

                <button type="submit" name="button" id="activator" id="activate-request" class="btn btn-primary btn-lg">
                    <?php echo 'REQUEST LOAN'; ?>
                </button>
<!--                <button type="button" id="activate-request" class="btn btn-success btn-lg"-->
<!--                        onclick="payWithPaystack()"> ACTIVATE YOUR-->
<!--                    CREDIT REQUEST-->
<!--                </button>-->
            </div>



        </div><!--/col-12-->

</form>
<form>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</form>
<script>
    function payWithPaystack() {
        var charge = document.getElementById('credit_request_charge').value;
        var mobile =document.getElementById('beneficary_mobile').value;
        var fname =document.getElementById('beneficary_fn').value;
        var lname =document.getElementById('beneficary_ln').value;
        var email =document.getElementById('beneficary_email').value;

        if(charge == '' && mobile == '' && fname == '' && lname == '' && email == ''){
            console.log('email', {'email':email,'mobile':mobile,'fname':fname,'lname':lname,'charge':charge});
            alert('Some error noted, please reload the page and try again.')
            return;
        }


        var down_payment = document.getElementById('loan_request_deposit').value;    
        var amountCharge = document.getElementById('credit_request_charge').value;       
        var amountPayable = Number((parseFloat(amountCharge) + parseFloat(down_payment))).toFixed(2);
        
        var handler = PaystackPop.setup({
            key: '<?php echo STORE_STATUS == 'development'? PAYSTACK_TEST_KEY : PAYSTACK_LIVE_KEY ;?>',
            email: document.getElementById('beneficary_email').value,
            amount: Number((amountPayable * 100)).toFixed(2),
            currency: "NGN",
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            firstname: document.getElementById('beneficary_fn').value,
            lastname: document.getElementById('beneficary_ln').value,
            // label: "Optional string that replaces customer email"
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: document.getElementById('beneficary_mobile').value
                    }
                ]
            },
            callback: function (response) {
                <?php if (STORE_STATUS == 'development'){?>
                alert('success. transaction ref is ' + response.reference);
                <?php };?>
                console.info('response', response);
                if(response.status === 'success') {
                    var showSubscribeButton = document.getElementById('activator');
                    showSubscribeButton.style.visibility = 'visible';

                    var hideActivatorButton = document.getElementById('activate-request');
                    hideActivatorButton.style.visibility = 'hidden';
                    document.getElementById('credit_request_activated').value = response.message === 'Approved'?'PROCESSING':'PENDING';
                    document.getElementById('activation_code').value = response.reference;
                    document.getElementById('transaction').value = response.transaction;
                }

            },
            onClose: function () {
                alert('window closed');
            }
        });
        handler.openIframe();
    }
</script>