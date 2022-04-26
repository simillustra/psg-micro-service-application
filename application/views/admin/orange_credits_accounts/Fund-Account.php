<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN .
    '&view=orange_credits_accounts&do=applyfunds'; ?>" method="post" name="hezecomform" id="hezecomform"
      enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">

            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&id=<?php echo $_SESSION['H_USER_ACCOUNT_NUMBER']; ?>&do=details" title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo
                LANG_DETAILS; ?></a>


            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo
               LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo
                LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i>Fund Account</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
                <div class="form-group">
                    <label class="control-label" for="acct_number">ACCOUNT NUMBER:</label>
                    <input id="acct_number" name="acct_number" type="text" maxlength="25" value="<?php echo
                    $rows->acct_number; ?>" class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_payment_token">COUPON / PAYMENT TOKEN:</label>
                    <input id="coupon_payment_token" name="coupon_payment_token" type="text" maxlength="25"
                           value="" class="form-control styler" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_token_amount">COUPON / PAYMENT AMOUNT:</label>
                    <input id="coupon_token_amount" name="coupon_token_amount" type="text" maxlength="25"
                           value="" class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_desc">TRANSFER DESCRIPTION:</label>
                    <input id="transaction_desc" name="transaction_desc" type="text" maxlength="200"
                           value="" class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="transaction_charge">TRANSFER CHARGE:</label>
                    <input id="transaction_charge" name="transaction_charge" type="text" maxlength="25"
                           value="20.00" class="form-control styler" readonly="readonly" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="account_credit_balance">AVAILABLE BALANCE</label>
                    <input id="account_credit_balance" name="account_credit_balance" type="text" maxlength="25"
                           value="<?php echo
                           $rows->account_balance; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <input name="coupon_token_id" id="coupon_token_id" class="form-control styler" type="hidden" maxlength="100"
                       value="" readonly="readonly"/>
                <input name="coupon_token_account" id="coupon_token_account" class="form-control styler" type="hidden" maxlength="100"
                       value="" readonly="readonly"/>
                <input name="transactionid" class="form-control styler" type="hidden" maxlength="100"
                       value="<?php echo random_str('num'); ?>" readonly="readonly"/>
                <input id="user_id" name="user_id" type="hidden" maxlength="11" value="<?php echo
                $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler" readonly="readonly"/>

            </div>

            <div class="output"></div>
        </div>
        <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
            <label for="hButton" class="btn btn-info" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo
                LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo
            LANG_UPDATE_RECORD; ?>"/>
        </div>


    </div><!--/col-12-->

</form>
<!-- Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Account Preview</h4>
            </div>
            <div class="modal-body">
                <h2 class="modal-title">Account Name</h2>
                <h3 class="modal-title">Account Number</h3>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelCoupon" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK proceed!</button>
            </div>
        </div>
    </div>
</div>
	 