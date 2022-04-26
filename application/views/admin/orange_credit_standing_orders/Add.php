<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_standing_orders&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_standing_orders&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Standing Orders</h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="payee_id">Payee Id</label>
                    <input id="payee_id" name="payee_id" type="text" maxlength="" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="payee_name">Payee Name</label>
                    <input id="payee_name" name="payee_name" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="payee_account_number">Payee Account Number</label>
                    <input id="payee_account_number" name="payee_account_number" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_amount">Total Amount</label>
                    <input id="total_amount" name="total_amount" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="deductable_amount">Deductible Amount</label>
                    <input id="deductable_amount" name="deductable_amount" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="recieving_account">Receiving Account</label>
                    <input id="recieving_account" name="recieving_account" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="number_of_payment">Number Of Payment</label>
                    <input id="number_of_payment" name="number_of_payment" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="payment_frequency">Payment Frequency</label>
                    <select name="payment_frequency" id="payment_frequency" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Bi-Monthly">Bi-Monthly</option>
                        <option value="Quaterly">Quarterly</option>
                        <option value="Bi-Weekly">Bi-Weekly</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="starting_date">Starting Date</label>
                    <input name="starting_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="next_payment_date">Next Payment Date</label>
                    <input name="next_payment_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="ending_date">Ending Date</label>
                    <input name="ending_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="reference">Reference</label>
                    <input id="reference" name="reference" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <input id="authorizedBy" name="authorizedBy" type="hidden" maxlength="100" value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="form-control styler"/>
                    <input id="order_status" name="order_status" type="hidden" maxlength="100" value="1"
                           class="form-control styler"/>
                    <input name="createdAt" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo date('Y-m-d'); ?>"/>
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
	 