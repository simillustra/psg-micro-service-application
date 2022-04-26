<?php if ($_SESSION['H_USER_SESSION_POSITION'] == 4) { ?>

    <section class="content">
        <div class="referral_link">
            <b>Referal Code & link:</b><a
                href="http://orangecred.com/index.php?pg=login&ref=<?php echo $ref_code_link = $haccess->get_referal_code(); ?>">
                http://orangecred.com/index.php?pg=login&ref=<?php echo $ref_code_link = $haccess->get_referal_code(); ?></a>
        </div><!-- /.referral_link -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <a href="#">
                                        <span class="info-box-icon bg-yellow">
                                            <i class="fas fa-gifts"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">REFER AND EARN</span>
                        <span class="info-box-number"><?php $bankc = $haccess->getCount($_SESSION['H_USER_SESSION_ID'], 'referrals'); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
<?php } ?>