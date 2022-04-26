<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_organisation
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
                <h3 class="box-title">Orange Credit Organisation</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_organisation&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Organisation Name</th>
                        <td><?php echo $rows->organisation_name; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Address</th>
                        <td><?php echo $rows->organisation_address; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Phone</th>
                        <td><?php echo $rows->organisation_phone; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Email</th>
                        <td><?php echo $rows->organisation_email; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Logo</th>
                        <td class='gallery'><?php if (is_file(UPLOAD_FOLDER . $rows->organisation_logo)) { ?><a
                                href='<?php echo UPLOAD_FOLDER . $rows->organisation_logo; ?>' data-rel='hezebox'><img
                                        src='<?php echo THUMB_FOLDER . $rows->organisation_logo; ?>'></a><?php } ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Bank Name</th>
                        <td><?php echo $rows->organisation_bank_name; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Account Number</th>
                        <td><?php echo $rows->organisation_account_number; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation Status</th>
                        <td><?php echo $rows->organisation_status; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation CreatedAt</th>
                        <td><?php echo $rows->organisation_createdAt; ?></td>
                    </tr>

                    <tr>
                        <th>Organisation ModifiedAt</th>
                        <td><?php echo $rows->organisation_modifiedAt; ?></td>
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
	