<?php
/*
* =======================================================================
* FILE NAME:        Details.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_messages
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
                <h3 class="box-title">Orange Credit Messages</h3>
                <ul class="nav pull-right">

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&do=viewall"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL; ?>"><i
                                class="fa fa-reply"></i> <?php echo LANG_GO_BACK; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&do=add"
                       class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_ADD; ?>"><i
                                class="fa fa-plus"></i> <?php echo LANG_ADD; ?></a>

                    <a href="<?php echo H_ADMIN; ?>&view=orange_credit_messages&id=<?php echo $rows->id; ?>&do=update"
                       title="<?php echo LANG_TIP_UPDATE; ?> Record" class="btn btn-default btn-xs tip"><i
                                class="fa fa-edit"></i> <?php echo LANG_UPDATE; ?></a>
                    <a href="<?php echo H_ADMIN_MAIN; ?>&view=orange_credit_messages&id=<?php echo $rows->id; ?>&do=export2&hexport=yes&etype=printer"
                       title="<?php echo LANG_TIP_PRINT; ?>" target="_blank" class="btn btn-default btn-xs tip"><i
                                class="fa fa-print"></i> <?php echo LANG_PRINT; ?></a>

                </ul>

            </div><!-- /.box-header -->
            <div class="box-body">
                <table data-page="false" class="table table-striped table-bordered">
                    <tbody>

                    <tr>
                        <th>User To</th>
                        <td><?php echo $rows->user_to; ?></td>
                    </tr>

                    <tr>
                        <th>User From</th>
                        <td><?php echo $rows->user_from; ?></td>
                    </tr>

                    <tr>
                        <th>Subject</th>
                        <td><?php echo $rows->subject; ?></td>
                    </tr>

                    <tr>
                        <th>Message</th>
                        <td><?php echo $rows->message; ?></td>
                    </tr>

                    <tr>
                        <td colspan="2">Attachment</td>
                    </tr>
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

                    <tr>
                        <th>Respond</th>
                        <td><?php echo $rows->respond; ?></td>
                    </tr>

                    <tr>
                        <th>Sender Open</th>
                        <td><?php echo $rows->sender_open; ?></td>
                    </tr>

                    <tr>
                        <th>Receiver Open</th>
                        <td><?php echo $rows->receiver_open; ?></td>
                    </tr>

                    <tr>
                        <th>Sender Delete</th>
                        <td><?php echo $rows->sender_delete; ?></td>
                    </tr>

                    <tr>
                        <th>Receiver Delete</th>
                        <td><?php echo $rows->receiver_delete; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
	