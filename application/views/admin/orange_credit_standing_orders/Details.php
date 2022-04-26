<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
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
                <h3 class="box-title">Orange Credit Standing Orders</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_standing_orders&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_standing_orders&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Payee Id</th>
                        <td><?php echo $rows->payee_id; ?></td>
                    </tr>

                    <tr>
                        <th>Payee Name</th>
                        <td><?php echo $rows->payee_name; ?></td>
                    </tr>

                    <tr>
                        <th>Payee Account Number</th>
                        <td><?php echo $rows->payee_account_number; ?></td>
                    </tr>

                    <tr>
                        <th>Total Amount</th>
                        <td><?php echo $rows->total_amount; ?></td>
                    </tr>

                    <tr>
                        <th>Deductable Amount</th>
                        <td><?php echo $rows->deductable_amount; ?></td>
                    </tr>

                    <tr>
                        <th>Recieving Account</th>
                        <td><?php echo $rows->recieving_account; ?></td>
                    </tr>

                    <tr>
                        <th>Number Of Payment</th>
                        <td><?php echo $rows->number_of_payment; ?></td>
                    </tr>

                    <tr>
                        <th>Order Status</th>
                        <td><?php echo $rows->order_status; ?></td>
                    </tr>

                    <tr>
                        <th>Payment Frequency</th>
                        <td><?php echo $rows->payment_frequency; ?></td>
                    </tr>

                    <tr>
                        <th>Starting Date</th>
                        <td><?php echo $rows->starting_date; ?></td>
                    </tr>

                    <tr>
                        <th>Next Payment Date</th>
                        <td><?php echo $rows->next_payment_date; ?></td>
                    </tr>

                    <tr>
                        <th>Ending Date</th>
                        <td><?php echo $rows->ending_date; ?></td>
                    </tr>

                    <tr>
                        <th>AuthorizedBy</th>
                        <td><?php echo $rows->authorizedBy; ?></td>
                    </tr>

                    <tr>
                        <th>Reference</th>
                        <td><?php echo $rows->reference; ?></td>
                    </tr>

                    <tr>
                        <th>CreatedAt</th>
                        <td><?php echo $rows->createdAt; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	