<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
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
                <h3 class="box-title">Orange Credits Accounts</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credits_accounts&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Acct Number</th>
                        <td><?php echo $rows->acct_number; ?></td>
                    </tr>

                    <tr>
                        <th>User Id</th>
                        <td><?php echo $rows->user_id; ?></td>
                    </tr>

                    <tr>
                        <th>Acct Status</th>
                        <td><?php echo $rows->acct_status; ?></td>
                    </tr>

                    <tr>
                        <th>Acct Opendate</th>
                        <td><?php echo $rows->acct_opendate; ?></td>
                    </tr>

                    <tr>
                        <th>Account Type</th>
                        <td><?php echo $rows->account_type; ?></td>
                    </tr>

                    <tr>
                        <th>Account Balance</th>
                        <td><?php echo $rows->account_balance; ?></td>
                    </tr>

                    <tr>
                        <th>Account Point Balance</th>
                        <td><?php echo $rows->account_point_balance; ?></td>
                    </tr>

                    <tr>
                        <th>CreatedAt</th>
                        <td><?php echo $rows->createdAt; ?></td>
                    </tr>

                    <tr>
                        <th>ModifiedAt</th>
                        <td><?php echo $rows->modifiedAt; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	