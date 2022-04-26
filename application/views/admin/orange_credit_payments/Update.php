<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_payments
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_payments&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payments&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payments&id=<?php echo $rows->id; ?>&do=delete&dfile="
               title="<?php echo LANG_TIP_DELETE; ?>" class="btn btn-default btn-sm tip"
               data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE; ?>
            </a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payments&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Payments</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="transaction_id">Transaction Id</label>
                    <input id="transaction_id" name="transaction_id" type="text" maxlength="100"
                           value="<?php echo $rows->transaction_id; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_amount">Transaction Amount</label>
                    <input id="transaction_amount" name="transaction_amount" type="text" maxlength="100"
                           value="<?php echo $rows->transaction_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_desc">Transaction Desc</label>
                    <input id="transaction_desc" name="transaction_desc" type="text" maxlength="250"
                           value="<?php echo $rows->transaction_desc; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_provider">Transaction Provider</label>
                    <input id="transaction_provider" name="transaction_provider" type="text" maxlength="100"
                           value="<?php echo $rows->transaction_provider; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_status">Transaction Status</label>
                    <input id="transaction_status" name="transaction_status" type="text" maxlength="100"
                           value="<?php echo $rows->transaction_status; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_date">Transaction Date</label>
                    <input name="transaction_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->transaction_date; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="transaction_user">Transaction User</label>
                    <input id="transaction_user" name="transaction_user" type="text" maxlength="20"
                           value="<?php echo $rows->transaction_user; ?>" class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_UPDATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 