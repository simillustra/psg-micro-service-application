<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_business_plan&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_business_plan&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Business Information</h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>
                
                 <div class="form-group">
                    <label class="control-label" for="business_plan_title">Business Summary</label>
                    <input id="business_plan_title" name="business_plan_title" placeholder="e.g My Poultry Business" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>


                <div class="form-group">
                    <label class="control-label" for="business_name">Business Name</label>
                    <input id="business_name" name="business_name" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_address">Business Address</label>
                    <input id="business_address" name="business_address" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_manager">Business Manager</label>
                    <select name="business_manager" id="business_manager" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="SELF MANAGED">SELF MANAGED</option>
                        <option value="EMPLOYED PERSONNEL">EMPLOYED PERSONNEL</option>
                        <option value="FAMILY MEMBER">FAMILY MEMBER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_type">Business Type</label>
                    <select name="business_type" id="business_type" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="TRADER">TRADER</option>
                        <option value="SERVICE PROVIDER">SERVICE PROVIDER</option>
                        <option value="FARMER">FARMER</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_market_demand">Business Market Demand</label>
                    <select name="business_market_demand" id="business_market_demand" class=" form-control styler choz">
                        <option value=""></option>
                        <option value="HIGH DEMAND">HIGH DEMAND</option>
                        <option value="AVERAGE  DEMAND">AVERAGE DEMAND</option>
                        <option value="MEDUIM  DEMAND">MEDUIM DEMAND</option>
                        <option value="LOW  DEMAND">LOW DEMAND</option>
                        <option value="SEASONAL DEMAND">SEASONAL DEMAND</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_sales_frequency">Business Sales Frequency</label>
                    <select name="business_sales_frequency" id="business_sales_frequency"
                            class=" form-control styler choz">
                        <option value=""></option>
                        <option value="DAILY">DAILY</option>
                        <option value="WEEKLY">WEEKLY</option>
                        <option value="MONTHLY">MONTHLY</option>
                        <option value="QUARTERLY">QUARTERLY</option>
                        <option value="YEARLY">YEARLY</option>
                        <option value="OTHER">OTHER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_monthly_revenue">Business Monthly Revenue</label>
                    <select name="business_monthly_revenue" id="business_monthly_revenue"
                            class=" form-control styler choz">
                        <option value=""></option>
                        <option value="BETWEEN_N10K_N50K">BETWEEN N10K N50K</option>
                        <option value="BETWEEN_N50K_TO_100K">BETWEEN N50K TO 100K</option>
                        <option value="BETWEEN_N100K_N250K">BETWEEN N100K N250K</option>
                        <option value="ABOVE_N250K">ABOVE N250K</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_investment">Business Investment</label>
                    <input id="business_investment" name="business_investment" placeholder="How much do you need to empower your business? e.g 10000" type="number" min="10000" step="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_investment_duration">Business Investment Duration</label>
                    <select name="business_investment_duration" id="business_investment_duration"
                            class=" form-control styler choz">
                        <option value=""></option>
                        <option value="1 MONTH">1 MONTH</option>
                        <option value="2 MONTHS">2 MONTHS</option>
                        <option value="3 MONTHS">3 MONTHS</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_estimated_profit_margin">Business Estimated Profit
                        Margin</label>
                    <select name="business_estimated_profit_margin" id="business_estimated_profit_margin"
                            class=" form-control styler choz">
                        <option value=""></option>
                        <option value="BELOW 10%">BELOW 10%</option>
                        <option value="BETWEEN 10-15%">BETWEEN 10-15%</option>
                        <option value="BETWEEN 15-25%">BETWEEN 15-25%</option>
                        <option value="BETWEEN 25-50%">BETWEEN 25-50%</option>
                        <option value="ABOVE 50%">ABOVE 50%</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_expected_monthly_sales">Business Expected Monthly
                        Sales</label>
                    <input id="business_expected_monthly_sales" name="business_expected_monthly_sales" placeholder="How much are you expecting to make in your sales every month? e.g 10000" type="number"
                           min="1000" step="100" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="business_coupon_code">Business Code</label>
                    <input id="business_coupon_code" name="business_coupon_code" type="text" maxlength="100" value="<?php echo strtoupper(random_str('alphanum',8))?>"
                           class="form-control styler" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <input id="business_plan_status" name="business_plan_status" type="hidden" maxlength="100"
                           value="APPROVED" class="form-control styler"/>
                    <input name="business_date_applied" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input name="business_date_approved" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="business_plan_user" name="business_plan_user" type="hidden" maxlength="20"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler"/>
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
	 