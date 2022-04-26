<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_kyc
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_kyc&do=updatepro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>


            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Kyc</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Personal Info</legend>
                    <input type="hidden" name="id" value="<?php echo $rows->id; ?>"/>
                    <div class="form-group">
                        <label class="control-label" for="customer_fullname">Customer Fullname</label>
                        <input id="customer_fullname" name="customer_fullname" type="text" maxlength="255"
                               value="<?php echo $rows->customer_fullname; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_date_of_birth">Customer Date Of Birth</label>
                        <input name="customer_date_of_birth" class="datepicker form-control styler" type="text"
                               maxlength="255" value="<?php echo $rows->customer_date_of_birth; ?>"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_gender">Customer Gender</label>
                        <select name="customer_gender" id="customer_gender" class=" form-control styler choz">
                            <option value="<?php echo $rows->customer_gender; ?>"><?php echo $rows->customer_gender; ?></option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_passport_photo">Customer Passport Photo</label>
                        <input id="customer_passport_photo" name="customer_passport_photo" type="file"
                               class="styler"/><br><?php if (is_file(UPLOAD_FOLDER . $rows->customer_passport_photo)) { ?>
                            <a
                                    href="#"><img src="<?php echo THUMB_FOLDER . $rows->customer_passport_photo; ?>">
                            </a>
                            <br><?php } ?>
                        <?php if (is_file(UPLOAD_FOLDER . $rows->customer_passport_photo)) { ?>
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&dfile=<?php echo $rows->customer_passport_photo; ?>&do=delete&fdel=file"
                               data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                            class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a>
                            <br><?php } ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_identity_type">Customer Identity Type</label>
                        <select name="customer_identity_type" id="customer_identity_type"
                                class=" form-control styler choz">
                            <option value="<?php echo $rows->customer_identity_type; ?>"><?php echo $rows->customer_identity_type; ?></option>
                            <option value="NATIONAL IDENTITY CARD">NATIONAL IDENTITY CARD</option>
                            <option value="PERMANENT VOTERS CARD">PERMANENT VOTERS CARD</option>
                            <option value="INTERNATIONAL PASSPORT">INTERNATIONAL PASSPORT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_identity_card">Customer Identity Card</label>
                        <input id="customer_identity_card" name="customer_identity_card" type="file"
                               class="styler"/><br><?php if (is_file(UPLOAD_FOLDER . $rows->customer_identity_card)) { ?>
                            <a
                                    href="#"><img src="<?php echo THUMB_FOLDER . $rows->customer_identity_card; ?>"></a>
                            <br><?php } ?>
                        <?php if (is_file(UPLOAD_FOLDER . $rows->customer_identity_card)) { ?>
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&dfile=<?php echo $rows->customer_identity_card; ?>&do=delete&fdel=file"
                               data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                            class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a>
                            <br><?php } ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_contact_address">Customer Contact Address</label>
                        <input id="customer_contact_address" name="customer_contact_address" type="text" maxlength="100"
                               value="<?php echo $rows->customer_contact_address; ?>" class="form-control styler"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="customer_country">Customer Country</label>
                        <select name="customer_country" id="customer_country"
                                class="required form-control styler choz" onchange="ListAvailableState(this)">
                            <option>SELECT COUNTRY</option>
                            <?php foreach ($country_array as $country) { ?>
                                <option value="<?php echo $country->id; ?>" data-country="<?php echo $country->code ?>"
                                        <?php if ($country->id == $rows->customer_country){ ?>selected="selected"<?php } ?>
                                >
                                    <?php echo $country->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="customer_state">Customer State</label>
                        <select name="customer_state" id="list_state"
                                class="required form-control styler choz" onchange="ListAvailableCites(this)">
                            <option>SELECT STATE</option>
                            <?php foreach ($select_states as $state) { ?>
                                <option value="<?php echo $state->id; ?>"
                                        data-country="<?php echo $state->country_id ?>"
                                        <?php if ($state->id == $rows->customer_state){ ?>selected="selected"<?php } ?>
                                >
                                    <?php echo $state->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_city">Customer City</label>
                        <select name="customer_city" id="list_city"
                                class="required form-control styler choz">
                            <option>SELECT CITY</option>
                            <?php foreach ($select_city as $city) { ?>
                                <option value="<?php echo $city->id; ?>" data-country="<?php echo $city->country_id ?>"
                                        data-state="<?php echo $city->region_id ?>"
                                        <?php if ($city->id == $rows->customer_city){ ?>selected="selected"<?php } ?>
                                >
                                    <?php echo $city->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="customer_employment_status">Customer Employment Status</label>
                        <select name="customer_employment_status" id="customer_employment_status"
                                class=" form-control styler choz">
                            <option value="<?php echo $rows->customer_employment_status; ?>"><?php echo $rows->customer_employment_status; ?></option>
                            <option value="CIVIL SERVICE (Private Company)">CIVIL SERVICE (Private Company)</option>
                            <option value="Public SERVICE (Government)">Public SERVICE (Government)</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Self Employed">Self Employed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_occupation">Customer Occupation</label>
                        <input id="customer_occupation" name="customer_occupation" type="text" maxlength="100"
                               value="<?php echo $rows->customer_occupation; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_monthly_income">Customer Monthly Income</label>
                        <input id="customer_monthly_income" name="customer_monthly_income" type="text" maxlength="100"
                               value="<?php echo $rows->customer_monthly_income; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_bvn_number">Customer Bvn Number</label>
                        <input id="customer_bvn_number" name="customer_bvn_number" type="text" maxlength="100"
                               value="<?php echo $rows->customer_bvn_number; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_bank_name">Customer Bank Name</label>
                        <input id="customer_bank_name" name="customer_bank_name" type="text" maxlength="100"
                               value="<?php echo $rows->customer_bank_name; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_bank_account">Customer Bank Account</label>
                        <input id="customer_bank_account" name="customer_bank_account" type="text" maxlength="100"
                               value="<?php echo $rows->customer_bank_account; ?>" class="form-control styler"/>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Guarantor Information 1</legend>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec1_fullname">Guarantor Fullname</label>
                        <input id="customer_ec1_fullname" name="customer_ec1_fullname" type="text" maxlength="255"
                               value="<?php echo $rows->customer_ec1_fullname; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec1_phone">Guarantor  Phone</label>
                        <input id="customer_ec1_phone" name="customer_ec1_phone" type="text" maxlength="50"
                               value="<?php echo $rows->customer_ec1_phone; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec1_identity_type">Guarantor Identity Type</label>
                        <select name="customer_ec1_identity_type" id="customer_ec1_identity_type"
                                class=" form-control styler choz">
                            <option value="<?php echo $rows->customer_ec1_identity_type; ?>"><?php echo $rows->customer_ec1_identity_type; ?></option>
                            <option value="PERMANENT VOTERS CARD">PERMANENT VOTERS CARD</option>
                            <option value="NATIONAL IDENTITY CARD">NATIONAL IDENTITY CARD</option>
                            <option value="INTERNATIONAL PASSPORT">INTERNATIONAL PASSPORT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec1_id_number">Guarantor ID Number</label>
                        <input id="customer_ec1_id_number" name="customer_ec1_id_number" type="text" maxlength="100"
                               value="<?php echo $rows->customer_ec1_id_number; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec1_card">Guarantor uploaded ID Card</label>
                        <input id="customer_ec1_card" name="customer_ec1_card" type="file"
                               class="styler"/><br><?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec1_card)) { ?><a
                                href="#"><img src="<?php echo THUMB_FOLDER . $rows->customer_ec1_card; ?>"></a>
                            <br><?php } ?>
                        <?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec1_card)) { ?>
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&dfile=<?php echo $rows->customer_ec1_card; ?>&do=delete&fdel=file"
                               data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                            class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a>
                            <br><?php } ?>

                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Guarantor Information 2</legend>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec2_fullname">Guarantor Fullname</label>
                        <input id="customer_ec2_fullname" name="customer_ec2_fullname" type="text" maxlength="100"
                               value="<?php echo $rows->customer_ec2_fullname; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec2_phone">Guarantor Phone</label>
                        <input id="customer_ec2_phone" name="customer_ec2_phone" type="text" maxlength="50"
                               value="<?php echo $rows->customer_ec2_phone; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec2_identity_type">Guarantor  Identity Type</label>
                        <select name="customer_ec2_identity_type" id="customer_ec2_identity_type"
                                class=" form-control styler choz">
                            <option value="<?php echo $rows->customer_ec2_identity_type; ?>"><?php echo $rows->customer_ec2_identity_type; ?></option>
                            <option value="PERMANENT VOTERS CARD">PERMANENT VOTERS CARD</option>
                            <option value="NATIONAL IDENTITY CARD">NATIONAL IDENTITY CARD</option>
                            <option value="INTERNATIONAL PASSPORT">INTERNATIONAL PASSPORT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec2_id_number">Guarantor ID Number</label>
                        <input id="customer_ec2_id_number" name="customer_ec2_id_number" type="text" maxlength="50"
                               value="<?php echo $rows->customer_ec2_id_number; ?>" class="form-control styler"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="customer_ec2_card">Guarantor uploaded ID Card</label>
                        <input id="customer_ec2_card" name="customer_ec2_card" type="file"
                               class="styler"/><br><?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec2_card)) { ?><a
                                href="#"><img src="<?php echo THUMB_FOLDER . $rows->customer_ec2_card; ?>"></a>
                            <br><?php } ?>
                        <?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec2_card)) { ?>
                            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&dfile=<?php echo $rows->customer_ec2_card; ?>&do=delete&fdel=file"
                               data-confirm="<?php echo LANG_DELETE_AUTH; ?>"><span class="btn btn-xs btn-danger"><i
                                            class="fa fa-remove"></i> <?php echo LANG_DELETE; ?></span></a>
                            <br><?php } ?>

                    </div>
                </fieldset>
                <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 5) { ?>
                    <div class="form-group">
                        <input id="kyc_updated" name="kyc_updated" type="hidden" maxlength="50"
                               value="<?php echo $rows->kyc_updated; ?>" readonly class="form-control styler"/>
                        <input id="kyc_status" name="kyc_status" type="hidden" maxlength="50"
                               value="PENDING" readonly class="form-control styler"/>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['H_USER_SESSION_POSITION'] == 1) { ?>
                    <div class="form-group">
                        <label class="control-label" for="kyc_status">Loan Status</label>
                        <select name="kyc_status" id="kyc_status" class=" form-control styler choz">
                            <option value="<?php echo $rows->kyc_status; ?>"><?php echo $rows->kyc_status; ?></option>
                            <option value="PENDING">PENDING</option>
                            <option value="PROCESSING">PROCESSING</option>
                            <option value="APPROVED">APPROVED</option>
                            <option value="DECLINED">DECLINED</option>
                            <option value="CANCELLED">CANCELLED</option>
                        </select>
                        <input id="kyc_updated" name="kyc_updated" type="hidden" maxlength="50"
                               value="<?php echo $rows->kyc_updated; ?>" readonly class="form-control styler"/>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <input id="kyc_updated" name="kyc_updated" type="hidden" maxlength="100"
                           value="<?php echo $rows->kyc_updated; ?>" class="form-control styler"/>
                    <input name="date_created" class="datepicker form-control styler" type="hidden" maxlength="100"
                           value="<?php echo $rows->date_created; ?>"/>
                    <input id="userid" name="userid" type="hidden" maxlength="20" value="<?php echo $rows->userid; ?>"
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
	 