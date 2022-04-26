<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_coupons
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_coupons&do=updatepro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Coupons</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="coupon_code">Coupon Code</label>
                    <input id="coupon_code" name="coupon_code" type="text" readonly="readonly" maxlength="100"
                           value="<?php echo $rows->coupon_code; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_amount">Coupon Amount</label>
                    <input id="coupon_amount" name="coupon_amount" type="text" readonly="readonly" maxlength="100"
                           value="<?php echo $rows->coupon_amount; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_trans_id">Coupon Trans Id</label>
                    <input id="coupon_trans_id" name="coupon_trans_id" type="text" readonly="readonly" maxlength="100"
                           value="<?php echo $rows->coupon_trans_id; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_payment_mode">Coupon Payment Mode</label>
                    <input id="coupon_payment_mode" name="coupon_payment_mode" type="text" readonly="readonly"
                           maxlength="100"
                           value="<?php echo $rows->coupon_payment_mode; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="coupon_status">Coupon Status</label>
                    <select name="coupon_status" id="coupon_status" class=" form-control styler choz">
                        <option value="PROCESSING" <?php echo $rows->coupon_status === 'PROCESSING' ? 'selected' : ''; ?>>
                            PROCESSING
                        </option>
                        <option value="BLOCKED" <?php echo $rows->coupon_status === 'BLOCKED' ? 'selected' : ''; ?>>
                            BLOCK THIS COUPON
                        </option>
                        <option value="CANCELED" <?php echo $rows->coupon_status === 'CANCELED' ? 'selected' : ''; ?>>
                            CANCEL THIS COUPON
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <input name="coupon_date_added" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo $rows->coupon_date_added; ?>"/>
                    <input name="coupon_date_activated" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                    <input id="coupon_user" name="coupon_user" type="hidden" maxlength="20"
                           value="<?php echo $rows->coupon_user; ?>" class="form-control styler"/>
                    <input id="coupon_account" name="coupon_account" type="hidden" maxlength="20"
                           value="<?php echo $rows->coupon_account; ?>"
                           class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;">
                    <i class="fa fa-floppy-o"></i> <?php echo 'UPDATE COUPON'; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_UPDATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 