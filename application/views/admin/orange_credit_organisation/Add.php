<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_organisation
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_organisation&do=addpro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_organisation&do=viewall"
               class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                        class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Organisation</h3>
            </div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="organisation_name">Organisation Name</label>
                    <input id="organisation_name" name="organisation_name" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_address">Organisation Address</label>
                    <input id="organisation_address" name="organisation_address" type="text" maxlength="255" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_phone">Organisation Phone</label>
                    <input id="organisation_phone" name="organisation_phone" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_email">Organisation Email</label>
                    <input id="organisation_email" name="organisation_email" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_logo">Organisation Logo</label>

                    <input id="organisation_logo" name="organisation_logo" type="file" class="form-control styler"/>

                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_bank_name">Organisation Bank Name</label>
                    <input id="organisation_bank_name" name="organisation_bank_name" type="text" maxlength="100"
                           value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="organisation_account_number">Organisation Account Number</label>
                    <input id="organisation_account_number" name="organisation_account_number" type="number"
                           maxlength="10" value="" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <input id="organisation_status" name="organisation_status" type="hidden" maxlength="100"
                           value="PENDING" class="form-control styler"/>
                    <input name="organisation_createdAt" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input name="organisation_modifiedAt" class="datepicker form-control styler" type="hidden"
                           maxlength="100" value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="userid" name="userid" type="hidden" maxlength="100"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>" class="form-control styler"/>
                </div>

                <div class="output"></div>
            </div>
            <div class="panel-footer" style="border-bottom:solid 2px #CCC;">
                <label for="hButton" class="btn btn-info" style="color:#FFF;"><i
                            class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
                <input type="submit" name="button" id="hButton" class="hidden"
                       value="<?php echo LANG_CREATE_RECORD; ?>"/>
            </div>


        </div><!--/col-12-->

</form>
	 