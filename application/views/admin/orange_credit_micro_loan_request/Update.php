<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_micro_loan_request&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Micro Loan Request</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="loan_type">Loan Type</label>
                    <select name="loan_type" id="loan_type"
                            class="required form-control styler choz" onchange="SetCreditRecurrentCharge(this)">
                        <option>SELECT SCHOOL CREDIT TYPE</option>
                        <?php foreach ($credit_request_types as $credit) { ?>
                            <option value="<?php echo $credit->id; ?>" data="<?php echo $credit->interest ?>"
                                    groupid="<?php echo $credit->minimum_amount ?>"
                                    <?php if ($credit->id == $rows->micro_loan_type){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $credit->loan_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
              
                  <div class="form-group">
                    <label class="control-label" for="business_type">Beneficiary Info</label>
                    <select id="business_type" name="business_type"
                            class="required form-control styler choz">
                        <option>SELECT BUSINESS PLAN INFORMATION</option>
                        <?php foreach ($business_plans as $bplan) { ?>
                            <option value="<?php echo $bplan->id; ?>"
                                    <?php if ($bplan->id == $rows->business_type){ ?>selected="selected"<?php } ?> >
                                <?php echo $bplan->business_plan_title; ?> | <?php echo $bplan->business_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_revenue">Monthly Revenue</label>
                    <input id="monthly_revenue" name="monthly_revenue" type="text" maxlength="255"
                           value="<?php echo $rows->monthly_revenue; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_request_amount">Loan Request Amount</label>
                    <input id="loan_request_amount" name="loan_request_amount" type="text" maxlength="255"
                           value="<?php echo $rows->loan_request_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_repayment_amount">Loan Repayment Amount</label>
                    <input id="loan_repayment_amount" name="loan_repayment_amount" type="text" maxlength="255"
                           value="<?php echo $rows->loan_repayment_amount; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_tenure">Loan Tenure</label>
                    <input id="loan_tenure" name="loan_tenure" type="text" maxlength="20"
                           value="<?php echo $rows->loan_tenure; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_interest">Loan Interest</label>
                    <input id="loan_interest" name="loan_interest" type="text" maxlength="20"
                           value="<?php echo $rows->loan_interest; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="activation_fee">Activation Fee</label>
                    <input id="activation_fee" name="activation_fee" type="text" maxlength="20"
                           value="<?php echo $rows->activation_fee; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="request_date">Request Date</label>
                    <input name="request_date" class="form-control styler" type="text" maxlength="20"
                           value="<?php echo $rows->request_date; ?>" readonly="readonly"/>
                </div>


                <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5) { ?>
                    <div class="form-group">
                        <label class="control-label" for="loan_status">Loan Status</label>
                        <input name="loan_status" id="loan_status" type="text" maxlength="20"
                               value="<?php echo $rows->loan_status; ?>" readonly class="form-control styler"/>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
                    <div class="form-group">
                        <label class="control-label" for="loan_status">Loan Status</label>
                        <select name="loan_status" id="loan_status" class=" form-control styler choz">
                            <option value="<?php echo $rows->loan_status; ?>"><?php echo $rows->loan_status; ?></option>
                            <option value="PENDING">PENDING</option>
                            <option value="PROCESSING">PROCESSING</option>
                            <option value="APPROVED">APPROVED</option>
                            <option value="DECLINED">DECLINED</option>
                            <option value="CANCELLED">CANCELLED</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="userid">Loan Applicant</label>
                        <input id="userid" name="userid" type="text" maxlength="20" value="<?php echo $rows->userid; ?>"
                               class="form-control styler" readonly="readonly"/>
                    </div>
                <?php } ?>


                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <?php if($rows->loan_status != 'APPROVED' || $rows->loan_status != 'DECLINED' || $rows->loan_status != 'CANCELLED'){ ?>
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_UPDATE_RECORD; ?>"/>
                <?php } ?>
            </div>


        </div><!--/col-12-->

</form>
	 