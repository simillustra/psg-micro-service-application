<?php
/*
* =======================================================================
* FILE NAME:        Add.php
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
    '&view=orange_credits_accounts&do=addpro'; ?>" method="post" name="hezecomform" id="hezecomform"
      enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo
                LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo
            LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo
               LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo
                LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo
                    LANG_CREATE_NEW; ?> Orange Credits Accounts</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="acct_number">Acct Number</label>
                    <input id="acct_number" name="acct_number" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="user_id">User Id</label>
                    <input id="user_id" name="user_id" type="text" maxlength="11" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="acct_status">Acct Status</label>
                    <input id="acct_status" name="acct_status" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="acct_opendate">Acct Opendate</label>
                    <input name="acct_opendate" class="datepicker form-control styler" type="text" maxlength="25"
                           value="<?php echo
                           date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="account_type">Account Type</label>
                    <input id="account_type" name="account_type" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="account_credit_balance">Account Credit Balance</label>
                    <input id="account_credit_balance" name="account_credit_balance" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="account_debit_balance">Account Debit Balance</label>
                    <input id="account_debit_balance" name="account_debit_balance" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="createdAt">CreatedAt</label>
                    <input name="createdAt" class="datepicker form-control styler" type="text" maxlength="25"
                           value="<?php echo
                           date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="modifiedAt">ModifiedAt</label>
                    <input name="modifiedAt" class="datepicker form-control styler" type="text" maxlength="25"
                           value="<?php echo
                           date('Y-m-d'); ?>"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo
                    LANG_CREATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo
                LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 