<?php                           
        $this->load->helper('url');
?>
                            	<table width="100%" border="1" style="border-collapse:collapse; border-color:#CCCCCC;" cellpadding="4" cellspacing="4">
                                	<tr>
                                    	<td style="padding:10px;"><a href="<?php echo site_url()."/pm"?>">Inbox</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/new"?>">New</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Sent</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/trashed"?>">Trashed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/messages/sent"?>">Viewed</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url()."/pm/compose"?>">Compose</a></td>
                                    </tr>
                                </table>
                                <br />
                                <form action="<?php echo site_url()."/pm/compose"?>" method="post" name="frmCompose">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">To</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><input name="txtTo" type="text" id="txtTo" size="40" /></td>
                                    </tr>
                                  <tr>
                                    <td width="14%" align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">Title</td>
                                    <td width="86%" align="left" valign="top" style="background:#F2F2F2; padding:4px;"><label>
                                      <input name="txtTitle" type="text" id="txtTitle" size="80" />
                                    </label></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">Message</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><textarea name="txtMessage" cols="80" rows="5" id="txtMessage"></textarea></td>
                                </tr>
                                  <tr>
                                    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">&nbsp;</td>
                                    <td align="left" valign="top" style="background:#F2F2F2; padding:4px;"><label>
                                      <input type="submit" name="btnPost" id="btnPost" value="Send" />
                                    </label></td>
                                  </tr>
                                </table>
                                </form>
