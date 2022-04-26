<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_branches
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_branches&do=addpro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_branches&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Branches</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="branch_code">Branch Code</label>
                    <input id="branch_code" name="branch_code" type="text" maxlength="25"
                           value="<?php echo random_str('nozero', 10) ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="branch_name">Branch Name</label>
                    <input id="branch_name" name="branch_name" type="text" maxlength="50" value=""
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="branch_address">Branch Address</label>
                    <textarea rows="5" id="branch_address" name="branch_address"
                              class="form-control editor2 styler"/></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="branch_country">Branch Country</label>
                    <select id="branch_country" name="branch_country" class="required form-control styler choz"
                            onchange="ListAvailableState(this)">
                        <option>SELECT COUNTRY</option>
                        <?php
                        foreach ($country_array as $country) {
                            ?>
                            <option value="<?php echo $country->id; ?>"
                                    data-country="<?php echo $country->code; ?>"><?php echo $country->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="branch_state">Branch State</label>
                    <select id="list_state" name="branch_state" class="required form-control styler choz"
                            onchange="ListAvailableCites(this)">

                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="branch_city">Branch City</label>
                    <select id="list_city" name="branch_city" class="required form-control styler choz">

                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="parent_id">Organisation</label>
                    <select id="parent_id" name="parent_id" class="required form-control styler choz">
                        <option>SELECT ORGANISATION</option>
                        <?php
                        foreach ($organisation_list as $company) {
                            ?>
                            <option value="<?php echo $company->id; ?>">
                                <?php echo $company->organisation_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="zone_coverage">Zone Coverage</label>
                    <select multiple="multiple" id="zone_coverage" name="zone_coverage[]"
                            class="required form-control styler choz">
                        <?php
                        foreach ($zone_list as $zone) {
                            ?>
                            <option value="<?php echo $zone->id; ?>">
                                <?php echo $zone->zone_name; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <input id="contact_person" name="contact_person" type="hidden" maxlength="20"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="form-control styler"/>
                    <input name="date_created" class="datepicker form-control styler" type="hidden" maxlength="20"
                           value="<?php echo date('Y-m-d'); ?>"/>
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
	 