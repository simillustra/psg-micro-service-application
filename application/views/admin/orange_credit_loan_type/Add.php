<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_type
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_loan_type&do=addpro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_loan_type&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Loan Type</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="loan_name">Loan Name</label>
                    <input id="loan_name" name="loan_name" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="prefix">Prefix</label>
                    <input id="prefix" name="prefix" type="text" maxlength="25" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="maximum_amount">Maximum Amount</label>
                    <input id="maximum_amount" name="maximum_amount" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="minimum_amount">Minimum Amount</label>
                    <input id="minimum_amount" name="minimum_amount" type="text" maxlength="25" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="loan_tenure">Loan Tenure</label>
                    <input id="loan_tenure" name="loan_tenure" type="text" maxlength="10" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="activation_charge">Activation Charge</label>
                    <input id="activation_charge" name="activation_charge" type="text" maxlength="10" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="interest">Interest</label>
                    <input id="interest" name="interest" type="text" maxlength="10" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="status">Status</label>
                    <input id="status" name="status" type="text" maxlength="25" value="active" class="form-control styler"/>
                </div>

                <input name="createdAt" class="datepicker form-control styler" type="hidden" maxlength="25"
                       value="<?php echo date('Y-m-d'); ?>"/>
                <input name="modifiedAt" class="datepicker form-control styler" type="hidden" maxlength="25"
                       value="<?php echo date('Y-m-d'); ?>"/>
                <input id="user_id" name="user_id" type="hidden" maxlength="1"
                       value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler"/>

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
	 