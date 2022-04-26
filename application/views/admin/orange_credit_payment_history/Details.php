<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_payment_history
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
                <h3 class="box-title">Re-Payment History</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payment_history&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_payment_history&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Userid</th>
                        <td><?php echo $rows->userid; ?></td>
                    </tr>

                    <tr>
                        <th>Account Number</th>
                        <td><?php echo $rows->account_id; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Method</th>
                        <td><?php echo $rows->payment_method; ?></td>
                    </tr>

                    <tr>
                        <th>Loan Id</th>
                        <td><?php echo $rows->loan_id; ?></td>
                    </tr>

                    <tr>
                        <th>Re-paying Amount</th>
                        <td><?php echo $rows->amount; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Status</th>
                        <td><?php echo $rows->status; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction ID</th>
                        <td><?php echo $rows->transaction_id; ?></td>
                    </tr>

                    <tr>
                        <th>Ref ID</th>
                        <td><?php echo $rows->ref_id; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Due Date:</th>
                        <td><?php echo $rows->charged_day; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	