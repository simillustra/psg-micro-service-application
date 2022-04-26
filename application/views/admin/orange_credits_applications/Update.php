<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credits_applications&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-reorder"></i>
                    Orange Credits Applications
                </h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="request_beneficary">Request Beneficiary</label>
                    <input id="request_beneficary" name="request_beneficary" type="hidden" maxlength="100"
                           value="<?php echo $rows->request_beneficary; ?>" class="form-control styler" readonly/>
                    <input id="recieving_account" name="recieving_account" type="hidden" maxlength="100"
                           value="<?php echo ADMIN_ACCOUNT_NUMBER ?>" class="form-control styler" readonly/>
                    <input id="payee_account_number" name="payee_account_number" type="hidden" maxlength="100"
                           value="<?php echo $rows->phone; ?>" class="form-control styler" readonly/>
                    <input id="payee_name" name="payee_name" type="text" maxlength="100"
                           value="<?php echo $beneficary_types->first_name . ' ' . $beneficary_types->last_name; ?>"
                           class="form-control styler" readonly/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="request_type">Request Type</label>
                    <input id="loan_name" name="loan_name" type="text" maxlength="100"
                           value="<?php echo $loan_types->loan_name; ?>" class="form-control styler" readonly/>

                    <input id="request_type" name="request_type" type="hidden" maxlength="100"
                           value="<?php echo $rows->request_type; ?>" class="form-control styler" readonly/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="amount_requested">Amount Requested</label>
                    <input id="amount_requested" name="amount_requested" type="text" maxlength="100"
                           value="<?php echo $rows->amount_requested; ?>" class="form-control styler" readonly/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="amount_approved">Amount Approved</label>
                    <input id="amount_approved" name="amount_approved" type="text" maxlength="100"
                           value="" class="form-control styler" required/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment">Monthly Repayment</label>
                    <input id="monthly_repayment" name="monthly_repayment" type="text" maxlength="100"
                           value="<?php echo $rows->monthly_repayment; ?>" class="form-control styler" readonly/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_repayment">Total Repayment</label>
                    <input id="total_repayment" name="total_repayment" type="text" maxlength="100"
                           value="<?php echo $rows->total_repayment; ?>" class="form-control styler" readonly/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_interest">Total Interest</label>
                    <input id="total_interest" name="total_interest" type="text" maxlength="100"
                           value="<?php echo $rows->total_interest; ?>" class="form-control styler" readonly/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_request_deposit">Collateral Deposit</label>
                    <input id="loan_request_deposit" name="loan_request_deposit" type="number" min="1000" value=""
                           class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="application_status">Application Status</label>
                    <select name="application_status" id="application_status" class=" form-control styler choz">
                        <option value="<?php echo $rows->application_status; ?>"><?php echo $rows->application_status; ?></option>
                        <option value="PENDING">PENDING</option>
                        <option value="PROCESSING">PROCESSING</option>
                        <option value="APPROVED">APPROVED</option>
                        <option value="CANCELLED">CANCELLED</option>
                        <option value="DECLINED">DECLINED</option>
                    </select>
                </div>


                <div class="form-group">
                    <label class="control-label" for="charge_account_every">Charge Account Every</label>
                    <input id="charge_account_every" name="charge_account_every" type="text" maxlength="11"
                           value="<?php echo $rows->charge_account_every; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment_starts">Monthly Repayment Starts</label>
                    <input name="monthly_repayment_starts" class="datepicker form-control styler" type="text"
                           maxlength="11" value="<?php echo $rows->monthly_repayment_starts; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment_ends">Monthly Repayment Ends</label>
                    <input name="monthly_repayment_ends" class="datepicker form-control styler" type="text"
                           maxlength="11" value="<?php echo $rows->monthly_repayment_ends; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="comments">Comments</label>
                    <input id="comments" name="comments" type="text" maxlength="100"
                           value="<?php echo $rows->comments; ?>" class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="has_standing_order">SET Standing Order</label>
                    <select name="has_standing_order" id="has_standing_order" class=" form-control styler choz">

                        <option value="FALSE" <?php if ($rows->has_standing_order === 'FALSE') {
                            echo 'selected';
                        }; ?>">NO, STANDING ORDER ACTIVE</option>
                        <option value="TRUE" <?php if ($rows->has_standing_order === 'TRUE') {
                            echo 'selected';
                        }; ?>>YES, ACTIVATE STANDING ORDER
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="standing_order_id">Standing Order Id</label>
                    <input id="standing_order_id" name="standing_order_id" type="text" maxlength="10"
                           value="<?php echo $rows->standing_order_id; ?>" class="form-control styler" readonly/>
                </div>
                <div class="form-group">
                    <input id="phone" name="phone" type="hidden" maxlength="100"
                           value="<?php echo $beneficary_types->phone ?>" class="form-control styler" readonly/>
                    <input id="loan_tenure" name="loan_tenure" type="hidden" readonly="readonly"
                           value="<?php echo $loan_types->loan_tenure; ?>"
                           class="form-control styler"/>
                    <input id="loan_interest" name="loan_interest" type="hidden" readonly="readonly"
                           value="<?php echo $loan_types->interest; ?>"
                           class="form-control styler"/>
                    <input id="activation_charge" name="activation_charge" type="hidden" maxlength="100"
                           value="<?php echo $rows->activation_charge; ?>" class="form-control styler" readonly/>
                    <input id="sponsor_id" name="sponsor_id" type="hidden" maxlength="100"
                           value="<?php echo $rows->sponsor_id; ?>" class="form-control styler" readonly/>
                    <input id="activation_code" name="activation_code" type="hidden" maxlength="100"
                           value="<?php echo $rows->activation_code; ?>" class="form-control styler" readonly/>
                    <input id="approved_by" name="approved_by" type="hidden" maxlength="100"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler"/>
                    <input name="approvedAt" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                    <input name="createdAt" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo $rows->createdAt; ?>" readonly/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <?php if ($rows->application_status !== 'APPROVED') { ?>
                    <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                                class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
                    <input type="submit" name="button" id="hButton" class="hidden"
                           value="<?php echo LANG_UPDATE_RECORD; ?>"/>
                <?php } ?>
            </div>


        </div><!--/col-12-->

</form>
	 