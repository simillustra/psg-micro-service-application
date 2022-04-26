<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_standing_orders&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_standing_orders&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_standing_orders&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Standing Orders</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="payee_id">Payee Id</label>
                    <input id="payee_id" name="payee_id" type="text" maxlength="" value="<?php echo $rows->payee_id; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="payee_name">Payee Name</label>
                    <input id="payee_name" name="payee_name" type="text" maxlength="100"
                           value="<?php echo $rows->payee_name; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="payee_account_number">Payee Account Number</label>
                    <input id="payee_account_number" name="payee_account_number" type="text" maxlength="100"
                           value="<?php echo $rows->payee_account_number; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="total_amount">Total Amount</label>
                    <input id="total_amount" name="total_amount" type="text" maxlength="100"
                           value="<?php echo $rows->total_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="deductable_amount">Deductable Amount</label>
                    <input id="deductable_amount" name="deductable_amount" type="text" maxlength="100"
                           value="<?php echo $rows->deductable_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="recieving_account">Recieving Account</label>
                    <input id="recieving_account" name="recieving_account" type="text" maxlength="100"
                           value="<?php echo $rows->recieving_account; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="number_of_payment">Number Of Payment</label>
                    <input id="number_of_payment" name="number_of_payment" type="text" maxlength="100"
                           value="<?php echo $rows->number_of_payment; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="order_status">Order Status</label>
                    <input id="order_status" name="order_status" type="text" maxlength="100"
                           value="<?php echo $rows->order_status; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="payment_frequency">Payment Frequency</label>
                    <select name="payment_frequency" id="payment_frequency" class=" form-control styler choz">
                        <option value="<?php echo $rows->payment_frequency; ?>"><?php echo $rows->payment_frequency; ?></option>
                        <option value="3">Bi-Weekly</option>
                        <option value="7">Weekly</option>
                        <option value="14">Bi-Monthly</option>
                        <option value="30">Monthly</option>
                        <option value="90">Quarterly</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="starting_date">Starting Date</label>
                    <input name="starting_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->starting_date; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="next_payment_date">Next Payment Date</label>
                    <input name="next_payment_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->next_payment_date; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="ending_date">Ending Date</label>
                    <input name="ending_date" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->ending_date; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="authorizedBy">AuthorizedBy</label>
                    <input id="authorizedBy" name="authorizedBy" type="text" maxlength="100"
                           value="<?php echo $rows->authorizedBy; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="reference">Reference</label>
                    <input id="reference" name="reference" type="text" maxlength="100"
                           value="<?php echo $rows->reference; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="createdAt">CreatedAt</label>
                    <input name="createdAt" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->createdAt; ?>"/>
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
	 