<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_branches.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_branches
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_branches.php');
include(APP_FOLDER . '/models/objects/orange_credit_zones.php');
include(APP_FOLDER . '/models/objects/orange_credit_countries.php');
include(APP_FOLDER . '/models/objects/orange_credit_regions.php');
include(APP_FOLDER . '/models/objects/orange_credit_cities.php');
include(APP_FOLDER . '/models/objects/orange_credit_organisation.php');

class orange_credit_branches_controller
{
    public $orange_credit_branches_model;
    public $orange_credit_zones_model;
    public $orange_credit_countries_model;
    public $orange_credit_regions_model;
    public $orange_credit_cities_model;
    public $orange_credit_organisation_model;

    public function __construct()
    {
        $this->orange_credit_branches_model = new orange_credit_branches_model();
        $this->orange_credit_zones_model = new orange_credit_zones_model();
        $this->orange_credit_countries_model = new orange_credit_countries_model();
        $this->orange_credit_regions_model = new orange_credit_regions_model();
        $this->orange_credit_cities_model = new orange_credit_cities_model();
        $this->orange_credit_organisation_model = new orange_credit_organisation_model();
    }

    public function invoke_orange_credit_branches()
    {
        $user_id = get('bid') ? get('bid') : $_SESSION['H_USER_SESSION_ID'];
        $user_role_id = (int)$_SESSION['H_USER_SESSION_POSITION'];
        $range_start = get('range_start') ? get('range_start') : date('2019-01-01');
        $range_end = get('range_end') ? get('range_end') : date('Y-m-d');

        $query_keys = array(
            'user_id' => $user_id,
            'user_role' => $user_role_id,
            'range_start' => $range_start,
            'range_end' => $range_end
        );

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_branches_model->SelectAll($query_keys, RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_branches_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_branches&do=viewall&bid=' . $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_branches_model->SelectAll($query_keys);
            }
            include(APP_FOLDER . '/views/admin/orange_credit_branches/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_branches_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_branches/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_branches_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_branches/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_branches_model->AutoSearch(trim($qstring), 10,
                    'branch_code');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_branches&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->branch_code . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            $country_array = $this->orange_credit_countries_model->SelectAll();
            $zone_list = $this->orange_credit_zones_model->showList($_SESSION['H_USER_SESSION_ID']);
            $organisation_list = $this->orange_credit_organisation_model->showList($_SESSION['H_USER_SESSION_ID']);
            include(APP_FOLDER . '/views/admin/orange_credit_branches/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('branch_code') == '') {
                    json_error('The field branch code cannot be empty!');
                } elseif (post('branch_name') == '') {
                    json_error('The field branch name cannot be empty!');
                } elseif (post('branch_address') == '') {
                    json_error('The field branch address cannot be empty!');
                } elseif (post('branch_city') == '') {
                    json_error('The field branch city cannot be empty!');
                } elseif (post('branch_state') == '') {
                    json_error('The field branch state cannot be empty!');
                } elseif (post('branch_country') == '') {
                    json_error('The field branch country cannot be empty!');
                } elseif (post('parent_id') == '') {
                    json_error('The field parent id cannot be empty!');
                } elseif (post('zone_coverage') == '') {
                    json_error('The field zone coverage cannot be empty!');
                } elseif (post('contact_person') == '') {
                    json_error('The field contact person cannot be empty!');
                } elseif (post('date_created') == '') {
                    json_error('The field date created cannot be empty!');
                } else {
                    // Indexed Array
                    $zone_list = post('zone_coverage');
                    // Separate Array by " , "
                    $zone_coverage = implode(" , ", $zone_list);
                    $this->orange_credit_branches_model->Insert(post('branch_code'), post('branch_name'),
                        post('branch_address'), post('branch_city'), post('branch_state'), post('branch_country'),
                        post('parent_id'), $zone_coverage, post('contact_person'), post('date_created'));
                    json_send('' . H_ADMIN . '&view=orange_credit_branches&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_branches_model->SelectOne(get('id'));
            $zone_coverage_list = explode(" , ", $rows->zone_coverage);
            $zone_list = $this->orange_credit_zones_model->showList($_SESSION['H_USER_SESSION_ID']);
            $organisation_list = $this->orange_credit_organisation_model->showList($_SESSION['H_USER_SESSION_ID']);
            $country_array = $this->orange_credit_countries_model->SelectAll();
            $select_states = $this->orange_credit_regions_model->customSelectAll($rows->branch_country);
            $select_city = $this->orange_credit_cities_model->customSelectAll($rows->branch_state, $rows->branch_country);
            include(APP_FOLDER . '/views/admin/orange_credit_branches/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('branch_code') == '') {
                    json_error('The field branch code cannot be empty!');
                } elseif (post('branch_name') == '') {
                    json_error('The field branch name cannot be empty!');
                } elseif (post('branch_address') == '') {
                    json_error('The field branch address cannot be empty!');
                } elseif (post('branch_city') == '') {
                    json_error('The field branch city cannot be empty!');
                } elseif (post('branch_state') == '') {
                    json_error('The field branch state cannot be empty!');
                } elseif (post('branch_country') == '') {
                    json_error('The field branch country cannot be empty!');
                } elseif (post('parent_id') == '') {
                    json_error('The field parent id cannot be empty!');
                } elseif (post('zone_coverage') == '') {
                    json_error('The field zone coverage cannot be empty!');
                } elseif (post('contact_person') == '') {
                    json_error('The field contact person cannot be empty!');
                } elseif (post('date_created') == '') {
                    json_error('The field date created cannot be empty!');
                } else {
                    // Indexed Array
                    $zone_list = post('zone_coverage');
                    // Separate Array by " , "
                    $zone_coverage = implode(" , ", $zone_list);
                    $this->orange_credit_branches_model->Update(post('branch_code'), post('branch_name'),
                        post('branch_address'), post('branch_city'), post('branch_state'), post('branch_country'),
                        post('parent_id'), $zone_coverage, post('contact_person'), post('date_created'),
                        post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_branches&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_branches_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_branches/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_branches_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_branches&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_branches/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_branches_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_branches&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_branches_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_branches&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_branches&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class

?>
	