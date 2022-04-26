<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_zones
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
                <h3 class="box-title">Orange Credit Zones</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&do=add" class="btn btn-default btn-xs tip"
                       title="<?php echo LANG_TIP_ADD; ?>"><i class="fa fa-plus"></i> <?php echo LANG_ADD; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_zones&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Zone Name</th>
                        <td><?php echo $rows->zone_name; ?></td>
                    </tr>

                    <tr>
                        <th>Zone Coverage</th>
                        <td><?php echo $rows->zone_coverage; ?></td>
                    </tr>

                    <tr>
                        <th>Zone Status</th>
                        <td><?php echo $rows->zone_status; ?></td>
                    </tr>

                    <tr>
                        <th>Zone City</th>
                        <td><?php echo $rows->zone_city; ?></td>
                    </tr>

                    <tr>
                        <th>Zone State</th>
                        <td><?php echo $rows->zone_state; ?></td>
                    </tr>

                    <tr>
                        <th>Zone Country</th>
                        <td><?php echo $rows->zone_country; ?></td>
                    </tr>

                    <tr>
                        <th>Zone CreatedAt</th>
                        <td><?php echo $rows->zone_createdAt; ?></td>
                    </tr>

                    <tr>
                        <th>Zone ModifiedAt</th>
                        <td><?php echo $rows->zone_modifiedAt; ?></td>
                    </tr>

                    <tr>
                        <th>Zone User</th>
                        <td><?php echo $rows->zone_user; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	