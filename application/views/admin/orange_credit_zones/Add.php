<?php
/*
* =======================================================================
* FILE NAME:        Add.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_zones
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_zones&do=addpro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i
                            class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW; ?> Orange Credit Zones</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <div class="form-group">
                    <label class="control-label" for="zone_name">Zone Name</label>
                    <input id="zone_name" name="zone_name" type="text" maxlength="100" value=""
                           class="form-control styler"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_country">Zone Country</label>
                    <select id="zone_country" name="zone_country" class="required form-control styler choz"
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
                    <label class="control-label" for="zone_state">Zone State</label>
                    <select id="list_state" name="zone_state" class="required form-control styler choz"
                            onchange="ListAvailableCites(this)">

                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="zone_city">Zone City</label>
                    <select id="list_city" name="zone_city" class="required form-control styler choz"
                            onchange="ListAvailableCitesChecklist(this)">

                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_coverage">Zone Coverage</label>
                    <select multiple="multiple" id="zone_coverage" name="zone_coverage[]"
                            class="required form-control styler choz">

                    </select>
                </div>

                <div class="form-group">
                    <input id="zone_status" name="zone_status" type="hidden" maxlength="100" value="ACTIVE"
                           class="form-control styler"/>
                    <input name="zone_createdAt" class="datepicker form-control styler" type="hidden" maxlength="10"
                           value="<?php echo date('Y-m-d'); ?>"/>
                    <input name="zone_modifiedAt" class="datepicker form-control styler" type="hidden" maxlength="10"
                           value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="zone_user" name="zone_user" type="hidden" maxlength="10"
                           value="<?php echo $_SESSION['H_USER_SESSION_ID']; ?>"
                           class="form-control styler"/>
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
	 