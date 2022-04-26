<?php
/*
* =======================================================================
* FILE NAME:        View.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>
<?php AjaxSearchSuggest('' . H_ADMIN_MAIN . '&view=orange_credits_accounts&do=autosearch'); ?>

<div class="row">
    <div class="col-xs-12">
        <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5) { ?>

            <?php if (empty($kyc_approval)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> <?php echo LANG_SUCCESS_NOKYC_WARN; ?>.
                </div>
            <?php }else{ ?>
                <?php if ($kyc_approval->kyc_status == 'PENDING') { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>Info!</strong> <?php echo LANG_SUCCESS_KYC ; ?>.
                    </div>
                <?php }?>

            <?php } ?>
        <?php } ?>
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Orange Credits Accounts</h3>
                <ul class="nav pull-right">


                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credits_accounts&do=export&hexport=yes&etype=printer"
                       target="_blank" class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_PRINT; ?>"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>
                    <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credits_accounts&do=export&hexport=yes&etype=excel"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_EXCEL; ?>"><i
                                class="fa fa-table"></i> <?php echo LANG_EXCEL; ?></a>
                    <?php } ?>
                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
             <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=fundAccount&account_number=<?php echo $_SESSION['H_USER_ACCOUNT_NUMBER']; ?>">

                                        <span class="info-box-icon bg-aqua">
                                        <i class="far fa-credit-card"></i>
                                        </span>
                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">FUND ACCOUNT</span>
                        <span class="info-box-number">
                        <?php // echo $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'requests'); ?>
                        <small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
              <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=transfer&account_number=<?php echo $_SESSION['H_USER_ACCOUNT_NUMBER']; ?>">
                                        <span class="info-box-icon bg-green">
                                        <i class="fas fa-hand-holding-usd"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">TRANSFER MONEY</span>
                        <span class="info-box-number"><?php // $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'transactions'); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_applications&do=viewall&bid=<?php echo
$_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-red">
                                        <i class="fa fa-folder-open"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">MY LOANS</span>
                        <span class="info-box-number"><?php // $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'applications'); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

          
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_transactions&do=viewall&bid=<?php echo
$_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-yellow">
                                            <i class="fas fa-history"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">ACCOUNT HISTORY</span>
                        <span class="info-box-number"><?php // $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'payment-history'); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

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
                        <th>Acct Number</th>
                        <th data-hide="phone,tablet">User Id</th>
                        <th>Acct Status</th>
                        <th data-hide="phone,tablet">Acct Opendate</th>
                        <th data-hide="phone,tablet">Account Type</th>
                        <th>Account Balance</th>
                        <th data-hide="phone,tablet">Account Point Balance</th>
                        <th data-sort-ignore="true"><?php echo LANG_ACTIONS; ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($result as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $rows->acct_number; ?></td>
                            <td><?php echo $rows->user_id; ?></td>
                            <td><?php echo $rows->acct_status; ?></td>
                            <td><?php echo $rows->acct_opendate; ?></td>
                            <td><?php echo $rows->account_type; ?></td>
                            <td><?php echo $rows->account_balance; ?></td>
                            <td><?php echo $rows->account_point_balance; ?></td>
                            <td class="table-actions">
                                <div class="btn-group">
                                    <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&id=<?php echo $rows->acct_number; ?>&do=details"
                                       class="btn btn-info btn-xs"><span class="fa fa-search-plus tip"
                                                                         title="<?php echo LANG_TIP_DETAILS; ?>"></span></a>

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