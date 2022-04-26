<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_payment
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_loan_payment&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_loan_payment&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_loan_payment&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-reorder"></i>
                    <?php echo LANG_UPDATE; ?>
                    Orange Credit Loan Payment</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="payment_date">Payment Date</label>
                    <input name="payment_date" class="datepicker form-control styler" type="text" maxlength="10"
                           value="<?php echo $rows->payment_date; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="paid_amount">Paid Amount</label>
                    <input id="paid_amount" name="paid_amount" type="text" maxlength="10"
                           value="<?php echo $rows->paid_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="principle_amount">Principle Amount</label>
                    <input id="principle_amount" name="principle_amount" type="text" maxlength="10"
                           value="<?php echo $rows->principle_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="interest_amount">Interest Amount</label>
                    <input id="interest_amount" name="interest_amount" type="text" maxlength="10"
                           value="<?php echo $rows->interest_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="balance">Balance</label>
                    <input id="balance" name="balance" type="text" maxlength="10" value="<?php echo $rows->balance; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="userid">Userid</label>
                    <input id="userid" name="userid" type="text" maxlength="20" value="<?php echo $rows->userid; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_id">Loan Id</label>
                    <input id="loan_id" name="loan_id" type="text" maxlength="20" value="<?php echo $rows->loan_id; ?>"
                           class="form-control styler"/>
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
	 