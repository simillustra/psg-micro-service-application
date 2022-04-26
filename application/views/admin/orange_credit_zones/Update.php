<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_zones
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_zones&do=updatepro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_zones&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Zones</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="zone_name">Zone Name</label>
                    <input id="zone_name" name="zone_name" type="text" maxlength="100"
                           value="<?php echo $rows->zone_name; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="zone_country">Zone Country</label>
                    <select name="zone_country" id="zone_country"
                            class="required form-control styler choz" onchange="ListAvailableState(this)">
                        <option>SELECT COUNTRY</option>
                        <?php foreach ($country_array as $country) { ?>
                            <option value="<?php echo $country->id; ?>" data-country="<?php echo $country->code ?>"
                                    <?php if ($country->id == $rows->zone_country){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $country->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_state">Zone State</label>
                    <select name="zone_state" id="list_state"
                            class="required form-control styler choz" onchange="ListAvailableCites(this)">
                        <option>SELECT STATE</option>
                        <?php foreach ($select_states as $state) { ?>
                            <option value="<?php echo $state->id; ?>" data-country="<?php echo $state->country_id ?>"
                                    <?php if ($state->id == $rows->zone_state){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $state->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="zone_city">Zone City</label>
                    <select name="zone_city" id="list_city"
                            class="required form-control styler choz" onchange="ListAvailableCitesChecklist(this)">
                        <option>SELECT CITY</option>
                        <?php foreach ($select_city as $city) { ?>
                            <option value="<?php echo $city->id; ?>" data-country="<?php echo $city->country_id ?>"
                                    data-state="<?php echo $city->region_id ?>"
                                    <?php if ($city->id == $rows->zone_city){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $city->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_coverage">Zone Coverage</label>
                    <select multiple="multiple" id="zone_coverage" name="zone_coverage[]"
                            class="required form-control styler choz">
                        <option value=""></option>
                        <?php if (!empty($select_city)): ?>
                            <?php foreach ($select_city as $zone_list): ?>
                                <option value="<?php echo $zone_list->id; ?>" <?php echo (in_array($zone_list->id, $zone_coverage_list, true)) ? "selected" : "" ?>>
                                    <?php echo $zone_list->name; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_status">Zone Status</label>
                    <input id="zone_status" name="zone_status" type="text" maxlength="100"
                           value="<?php echo $rows->zone_status; ?>" class="form-control styler"/>
                </div>
                <div class="form-group">
                    <input name="zone_createdAt" class="datepicker form-control styler" type="hidden" maxlength="10"
                           value="<?php echo $rows->zone_createdAt; ?>"/>
                    <input name="zone_modifiedAt" class="datepicker form-control styler" type="hidden" maxlength="10"
                           value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="zone_user" name="zone_user" type="hidden" maxlength="10"
                           value="<?php echo $rows->zone_user; ?>" class="form-control styler"/>
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
	 