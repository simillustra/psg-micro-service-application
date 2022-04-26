<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_kyc
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Orange Credit Kyc</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>


                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_kyc&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>Customer Fullname</th>
                        <td><?php echo $rows->customer_fullname; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Date Of Birth</th>
                        <td><?php echo $rows->customer_date_of_birth; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Gender</th>
                        <td><?php echo $rows->customer_gender; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Passport Photo</th>
                        <td class='gallery'><?php if (is_file(UPLOAD_FOLDER . $rows->customer_passport_photo)) { ?><a
                                href='<?php echo UPLOAD_FOLDER . $rows->customer_passport_photo; ?>' data-rel='hezebox'>
                                <img src='<?php echo THUMB_FOLDER . $rows->customer_passport_photo; ?>'></a><?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Customer Identity Type</th>
                        <td><?php echo $rows->customer_identity_type; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Identity Card</th>
                        <td class='gallery'><?php if (is_file(UPLOAD_FOLDER . $rows->customer_identity_card)) { ?><a
                                href='<?php echo UPLOAD_FOLDER . $rows->customer_identity_card; ?>' data-rel='hezebox'>
                                <img src='<?php echo THUMB_FOLDER . $rows->customer_identity_card; ?>'></a><?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Customer Contact Address</th>
                        <td><?php echo $rows->customer_contact_address; ?></td>
                    </tr>
                    <tr>
                        <th>Customer Country</th>
                        <td><?php echo $rows->country; ?></td>
                    </tr>
                    <tr>
                        <th>Customer State</th>
                        <td><?php echo $rows->state; ?></td>
                    </tr>
                    <tr>
                        <th>Customer City</th>
                        <td><?php echo $rows->city; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Employment Status</th>
                        <td><?php echo $rows->customer_employment_status; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Occupation</th>
                        <td><?php echo $rows->customer_occupation; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Monthly Income</th>
                        <td><?php echo $rows->customer_monthly_income; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Bvn Number</th>
                        <td><?php echo $rows->customer_bvn_number; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Bank Name</th>
                        <td><?php echo $rows->customer_bank_name; ?></td>
                    </tr>

                    <tr>
                        <th>Customer Bank Account</th>
                        <td><?php echo $rows->customer_bank_account; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor Fullname</th>
                        <td><?php echo $rows->customer_ec1_fullname; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor Phone</th>
                        <td><?php echo $rows->customer_ec1_phone; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor Identity Type</th>
                        <td><?php echo $rows->customer_ec1_identity_type; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor ID Number</th>
                        <td><?php echo $rows->customer_ec1_id_number; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor Captured ID Card</th>
                        <td class='gallery'><?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec1_card)) { ?><a
                                href='<?php echo UPLOAD_FOLDER . $rows->customer_ec1_card; ?>' data-rel='hezebox'><img
                                        src='<?php echo THUMB_FOLDER . $rows->customer_ec1_card; ?>'></a><?php } ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor 2 Fullname</th>
                        <td><?php echo $rows->customer_ec2_fullname; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor 2 Phone</th>
                        <td><?php echo $rows->customer_ec2_phone; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor 2 Identity Type</th>
                        <td><?php echo $rows->customer_ec2_identity_type; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor 2 ID Number</th>
                        <td><?php echo $rows->customer_ec2_id_number; ?></td>
                    </tr>

                    <tr>
                        <th>Guarantor 2 uploaded ID Card</th>
                        <td class='gallery'><?php if (is_file(UPLOAD_FOLDER . $rows->customer_ec2_card)) { ?><a
                                href='<?php echo UPLOAD_FOLDER . $rows->customer_ec2_card; ?>' data-rel='hezebox'><img
                                        src='<?php echo THUMB_FOLDER . $rows->customer_ec2_card; ?>'></a><?php } ?></td>
                    </tr>
                    <tr>
                        <th>KYC Status</th>
                        <td><?php echo $rows->kyc_status; ?></td>
                    </tr>
                    <tr>
                        <th>Date Created</th>
                        <td><?php echo $rows->date_created; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	