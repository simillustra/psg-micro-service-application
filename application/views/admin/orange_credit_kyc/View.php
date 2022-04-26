<?php
/*
* =======================================================================
* FILE NAME:        View.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_kyc
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>
<?php AjaxSearchSuggest('' . H_ADMIN_MAIN . '&view=orange_credit_kyc&do=autosearch'); ?>

<div class="row">
    <div class="col-xs-12">
        <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5) { ?>

            <?php if (empty($kyc_approval)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Warning!</strong> <?php echo LANG_SUCCESS_NOKYC_WARN; ?>.
                </div>
            <?php } else { ?>
                <?php if ($kyc_approval->kyc_status == 'PENDING') { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Info!</strong> <?php echo LANG_SUCCESS_KYC; ?>.
                    </div>
                <?php } ?>

            <?php } ?>
        <?php } ?>
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Orange Credit KYC</h3>
                <ul class="nav pull-right">
                    <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5 && $number_of_entry == 0) { ?>
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&do=add"
                           class="btn btn-default btn-warning btn-xs tip"
                           title="<?php echo LANG_TIP_ADD; ?>">
                            <i class="fa fa-plus"></i> <?php echo LANG_ADD; ?>
                        </a>
                    <?php } ?>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_kyc&do=export&hexport=yes&etype=printer"
                       target="_blank" class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_PRINT; ?>">
                        <i class="fa fa-print"></i> <?php echo LANG_PRINT; ?>
                    </a>
                    <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
                        <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_kyc&do=export&hexport=yes&etype=excel"
                           class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_EXCEL; ?>">
                            <i class="fa fa-table"></i> <?php echo LANG_EXCEL; ?>
                        </a>
                    <?php } ?>
                </ul>
            </div><!-- /.box-header -->
            <div class="box-body">
                <!--AUTO COMPLETE-->
                <div class="col-md-3 autosearch">
                    <div class=" s-absolute">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm styler" id="inputString"
                                   onkeyup="lookupQuery(this.value);" placeholder="search" autocomplete="off">
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="button">
                                <span class="fa fa-search"></span>
                            </button>
                          </span>
                        </div><!-- /input-group -->
                        <div id="suggestions"></div>
                    </div>
                </div><!--/col-lg-3-->
                <!--/AUTO COMPLETE-->

                <table data-page="false" class="table table-bordered table-hover table-striped" data-filter="#filter"
                       data-page-size="<?php echo RECORD_PER_PAGE; ?>"
                       data-page-previous-text="<?php echo LANG_PREVIOUS; ?>"
                       data-page-next-text="<?php echo LANG_NEXT; ?>">
                    <thead>
                    <tr>
                        <th>Full-name</th>
                        <th>KYC Status</th>
                        <th>Gender</th>
                        <th>Reg. Date</th>
                        <th>City</th>
                        <th>State</th>
                        <th data-hide="phone,tablet">Employment Status</th>
                        <th data-hide="phone,tablet">Occupation</th>
                        <th data-sort-ignore="true"><?php echo LANG_ACTIONS; ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($result as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $rows->customer_fullname; ?></td>
                            <td><?php echo $rows->kyc_status; ?></td>
                            <td><?php echo $rows->customer_gender; ?></td>
                            <td><?php echo $rows->date_created; ?></td>
                            <td><?php echo $rows->city; ?></td>
                            <td><?php echo $rows->state; ?></td>
                            <td><?php echo $rows->customer_employment_status; ?></td>
                            <td><?php echo $rows->customer_occupation; ?></td>
                            <td class="table-actions">
                                <div class="btn-group">
                                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&do=details"
                                       class="btn btn-info btn-xs"><span class="fa fa-search-plus tip"
                                                                         title="<?php echo LANG_TIP_DETAILS; ?>"></span></a>
                                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&do=update"
                                       class="btn btn-primary btn-xs"><span class="fa fa-edit tip"
                                                                            title="<?php echo LANG_TIP_UPDATE; ?>"></span></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="10">
                            <div class="pagination"><?php echo $paging; ?></div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->