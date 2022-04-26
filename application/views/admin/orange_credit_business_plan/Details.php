<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Business Information</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_business_plan&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

<!--                    <a href="--><?php //echo H_ADMIN; ?><!--&view=orange_credit_business_plan&do=add"-->
<!--                       class="btn btn-default btn-xs tip" title="--><?php //echo LANG_TIP_ADD; ?><!--"><i-->
<!--                                class="fa fa-plus"></i> --><?php //echo LANG_ADD; ?><!--</a>-->

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_business_plan&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_business_plan&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Business Name</th>
                        <td><?php echo $rows->business_name; ?></td>
                    </tr>

                    <tr>
                        <th>Business Address</th>
                        <td><?php echo $rows->business_address; ?></td>
                    </tr>

                    <tr>
                        <th>Business Manager</th>
                        <td><?php echo $rows->business_manager; ?></td>
                    </tr>

                    <tr>
                        <th>Business Type</th>
                        <td><?php echo $rows->business_type; ?></td>
                    </tr>

                    <tr>
                        <th>Business Market Demand</th>
                        <td><?php echo $rows->business_market_demand; ?></td>
                    </tr>

                    <tr>
                        <th>Business Sales Frequency</th>
                        <td><?php echo $rows->business_sales_frequency; ?></td>
                    </tr>

                    <tr>
                        <th>Business Monthly Revenue</th>
                        <td><?php echo $rows->business_monthly_revenue; ?></td>
                    </tr>

                    <tr>
                        <th>Business Investment</th>
                        <td><?php echo $rows->business_investment; ?></td>
                    </tr>

                    <tr>
                        <th>Business Investment Duration</th>
                        <td><?php echo $rows->business_investment_duration; ?></td>
                    </tr>

                    <tr>
                        <th>Business Estimated Profit Margin</th>
                        <td><?php echo $rows->business_estimated_profit_margin; ?></td>
                    </tr>

                    <tr>
                        <th>Business Expected Monthly Sales</th>
                        <td><?php echo $rows->business_expected_monthly_sales; ?></td>
                    </tr>

                    <tr>
                        <th>Business Coupon Code</th>
                        <td><?php echo $rows->business_coupon_code; ?></td>
                    </tr>

<!--                    <tr>-->
<!--                        <th>Business entry Status</th>-->
<!--                        <td>--><?php //echo $rows->business_plan_status; ?><!--</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <th>Business Date Applied</th>-->
<!--                        <td>--><?php //echo $rows->business_date_applied; ?><!--</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <th>Business Date Approved</th>-->
<!--                        <td>--><?php //echo $rows->business_date_approved; ?><!--</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <th>Business Plan User</th>-->
<!--                        <td>--><?php //echo $rows->business_plan_user; ?><!--</td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	