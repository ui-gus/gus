                            	<table width="100%" border="1" style="border-collapse:collapse; border-color:#CCCCCC;" cellpadding="4" cellspacing="4">
                                	<tr>
                                    	<td style="padding:10px;"><a href="<?php echo site_url()."/pm"?>">Inbox</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/new"?>">New</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Sent</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/trashed"?>">Trashed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Viewed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/compose"?>">Compose</a></td>
                                    </tr>
                                </table>
                                <br />
								<?php if(count($messages)>0):
									$message=$messages[0];
								?>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">Title</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><?php echo $message['title']; ?></td>
                                  </tr>
                                  <tr>
                                    <td width="14%" align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">From</td>
                                    <td width="86%" align="left" valign="top" style="background:#F2F2F2; padding:4px;"><?php echo $message['from']; ?></td>
                                    </tr>
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">To</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><?php echo $message['to']; ?></td>
                                    </tr>
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">Date</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><?php echo $message['created']; ?></td>
                                    </tr>
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">Message</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><?php echo $message['message']; ?></td>
                                </tr>
                                </table>
								<?php else:?>
                                    <h1>No message found.</h1>
                                <?php endif;?>							
