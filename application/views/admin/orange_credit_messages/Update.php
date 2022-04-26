<?php
/*
* =======================================================================
* FILE NAME:        Update.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_messages
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>


<form action="<?php echo H_ADMIN_MAIN . '&view=orange_credit_messages&do=updatepro'; ?>" method="post"
      name="hezecomform" id="hezecomform" enctype="multipart/form-data">
    <div class="col-12">
        <ul class="nav pull-right" style="margin-top:5px;">
            <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i
                        class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD; ?></label>
            <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD; ?>"/>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&id=<?php echo $rows->id; ?>&do=details"
               title="View Details" class="btn btn-default btn-sm tip"><i
                        class="fa fa-th-list"></i> <?php echo LANG_DETAILS; ?></a>

            <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&do=viewall" class="btn btn-default btn-sm tip"
               title="<?php echo LANG_TIP_VIEWALL; ?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE; ?>
                    Orange Credit Messages</h3></div>
            <div class="panel-body">

                <div class="output"></div>

                <input type="hidden" name="id" value="<?php echo $rows->id; ?>">
                <div class="form-group">
                    <label class="control-label" for="user_to">User To</label>
                    <input id="user_to" name="user_to" type="text" maxlength="11" value="<?php echo $rows->user_to; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="user_from">User From</label>
                    <input id="user_from" name="user_from" type="text" maxlength="11"
                           value="<?php echo $rows->user_from; ?>" class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="subject">Subject</label>
                    <input id="subject" name="subject" type="text" maxlength="100" value="<?php echo $rows->subject; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="message">Message</label>
                    <textarea rows="5" id="message" name="message"
                              class="form-control editor2 styler"/><?php echo $rows->message; ?></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" for="attachment">Attachment</label>
                    <div class="hezefield">
                        <input type="file" id="file" value="" name="gfile[]" class="heze_item styler"
                               style="padding:0px; width:220px; margin-bottom:20px;"/>
                    </div>
                    <p><span id="addVar" class="btn btn-xs btn-success"><?php echo LANG_ADD_FIELD; ?></span></p>
                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-lg-12 gallery">
                                    <?php foreach ($upld as $frows) {
                                        if (strlen($frows->gfile) > 1) {
                                            ?>
                                            <div class="col-md-2" style="padding-top:10px;">
                                                <a href='<?php echo UPLOAD_FOLDER . $frows->gfile; ?>'
                                                   data-rel='hezebox'><img
                                                            src='<?php echo THUMB_FOLDER . $frows->gfile; ?>'
                                                            class='img-responsive img-thumbnail'></a>
                                                <a href='<?php echo H_ADMIN; ?>&view=orange_credit_messages&id=<?php echo get('id'); ?>&fid=<?php echo $frows->fid; ?>&do=delete&onedel=del&dfile=<?php echo $frows->gfile; ?>'
                                                   title='<?php echo LANG_TIP_DELETE; ?>'
                                                   class='btn btn-xs btn-danger tip'
                                                   data-confirm='<?php echo LANG_DELETE_AUTH; ?>'>
                                                    <span class='fa fa-times'></span> <?php echo LANG_REMOVE; ?></a>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                </div>

                <div class="form-group">
                    <label class="control-label" for="respond">Respond</label>
                    <input id="respond" name="respond" type="text" maxlength="11" value="<?php echo $rows->respond; ?>"
                           class="form-control styler"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sender_open">Sender Open</label>
                    <select name="sender_open" id="sender_open" class=" form-control styler choz">
                        <option value="<?php echo $rows->sender_open; ?>"><?php echo $rows->sender_open; ?></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="receiver_open">Receiver Open</label>
                    <select name="receiver_open" id="receiver_open" class=" form-control styler choz">
                        <option value="<?php echo $rows->receiver_open; ?>"><?php echo $rows->receiver_open; ?></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="sender_delete">Sender Delete</label>
                    <select name="sender_delete" id="sender_delete" class=" form-control styler choz">
                        <option value="<?php echo $rows->sender_delete; ?>"><?php echo $rows->sender_delete; ?></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="receiver_delete">Receiver Delete</label>
                    <select name="receiver_delete" id="receiver_delete" class=" form-control styler choz">
                        <option value="<?php echo $rows->receiver_delete; ?>"><?php echo $rows->receiver_delete; ?></option>
                        <option value="y">y</option>
                        <option value="n">n</option>
                    </select>
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
	 