<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_transactions
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
                <h3 class="box-title">Orange Credit Transactions</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_transactions&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_transactions&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>


                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Transactionid</th>
                        <td><?php echo $rows->transactionid; ?></td>
                    </tr>

                    <tr>
                        <th>Sender Id</th>
                        <td><?php echo $rows->sender_id; ?></td>
                    </tr>

                    <tr>
                        <th>Sender Account</th>
                        <td><?php echo $rows->sender_account; ?></td>
                    </tr>

                    <tr>
                        <th>Receiver Id</th>
                        <td><?php echo $rows->receiver_id; ?></td>
                    </tr>

                    <tr>
                        <th>Receiver Account</th>
                        <td><?php echo $rows->receiver_account; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Method</th>
                        <td><?php echo $rows->payment_method; ?></td>
                    </tr>

                    <tr>
                        <th>Amount</th>
                        <td><?php echo $rows->amount; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Status</th>
                        <td><?php echo $rows->payment_status; ?></td>
                    </tr>

                    <tr>
                        <th>Transaction Type</th>
                        <td><?php echo ($rows->receiver_account === $_SESSION['H_USER_ACCOUNT_NUMBER']) ? "CREDIT":"DEBIT"; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Date</th>
                        <td><?php echo $rows->payment_date; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	