<!-- Main content -->
<?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=mt_banks&do=listall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>">

                                        <span class="info-box-icon bg-aqua">
                                        <i class="ion ion-ios-gear-outline"></i></span>
                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">SETTINGS</span>
                        <span class="info-box-number"><?php //echo $bankc = $adminControls->list_count_banks($_SESSION['H_USER_SESSION_ID']); ?><small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=mt_banks_branch&do=listall&bid=<?php echo $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-red">
                                        <i class="fas fa-university"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">BRANCHES</span>
                        <span class="info-box-number"><?php //echo $branchc = $adminControls->list_count_branches($bank_id)?></span>
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
                    <a href="<?php echo H_ADMIN; ?>&view=mt_account_types&do=listall&bid=<?php echo $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-green">
                                        <i class="fas fa-truck-loading"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">ACCOUNT/SERVICES</span>
                        <span class="info-box-number"><?php //echo $adminControls->list_account_types($bank_id)?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="<?php echo H_ADMIN; ?>&view=mt_banks_loan&do=listall&bid=<?php echo $_SESSION['H_USER_SESSION_ID'] ?>">
                                        <span class="info-box-icon bg-yellow">
                                            <i class="fas fa-donate"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">LOANS</span>
                        <span class="info-box-number"><?php //echo $adminControls->list_count_loads(array('bank_id'=>$bank_id,'range_start'=>date('Y-01-01'),'range_end'=>date('Y-m-d')));?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"
                                    data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button"
                                        class="btn btn-box-tool dropdown-toggle"
                                        data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool"
                                    data-widget="remove">
                                <i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                                        <span class="description-percentage text-green">
                                                            <i class="fa fa-caret-up"></i> 17%</span>
                                    <h5 class="description-header"><?php
                                        // $total_transaction = $adminControls->list_sum_total(array('bank_id'=>$bank_id,'range_start'=>date('Y-01-01'),'range_end'=>date('Y-m-d')));
                                        //print_r($total_transaction);
                                        // echo ($total_transaction->balance)? number_format($total_transaction->balance,2):'0.00';
                                        ?></h5>
                                    <span class="description-text">TOTAL TRANSACTIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                                        <span class="description-percentage text-yellow"><i
                                                                    class="fa fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header"><?php
                                        //$total_credit = $adminControls->list_sum_credit(array('bank_id'=>$bank_id,'range_start'=>date('Y-01-01'),'range_end'=>date('Y-m-d')));
                                        //echo ($total_credit->credit)? number_format($total_credit->credit,2):'0.00';
                                        ?></h5>
                                    <span class="description-text">TOTAL DEPOSIT/CREDIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                                        <span class="description-percentage text-green"><i
                                                                    class="fa fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header"><?php
                                        //$total_debit = $adminControls->list_sum_debit(array('bank_id'=>$bank_id,'range_start'=>date('Y-01-01'),'range_end'=>date('Y-m-d')));
                                        // echo ($total_debit->debit)? number_format($total_debit->debit,2):'0.00';
                                        ?></h5>
                                    <span class="description-text">TOTAL WITHDRAWALS/DEBIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                                        <span class="description-percentage text-red"><i
                                                                    class="fa fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header"><?php
                                        //$loan_total = $adminControls->list_sum_loans(array('bank_id'=>$bank_id,'range_start'=>date('Y-01-01'),'range_end'=>date('Y-m-d')));
                                        //print_r($loan_total);
                                        // echo ($loan_total->loan_balance)? number_format($loan_total->loan_balance,2): '0.00';
                                        ?></h5>
                                    <span class="description-text">TOTAL LOANS </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- /.box -->
                <div class="row">
                    <!-- USERS LIST -->
                    <?php $latest_signups = $haccess->getLatestAccount(); ?>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">LATEST ACCOUNTS</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger"><?php echo count($latest_signups); ?> New Members</span>
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <?php
                                foreach ($latest_signups as $rows) {
                                    ?>
                                    <li>
                                        <?php if (is_file(UPLOAD_FOLDER . $rows->user_avarta)) { ?>
                                            <img src='<?php echo THUMB_FOLDER . $rows->user_avarta; ?>'
                                                 class="img-circle"
                                                 alt="User Image"/>
                                        <?php } else { ?>
                                            <img src="<?php echo NO_IMAGE; ?>"
                                                 class="img-circle" alt="User Image"/>
                                        <?php } ?>
                                        <a class="users-list-name"
                                           href="#"><?php echo $rows->first_name; ?></a>
                                        <span class="users-list-date"><?php echo $rows->last_name; ?></span>
                                        <span class="users-list-date"><?php echo get_timeago(strtotime($rows->date_created)); ?></span>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All
                                Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">LOAN REQUESTS</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool"
                                        data-widget="remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="http://via.placeholder.com/300x300"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">
                                            Sponsor 1 Name Here
                                            <span class="label label-warning pull-right">$1800</span></a>
                                        <span class="product-description">
                                                          Summary of application here
                                                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="http://via.placeholder.com/300x300"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Sponsor
                                            2 Name Here
                                            <span class="label label-info pull-right">$700</span></a>
                                        <span class="product-description">
                                                        Summary of application here
                                                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="http://via.placeholder.com/300x300"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Sponsor
                                            3 Name Here
                                            <span class="label label-danger pull-right">$350</span></a>
                                        <span class="product-description">
                                                        Summary of application here
                                                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="http://via.placeholder.com/300x300"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Sponsor
                                            4 Name Here
                                            <span class="label label-success pull-right">$399</span></a>
                                        <span class="product-description">
                                                         Summary of application here
                                                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Loan
                                Request(s)</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">APPLICATION STATUS</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"
                                    data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool"
                                    data-widget="remove">
                                <i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Application ID</th>
                                    <th>Applicant</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a>
                                    </td>
                                    <td>Applicant 1 Name</td>
                                    <td><span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a"
                                             data-height="20">
                                            50,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR1848</a>
                                    </td>
                                    <td>Applicant 2 Name</td>
                                    <td><span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12"
                                             data-height="20">
                                            61,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a>
                                    </td>
                                    <td>Applicant 3 Name</td>
                                    <td><span class="label label-danger">Cancelled</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954"
                                             data-height="20">
                                            90,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a>
                                    </td>
                                    <td>Applicant 4 Name</td>
                                    <td><span class="label label-info">Processing</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#00c0ef"
                                             data-height="20">
                                            150,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR1848</a>
                                    </td>
                                    <td>Applicant 5 Name</td>
                                    <td><span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12"
                                             data-height="20">
                                            200,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a>
                                    </td>
                                    <td>Applicant 6 Name</td>
                                    <td><span class="label label-danger">Cancelled</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954"
                                             data-height="20">
                                            80,000
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a>
                                    </td>
                                    <td>Applicant 7 Name</td>
                                    <td><span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a"
                                             data-height="20">
                                            100,000
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)"
                           class="btn btn-sm btn-default btn-flat pull-right">View All
                            Application</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon">
                     <i class="fas fa-users"></i>
                     </span>                  
                    <div class="info-box-content">
                        <span class="info-box-text">SYSTEM USERS</span>
                        <span class="info-box-number"><?php
                            $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'users'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
