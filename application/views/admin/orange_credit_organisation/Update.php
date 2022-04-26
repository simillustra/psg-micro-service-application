<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_organisation
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_organisation&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Organisation</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="organisation_name">Organisation Name</label>
                    <input id="organisation_name" name="organisation_name" type="text" maxlength="100"
                           value="<?php echo $rows->organisation_name; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_address">Organisation Address</label>
                    <input id="organisation_address" name="organisation_address" type="text" maxlength="255"
                           value="<?php echo $rows->organisation_address; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_phone">Organisation Phone</label>
                    <input id="organisation_phone" name="organisation_phone" type="text" maxlength="100"
                           value="<?php echo $rows->organisation_phone; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_email">Organisation Email</label>
                    <input id="organisation_email" name="organisation_email" type="text" maxlength="100"
                           value="<?php echo $rows->organisation_email; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_logo">Organisation Logo</label>
                    <input id="organisation_logo" name="organisation_logo" type="file"
                           class="styler"/><br><?php if (is_file(UPLOAD_FOLDER . $rows->organisation_logo)) { ?><a
                            href="#"><img src="<?php echo THUMB_FOLDER . $rows->organisation_logo; ?>"></a>
                        <br><?php } ?>
                    <?php if (is_file(UPLOAD_FOLDER . $rows->organisation_logo)) { ?>
                        <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&id=<?php echo $rows->id; ?>&dfile=<?php echo $rows->organisation_logo; ?>&do=delete&fdel=file"
                           data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                        class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a><br><?php } ?>

                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_bank_name">Organisation Bank Name</label>
                    <input id="organisation_bank_name" name="organisation_bank_name" type="text" maxlength="100"
                           value="<?php echo $rows->organisation_bank_name; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_account_number">Organisation Account Number</label>
                    <input id="organisation_account_number" name="organisation_account_number" type="text"
                           maxlength="100" value="<?php echo $rows->organisation_account_number; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_status">Organisation Status</label>
                    <input id="organisation_status" name="organisation_status" type="text" maxlength="100"
                           value="<?php echo $rows->organisation_status; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <input name="organisation_createdAt" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo $rows->organisation_createdAt; ?>"/>
                    <input name="organisation_modifiedAt" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="userid" name="userid" type="hidden" maxlength="100" value="<?php echo $rows->userid; ?>"
                           class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_UPDATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 