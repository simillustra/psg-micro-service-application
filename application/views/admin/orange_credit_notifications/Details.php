<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_notifications
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
                <h3 class="box-title">Orange Credit Notifications</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&do=add"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_ADD; ?>"><i
                                class="fa fa-plus"></i> <?php echo LANG_ADD; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_notifications&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_notifications&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Reciever</th>
                        <td><?php echo $rows->reciever; ?></td>
                    </tr>

                    <tr>
                        <th>Subject</th>
                        <td><?php echo $rows->subject; ?></td>
                    </tr>

                    <tr>
                        <th>Type</th>
                        <td><?php echo $rows->type; ?></td>
                    </tr>

                    <tr>
                        <th>Sms Message</th>
                        <td><?php echo $rows->sms_message; ?></td>
                    </tr>

                    <tr>
                        <th>Email Message</th>
                        <td><?php echo $rows->email_message; ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td><?php echo $rows->status; ?></td>
                    </tr>

                    <tr>
                        <th>Date</th>
                        <td><?php echo $rows->date; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	