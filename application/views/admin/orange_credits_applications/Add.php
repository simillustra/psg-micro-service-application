<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credits_applications&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credits Applications</h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="activation_code">Activation Code</label>
                    <input id="activation_code" name="activation_code" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="request_beneficary">Request Beneficary</label>
                    <input id="request_beneficary" name="request_beneficary" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="request_type">Request Type</label>
                    <input id="request_type" name="request_type" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sponsor_id">Sponsor Id</label>
                    <input id="sponsor_id" name="sponsor_id" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="amount_requested">Amount Requested</label>
                    <input id="amount_requested" name="amount_requested" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="amount_approved">Amount Approved</label>
                    <input id="amount_approved" name="amount_approved" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="activation_charge">Activation Charge</label>
                    <input id="activation_charge" name="activation_charge" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment">Monthly Repayment</label>
                    <input id="monthly_repayment" name="monthly_repayment" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_repayment">Total Repayment</label>
                    <input id="total_repayment" name="total_repayment" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_interest">Total Interest</label>
                    <input id="total_interest" name="total_interest" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="application_status">Application Status</label>
                    <select name="application_status" id="application_status" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="PENDING">PENDING</option>
                        <option value="PROCESSING">PROCESSING</option>
                        <option value="APPROVED">APPROVED</option>
                        <option value="CANCELLED">CANCELLED</option>
                        <option value="DECLINED">DECLINED</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="createdAt">CreatedAt</label>
                    <input name="createdAt" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="charge_account_every">Charge Account Every</label>
                    <input id="charge_account_every" name="charge_account_every" type="text" maxlength="11" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment_starts">Monthly Repayment Starts</label>
                    <input name="monthly_repayment_starts" class="datepicker form-control styler" type="text"
                           maxlength="11" value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="monthly_repayment_ends">Monthly Repayment Ends</label>
                    <input name="monthly_repayment_ends" class="datepicker form-control styler" type="text"
                           maxlength="11" value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="comments">Comments</label>
                    <input id="comments" name="comments" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="approved_by">Approved By</label>
                    <input id="approved_by" name="approved_by" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="approvedAt">ApprovedAt</label>
                    <input name="approvedAt" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="has_standing_order">Has Standing Order</label>
                    <input id="has_standing_order" name="has_standing_order" type="text" maxlength="10" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="standing_order_id">Standing Order Id</label>
                    <input id="standing_order_id" name="standing_order_id" type="text" maxlength="10" value=""
                           class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 