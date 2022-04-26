<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_payments
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
                <h3 class="box-title">Orange Credit Payments</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payments&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_payments&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Transaction Id</th>
                        <td><?php echo $rows->transaction_id; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Amount</th>
                        <td><?php echo $rows->transaction_amount; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Desc</th>
                        <td><?php echo $rows->transaction_desc; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Provider</th>
                        <td><?php echo $rows->transaction_provider; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Status</th>
                        <td><?php echo $rows->transaction_status; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Date</th>
                        <td><?php echo $rows->transaction_date; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction User</th>
                        <td><?php echo $rows->transaction_user; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	