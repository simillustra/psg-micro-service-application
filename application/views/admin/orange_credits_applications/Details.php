<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
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
                <h3 class="box-title">Orange Credits Applications</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <?php
                    $show_actions = array("APPROVED", "CANCELLED", "DECLINED");
                    if ($_SESSION['H_USER_SESSION_POSITION'] == 1 && !in_array($rows->application_status, $show_actions)) { ?>
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <?php } ?>

                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credits_applications&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>


                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Activation Code</th>
                        <td><?php echo $rows->activation_code; ?></td>
                    </tr>

                    <tr>
                        <th>Request Beneficiary</th>
                        <td><?php echo $rows->last_name .' '.$rows->middle_name .' '. $rows->first_name; ?></td>
                    </tr>

                    <tr>
                        <th>Request Type</th>
                        <td><?php echo $rows->loan_name; ?></td>
                    </tr>

                     <tr>
                        <th>Amount Requested</th>
                        <td><?php echo $rows->amount_requested; ?></td>
                    </tr>

                    <tr>
                        <th>Amount Approved</th>
                        <td><?php echo $rows->amount_approved; ?></td>
                    </tr>

                    <tr>
                        <th>Activation Charge</th>
                        <td><?php echo $rows->activation_charge; ?></td>
                    </tr>

                    <tr>
                        <th>Monthly Repayment</th>
                        <td><?php echo $rows->monthly_repayment; ?></td>
                    </tr>

                    <tr>
                        <th>Total Repayment</th>
                        <td><?php echo $rows->total_repayment; ?></td>
                    </tr>

                    <tr>
                        <th>Total Interest</th>
                        <td><?php echo $rows->total_interest; ?></td>
                    </tr>

                    <tr>
                        <th>Application Status</th>
                        <td><?php echo $rows->application_status; ?></td>
                    </tr>

                    <tr>
                        <th>CreatedAt</th>
                        <td><?php echo $rows->createdAt; ?></td>
                    </tr>

                    <tr>
                        <th>Charge Account Every</th>
                        <td><?php echo $rows->charge_account_every; ?></td>
                    </tr>

                    <tr>
                        <th>Monthly Repayment Starts</th>
                        <td><?php echo $rows->monthly_repayment_starts; ?></td>
                    </tr>

                    <tr>
                        <th>Monthly Repayment Ends</th>
                        <td><?php echo $rows->monthly_repayment_ends; ?></td>
                    </tr>

                    <tr>
                        <th>Comments</th>
                        <td><?php echo $rows->comments; ?></td>
                    </tr>

                    <tr>
                        <th>Approved By</th>
                        <td><?php echo $rows->approved_by; ?></td>
                    </tr>

                    <tr>
                        <th>ApprovedAt</th>
                        <td><?php echo $rows->approvedAt; ?></td>
                    </tr>

                    <tr>
                        <th>Has Standing Order</th>
                        <td><?php echo $rows->has_standing_order; ?></td>
                    </tr>

                    <tr>
                        <th>Standing Order Id</th>
                        <td><?php echo $rows->standing_order_id; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	