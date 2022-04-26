<?php
/*
* =======================================================================
* FILE NAME:        View.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_coupons
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>
<?php AjaxSearchSuggest('' . H_ADMIN_MAIN . '&view=orange_credit_coupons&do=autosearch'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Orange Credit Coupons</h3>
                <ul class="nav pull-right">
                    <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1): ?>
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&do=add"
                           class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_ADD; ?>"><i
                                    class="fa fa-plus"></i> <?php echo LANG_ADD; ?></a>
                    <?php endif; ?>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_coupons&do=export&hexport=yes&etype=printer"
                       target="_blank" class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_PRINT; ?>"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_coupons&do=export&hexport=yes&etype=excel"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_EXCEL; ?>"><i
                                class="fa fa-table"></i> <?php echo LANG_EXCEL; ?></a>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">

                <!--AUTO COMPLETE-->
                <div class="col-md-3 autosearch">
                    <div class=" s-absolute">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm styler" id="inputString"
                                   onkeyup="lookup(this.value);" placeholder="search" autocomplete="off">
                            <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="button"><span class="fa fa-search"></span></button>
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
                        <th>Coupon Code</th>
                        <th>Coupon Amount</th>
                        <th>Coupon Trans Id</th>
                        <th data-hide="phone,tablet">Coupon Payment Mode</th>
                        <th data-hide="phone,tablet">Coupon Status</th>
                        <th data-sort-ignore="true"><?php echo LANG_ACTIONS; ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($result as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $rows->coupon_code; ?></td>
                            <td><?php echo $rows->coupon_amount; ?></td>
                            <td><?php echo $rows->coupon_trans_id; ?></td>
                            <td><?php echo $rows->coupon_payment_mode; ?></td>
                            <td><?php echo $rows->coupon_status; ?></td>
                            <td class="table-actions">
                                <div class="btn-group">
                                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&id=<?php echo $rows->id; ?>&do=details"
                                       class="btn btn-info btn-xs">
                                        <span class="fa fa-search-plus tip"
                                              title="<?php echo LANG_TIP_DETAILS; ?>"></span>
                                    </a>
                                    <?php if ($rows->coupon_status === "PROCESSING"): ?>
                                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_coupons&id=<?php echo $rows->id; ?>&do=update"
                                           class="btn btn-primary btn-xs">
                                            <span class="fa fa-edit tip" title="<?php echo LANG_TIP_UPDATE; ?>"></span>
                                        </a>
                                    <?php endif; ?>

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