<?php
	$this->load->helper('url');
?>

                            	<table width="100%" border="1" style="border-collapse:collapse; border-color:#CCCCCC;" cellpadding="4" cellspacing="4">
                                	<tr>
                                    	<td style="padding:10px;"><a href="<?php echo site_url()."/pm"?>">Inbox</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/new"?>">New</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Sent</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/trashed"?>">Trashed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Viewed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/compose"?>">Compose</a></td>
                                    </tr>
                                </table>
                                <br />
								<?php if(count($messages)>0):?>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="26%" style="font-weight:bold; background:#F2F2F2; padding:4px;">From</td>
                            <td width="51%" style="font-weight:bold; background:#F2F2F2; padding:4px;">Title</td>
                            <td width="23%" style="font-weight:bold; background:#F2F2F2; padding:4px;">Date</td>
                                      </tr>
                                        <?php for($i=0;$i<count($messages);$i++):?>
											<tr style="background:#FCFBF3;">
												<td style="padding:4px;"><?php echo $messages[$i]['from']; ?></td>
												<td style="padding:4px;"><a href='<?php echo site_url()."/pm/message/".$messages[$i]['userid']; ?>'><?php echo $messages[$i]['title'] ?></a></td>
												<td style="padding:4px;"><?php echo $messages[$i]['created']; ?></td>
											</tr>
										<?php endfor;?>
                                    </table>
                                <?php else:?>
                                	<h1>No messages found.</h1>
							  <?php endif;?>							
