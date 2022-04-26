
	<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_countries.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_countries
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include (APP_FOLDER . '/models/objects/orange_credit_countries.php');

class orange_credit_countries_controller
{
    public $orange_credit_countries_model;

    public function __construct()
    {
        $this->orange_credit_countries_model = new orange_credit_countries_model();
    }

    public function invoke_orange_credit_countries()
    {

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_countries_model->SelectAll(RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_countries_model->CountRow(),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_countries&do=viewall');
            } else {
                $result = $this->orange_credit_countries_model->SelectAll();
            }
            include (APP_FOLDER . '/views/admin/orange_credit_countries/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_countries_model->SelectAll();
            include (APP_FOLDER . '/views/admin/orange_credit_countries/Export.php');
        }

        //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_countries_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_countries/Export2.php');
        }
        //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_countries_model->AutoSearch(trim($qstring),
                    10, 'name');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_countries&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->name . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        }


        //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include (APP_FOLDER . '/views/admin/orange_credit_countries/Add.php');
        }

        //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('name') == '') {
                    json_error('The field name cannot be empty!');
                } elseif (post('code') == '') {
                    json_error('The field code cannot be empty!');
                } else {
                    $this->orange_credit_countries_model->Insert(post('name'), post('code'));
                    json_send('' . H_ADMIN . '&view=orange_credit_countries&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        }

        //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_countries_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_countries/Update.php');
        }

        //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('name') == '') {
                    json_error('The field name cannot be empty!');
                } elseif (post('code') == '') {
                    json_error('The field code cannot be empty!');
                } else {
                    $this->orange_credit_countries_model->Update(post('name'), post('code'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_countries&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        }

        //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_countries_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_countries/Details.php');
        }

        //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_countries_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_countries&do=viewall&msg=truncate');
            include (APP_FOLDER . '/views/admin/orange_credit_countries/View.php');
        }

        //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_countries_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_countries&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_countries_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_countries&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_countries&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class

?>
	