<!--                        <span class="progress-description">50% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID'] ?>"
                           class="btn btn-success btn-sm btn-block pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                   <span class="info-box-icon">
                    <i class="fas fa-user-friends"></i>
                    </span>
                  
                    <div class="info-box-content">
                        <span class="info-box-text">STAFF/ AGENTS</span>
                        <span class="info-box-number"><?php
                            $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'staff'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
<!--                        <span class="progress-description"> 20% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID'] ?>"
                           class="btn btn-info btn-sm btn-block btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                        </span>

                    <div class="info-box-content">
                        <span class="info-box-text">TRANSACTIONS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'transactions'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
<!--                        <span class="progress-description">70% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=orange_credit_transactions&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-default btn-sm btn-block btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                     <span class="info-box-icon">
                        <i class="fas fa-comments"></i>
                        </span>
      
                    <div class="info-box-content">
                        <span class="info-box-text">MEMO / MESSAGES</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'memos'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
<!--                        <span class="progress-description">40% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-danger btn-sm btn-block btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-olive">
                    <span class="info-box-icon">
                        <i class="far fa-credit-card"></i></i>
                        </span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">MICRO LOAN REQUESTS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'requests'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
<!--                        <span class="progress-description">50% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=orange_credit_micro_loan_request&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-default btn-sm btn-block btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box bg-maroon">
                     <span class="info-box-icon"><i class="fas fa-users-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">REFERRALS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'referrals'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
<!--                        <span class="progress-description">50% Increase in 30 Days</span>-->
                        <a href="#"class="btn btn-default btn-sm btn-block btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-orange">
                   <span class="info-box-icon">
                       <i class="fas fa-folder-open"></i> 
                   </span>            

                    <div class="info-box-content">
                        <span class="info-box-text">BUSINESS PLANS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'business'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
<!--                        <span class="progress-description"> 20% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=orange_credit_business_plan&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-default btn-sm btn-block active btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-fuchsia">
                    <span class="info-box-icon">
                        <i class="fas fa-school"></i>
                        </span>
 
                    <div class="info-box-content">
                        <span class="info-box-text">REPAYMENTS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'repayments'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
<!--                        <span class="progress-description">70% Increase in 30 Days</span>-->
                           <a href="<?php echo H_ADMIN; ?>&view=orange_credit_payment_history&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-info btn-block btn-sm active btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-black">
                   <span class="info-box-icon">
                      <i class="fas fa-wallet"></i>
                      </span>

                    <div class="info-box-content">
                        <span class="info-box-text">ACCOUNTS</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'accounts'); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
<!--                        <span class="progress-description">40% Increase in 30 Days</span>-->
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credits_accounts&do=viewall&bid=<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="btn btn-default btn-block btn-sm active btn-flat pull-right" role="button">View All</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!-- /.box -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

<?php } ?>