<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_coupons
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_coupons&do=addpro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-reorder"></i>
                    <?php echo LANG_CREATE_NEW; ?>
                    Orange Credit Coupons
                </h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="coupon_code">Coupon Code</label>
                    <input id="coupon_code" name="coupon_code" type="text"
                           value="<?php echo random_str('num', 16); ?>"
                           class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_amount">Coupon Amount</label>
                    <input id="coupon_amount" name="coupon_amount" type="number" max="1000000" min="500" value="500"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <input id="coupon_trans_id" name="coupon_trans_id" type="text"
                           value="<?php echo strtoupper(random_str('alphanum', 12)); ?>"
                           class="form-control styler"/>
                    <input id="coupon_payment_mode" name="coupon_payment_mode" type="hidden" maxlength="100"
                           value="ORANGECREDIT WALLET PAYMENT"
                           class="form-control styler"/>
                    <input id="coupon_status" name="coupon_status" type="hidden" maxlength="100" value="PROCESSING"
                           class="form-control styler"/>
                    <input name="coupon_date_added" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                    <input name="coupon_date_activated" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="coupon_user" name="coupon_user" type="hidden" maxlength="20"
                           value="<?php echo (int)$_SESSION['H_USER_SESSION_ID'] ?>"
                           class="form-control styler"/>
                    <input id="coupon_account" name="coupon_account" type="hidden" maxlength="20"
                           value="<?php echo (int)$_SESSION['H_USER_ACCOUNT_NUMBER'] ?>"
                           class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;">
                    <i class="fa fa-floppy-o"></i>
                    <?php echo 'GENERATE COUPON'; ?>
                </label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 