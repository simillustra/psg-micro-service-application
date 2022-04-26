<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_logs
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
                <h3 class="box-title">Orange Credits Logs</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_logs&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credits_logs&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Action</th>
                        <td><?php echo $rows->action; ?></td>
                    </tr>

                    <tr>
                        <th>Ip Address</th>
                        <td><?php echo $rows->ip_address; ?></td>
                    </tr>

                    <tr>
                        <th>Created By</th>
                        <td><?php echo $rows->created_by; ?></td>
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
	