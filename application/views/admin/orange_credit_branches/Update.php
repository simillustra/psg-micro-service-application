<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_branches
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_branches&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_branches&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_branches&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Branches</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
                <div class="form-group">
                    <label class="control-label" for="branch_code">Branch Code</label>
                    <input id="branch_code" name="branch_code" type="text" maxlength="25"
                           value="<?php echo $rows->branch_code; ?>" readonly="readonly" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="branch_name">Branch Name</label>
                    <input id="branch_name" name="branch_name" type="text" maxlength="50"
                           value="<?php echo $rows->branch_name; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="branch_address">Branch Address</label>
                    <textarea rows="5" id="branch_address" name="branch_address"
                              class="form-control editor2 styler"/><?php echo $rows->branch_address; ?></textarea>
                </div>            
              
                
                <div class="form-group">
                     <label class="control-label" for="branch_country">Branch Country</label>               
                    <select name="branch_country" id="branch_country"
                            class="required form-control styler choz" onchange="ListAvailableState(this)">
                        <option>SELECT COUNTRY</option>
                        <?php foreach ($country_array as $country) { ?>
                            <option value="<?php echo $country->id; ?>" data-country="<?php echo $country->code ?>"
                                    <?php if ($country->id == $rows->branch_country){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $country->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="branch_state">Branch State</label>
                    <select name="branch_state" id="list_state"
                            class="required form-control styler choz" onchange="ListAvailableCites(this)">
                        <option>SELECT STATE</option>
                        <?php foreach ($select_states as $state) { ?>
                            <option value="<?php echo $state->id; ?>" data-country="<?php echo $state->country_id ?>"
                                    <?php if ($state->id == $rows->branch_state){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $state->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="branch_city">Branch City</label>
                    <select name="branch_city" id="list_city"
                            class="required form-control styler choz">
                        <option>SELECT CITY</option>
                        <?php foreach ($select_city as $city) { ?>
                            <option value="<?php echo $city->id; ?>" data-country="<?php echo $city->country_id ?>"
                                    data-state="<?php echo $city->region_id ?>"
                                    <?php if ($city->id == $rows->branch_city){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $city->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                   <div class="form-group">
                     <label class="control-label" for="parent_id">Organization</label>               
                    <select name="parent_id" id="parent_id"
                            class="required form-control styler choz">
                        <option>SELECT ORGANIZATION</option>
                        <?php foreach ($organisation_list as $organisation) { ?>
                            <option value="<?php echo $organisation->id; ?>"
                                    <?php if ($organisation->id == $rows->parent_id){ ?>selected="selected"<?php } ?>
                            >
                                <?php echo $organisation->organisation_name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="zone_coverage">Zone Coverage</label>
                    <select multiple="multiple" id="zone_coverage" name="zone_coverage[]"
                            class="required form-control styler choz">
                        <option value=""></option>
                        <?php if (!empty($zone_list)): ?>
                            <?php foreach ($zone_list as $zones): ?>
                                <option value="<?php echo $zones->id; ?>" <?php echo (in_array($zones->id, $zone_coverage_list, true)) ? "selected" : "" ?>>
                                    <?php echo $zones->zone_name; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">                   
                    <input id="contact_person" name="contact_person" type="hidden" maxlength="20"
                           value="<?php echo $rows->contact_person; ?>" class="form-control styler"/>           
                    <input name="date_created" class="datepicker form-control styler" type="hidden" maxlength="20"
                           value="<?php echo $rows->date_created; ?>"/>
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
	 