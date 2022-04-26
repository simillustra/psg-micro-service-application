<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
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
                <h3 class="box-title">Orange Credit Micro Loan Request</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=add"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_ADD; ?>"><i
                                class="fa fa-plus"></i> <?php echo LANG_ADD; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_micro_loan_request&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Loan Type</th>
                        <td><?php echo $rows->loan_type; ?></td>
                    </tr>

                    <tr>
                        <th>Business Type</th>
                        <td><?php echo $rows->business_type; ?></td>
                    </tr>

                    <tr>
                        <th>Monthly Revenue</th>
                        <td><?php echo $rows->monthly_revenue; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Request Amount</th>
                        <td><?php echo $rows->loan_request_amount; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Repayment Amount</th>
                        <td><?php echo $rows->loan_repayment_amount; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Tenure</th>
                        <td><?php echo $rows->loan_tenure; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Interest</th>
                        <td><?php echo $rows->loan_interest; ?></td>
                    </tr>

                    <tr>
                        <th>Activation Fee</th>
                        <td><?php echo $rows->activation_fee; ?></td>
                    </tr>

                    <tr>
                        <th>Request Date</th>
                        <td><?php echo $rows->request_date; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Status</th>
                        <td><?php echo $rows->loan_status; ?></td>
                    </tr>

                    <tr>
                        <th>Userid</th>
                        <td><?php echo $rows->userid; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	