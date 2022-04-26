<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_logs
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credits_logs&do=updatepro'; ?>" method="post" name="hezecomform"
      id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_logs&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>
            <a href="<?php echo H_ADMIN; ?>&view=orange_credits_logs&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credits Logs</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="action">Action</label>
                    <input id="action" name="action" type="text" maxlength="100" value="<?php echo $rows->action; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="ip_address">Ip Address</label>
                    <input id="ip_address" name="ip_address" type="text" maxlength="100"
                           value="<?php echo $rows->ip_address; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="created_by">Created By</label>
                    <input id="created_by" name="created_by" type="text" maxlength="100"
                           value="<?php echo $rows->created_by; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="createdAt">CreatedAt</label>
                    <input name="createdAt" class="datepicker form-control styler" type="text" maxlength="100"
                           value="<?php echo $rows->createdAt; ?>"/>
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
	 