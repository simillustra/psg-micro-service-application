<?php
//https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
if (version_compare(phpversion(), "5.4.0") != -1) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
} else {
    if (session_id() == '') {
        session_start();
    }
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config/config.php');
include('language/eng.php');
include('libraries/functions.php');
include_once('libraries/class_dbcon.php');
include_once('libraries/upload_class.php');
include_once('libraries/system_users.php');
if (STORE_STATUS !== 'development') {
    include('cronJobs/activity-notification.php');
}
$haccess = new admin_users_model();
$user_personal_info = $haccess->UserAccess();

//$adminControls = new mt_custom_list_controls();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" :
        "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$redirect = false;
$x = pathinfo($actual_link);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pg']) && $_GET['pg'] == '') {
        header('Location: ' . $actual_link . 'index.php?pg=info');
        exit();
    }
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <title><?php echo H_TITLE; ?></title>
        <link href="<?php echo H_THEME; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/datepicker.css" rel="stylesheet"/>
        <link href="<?php echo H_THEME; ?>/css/chosen.min.css" rel="stylesheet"/>
        <link href="<?php echo H_THEME; ?>/css/font-awesome-5.8.1.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/jquery-jvectormap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/footable.core.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/skins.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/jquery.lightbox.min.css" rel="stylesheet" type="text/css"
              media="screen"/>
        <link href="<?php echo H_THEME; ?>/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo H_THEME; ?>/css/admin.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="<?php echo H_THEME; ?>/css/cookieconsent.min.css"/>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"
              rel="stylesheet" lazyload>
    </head>
    <?php
    if (get('pg') == 'info') {
        include('libraries/views/admin/about.php');
    }else if (get('pg') == 'login') {
        include('libraries/views/admin/login.php');
    } else if (get('pg') !== 'login' && !isset($_SESSION['H_USER_SESSION'])) {
        include('libraries/views/admin/about.php');
    } else {
    $kyc_Is_Approved = $haccess->checkApprovedKYC($user_personal_info->userid);
    ?>
    <body class="skin-blue">
    <?php
    if (get('msg') == 'add') {
        success_msg(LANG_SUCCESS_ADD);
    } elseif (get('msg') == 'update') {
        success_msg(LANG_SUCCESS_UPDATE);
    } elseif (get('msg') == 'delete') {
        success_msg(LANG_SUCCESS_DELETE);
    } elseif (get('msg') == 'truncate') {
        success_msg(LANG_SUCCESS_TRUNCATE);
    } elseif (get('msg') == 'error') {
        error_msg(LANG_ERROR_MSG);
    } elseif (get('msg') == 'backup') {
        success_msg(LANG_BACKUP_CREATED);
    } elseif (get('dbrestore') != '') {
        success_msg(LANG_BACKUP_RESTORED);
    } elseif (get('dbfile') != '') {
        success_msg(LANG_BACKUP_DELETED);
    }
    ?>
    <div class="wrapper">

        <header class="main-header">
            <a href="<?php echo H_ADMIN; ?>" class="logo"><b>PSG</b>LIMITED</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">


                            <!-- User Account-->
                            <?php if (isset($_SESSION['H_USER_SESSION'])) { ?>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if (is_file(UPLOAD_FOLDER . $user_personal_info->
                                    user_avarta)) { ?>
                                    <img src='<?php echo THUMB_FOLDER . $user_personal_info->
                                        user_avarta; ?>'
                                         class="user-image"
                                         alt="User Image"/>
                                <?php } else { ?>
                                    <img src="<?php echo NO_IMAGE; ?>" class="user-image" alt="User Image"/>
                                <?php } ?>
                                <span class="hidden-xs"><?php echo
                                        LANG_LOGIN_IN_AS . '  ' . $_SESSION['H_USER_FULLNAME']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php if (is_file(UPLOAD_FOLDER . $user_personal_info->
                                        user_avarta)) { ?>
                                        <img src='<?php echo THUMB_FOLDER . $user_personal_info->
                                            user_avarta; ?>'
                                             class="img-circle"
                                             alt="User Image"/>
                                    <?php } else { ?>
                                        <img src="<?php echo NO_IMAGE; ?>" class="img-circle" alt="User Image"/>
                                    <?php } ?>
                                    <p>
                                        <?php echo $user_personal_info->
                                        first_name ?>
                                        <small>today <?php echo date('d/m/Y'); ?></small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <?php if ((int)$_SESSION['H_USER_SESSION_POSITION'] <=
                                        3): ?>
                                        <div class="pull-left">
                                            <a href="<?php echo H_ADMIN; ?>&view=hsys_users2&do=details"
                                               class="btn btn-success btn-flat"><?php echo
                                                LANG_PROFILE; ?></a>
                                        </div>
                                    <?php elseif ((int)$_SESSION['H_USER_SESSION_POSITION'] ==
                                        4): ?>
                                        <div class="pull-left">
                                            <a href="<?php echo H_ADMIN; ?>&view=mt_banks_staff&id=<?php echo
                                            $user_personal_info->id; ?>&do=details"
                                               class="btn btn-success btn-flat"><?php echo
                                                LANG_PROFILE; ?></a>
                                        </div>
                                    <?php elseif ((int)$_SESSION['H_USER_SESSION_POSITION'] <=
                                        5): ?>
                                        <div class="pull-left">
                                            <a href="<?php echo H_ADMIN; ?>&view=hsys_users2&do=details"
                                               class="btn btn-success btn-flat"><?php echo
                                                LANG_PROFILE; ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pull-right">
                                        <a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=logout"
                                           class="btn btn-success btn-flat"><?php echo
                                            LANG_LOGOUT; ?></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php if (is_file(UPLOAD_FOLDER . $user_personal_info->
                            user_avarta)) { ?>
                            <img src='<?php echo THUMB_FOLDER . $user_personal_info->
                                user_avarta; ?>' class="img-circle"
                                 alt="User Image"/>
                        <?php } else { ?>
                            <img src="<?php echo NO_IMAGE; ?>" class="img-circle" alt="User Image"/>
                        <?php } ?>

                    </div>
                    <div class="pull-left info">
                        <p></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <hr style="border-color:#666;">

                <!-- sidebar menu-->
                <ul class="sidebar-menu">

                    <?php if ($user_personal_info->user_position == 1) { ?>

                        <li><a href="<?php echo H_ADMIN; ?>&view=hsys_users&do=viewall">
                                <i class="fa fa-user"></i> <span><?php echo
                                    LANG_SYSTEM_USERS; ?></span>
                                <small class="label pull-right bg-green">sys</small>
                            </a></li>
                    <?php } ?>
                    <?php
                    switch ($user_personal_info->user_position) {
                        case 1:
                            include(APP_FOLDER . '/views/admin/menu.php');
                            break;
                        case 2:
                        case 3:
                        case 4:
                            include(APP_FOLDER . '/views/admin/menu-others.php');
                            break;
                        case 5:
                            if (!empty($kyc_Is_Approved) && $kyc_Is_Approved->kyc_status == 'APPROVED') {
                                include(APP_FOLDER . '/views/admin/menu-users.php');
                            }
                            break;
                        default:
                            if (!empty($kyc_Is_Approved) && $kyc_Is_Approved->kyc_status == 'APPROVED') {
                                include(APP_FOLDER . '/views/admin/menu-others.php');
                            }
                            break;
                    }
                    ?>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>more</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="index.html"><i class="fa fa-circle-o"></i> Menu 1</a></li>
                            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Menu 2</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column-->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <h1>
                    <?php echo H_TITLE; ?> <em>.</em>
                    <small>Version 3.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo H_ADMIN; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <!--<li><a href="#">Tables</a></li>-->
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                $haccess->logged_in_protect(H_LOGIN);
                if (get('view')) {
                    include(APP_FOLDER . '/controllers/admin/main.php');
                    include('libraries/controllers/system_users.php');
                } else {
                    //get role and decide

                    ?>
                    <!-- DESIGN AREA -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">MICRO <em>LOAN</em></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <!-- Main content -->
                            <?php
                            switch ($user_personal_info->user_position) {
                                case 1:
                                    include('libraries/views/admin/admin-dashboard.php');
                                    break;
                                case 2:
                                case 3:
                                case 4:
                                    include('libraries/views/admin/admin-roles-dashboard.php');
                                case 5:
                                    include('libraries/views/admin/user-dashboard.php');
                                    break;
                                case 6:
                                    include('libraries/views/admin/agents-dashboard.php');
                                    break;
                            }
                            ?>

                            <!-- end main content dashboards --->
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            ...the unique solution
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->

                <?php } ?>
                <!-- /DESIGN AREA -->

            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                SAAS Edition <b>v</b> 1.0
            </div>
            <strong>&copy; <?php echo date('Y') ?> <a href="http://simillustra.com">Simillustra Limited</a>.</strong>
            All
            rights reserved.
        </footer>
    </div><!-- ./wrapper -->
    <?php } ?>
    <script type="text/javascript" src="<?php echo H_THEME; ?>/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="libraries/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo H_THEME; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo H_THEME; ?>/js/cookieconsent.min.js"></script>
    <script src="<?php echo H_THEME; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo H_THEME; ?>/js/fastclick.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo H_THEME; ?>/js/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="<?php echo H_THEME; ?>/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo H_THEME; ?>/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo H_THEME; ?>/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/footable.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/jquery.lightbox.min.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo H_THEME; ?>/js/jquery.form.js"></script>
    <script src="<?php echo H_THEME; ?>/js/chosen.jquery.min.js"></script>
    <script src="<?php echo H_THEME; ?>/js/jquery.knob.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo H_THEME; ?>/js/app.custom.js"></script>

    </body>

    </html>
<?php
////https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
/// ?>