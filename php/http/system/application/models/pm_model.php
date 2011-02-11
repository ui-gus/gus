<?php
class PM_Model extends Model 
{
	var $table_name = "messages";
    var $userid = '';
    var $username = '';
    var $messages = array();
    var $dateformat = '';
	
	function PM_Model()
	{
		parent::Model();
		$this->load->database('admin');
	}
	
	public function initialise($user,$date="d.m.Y - H:i")
    {
        $this->userid = $user;
        $this->dateformat = $date;
    }
	
    function getmessages($type='') 
	{
		$conditions="";
		$orderby="";
				
        switch($type) 
		{
            case "0": 
				$conditions = "`to` = '".$this->userid."' && `to_viewed` = '0' && `to_deleted` = '0'";
				$orderby="`created` DESC";
				break;
				
            case "1": 
				$conditions = "`to` = '".$this->userid."' && `to_viewed` = '1' && `to_deleted` = '0'";
				$orderby="`to_vdate` DESC";
				break;

            case "2": 
				$conditions = "`from` = '".$this->userid."'";
				$orderby="`created` DESC";
				break;

            case "3": 
				$conditions = "`to` = '".$this->userid."' && `to_deleted` = '1'";
				$orderby="`to_ddate` DESC";
				break;

			default:
				$conditions = "`to` = '".$this->userid."'";
				$orderby="`created` DESC";
				break;

		}
		
		if($conditions!="")       
			$this->db->where($conditions);
		if($orderby!="")
			$this->db->orderby($orderby);
		
		$query = $this->db->get($this->table_name);
        if($query->num_rows() > 0) 
		{
			$result=$query->result_array();
			
            $i=0;

            $this->messages = array();

            foreach($result as $row) 
			{
                $this->messages[$i]['userid'] = $row['userid'];
                $this->messages[$i]['title'] = $row['title'];
                $this->messages[$i]['message'] = $this->render($row['message']);
                $this->messages[$i]['fromid'] = $row['from'];
                $this->messages[$i]['toid'] = $row['to'];
                $this->messages[$i]['from'] = $this->getusername($row['from']);
                $this->messages[$i]['to'] = $this->getusername($row['to']);
                $this->messages[$i]['from_viewed'] = $row['from_viewed'];
                $this->messages[$i]['to_viewed'] = $row['to_viewed'];
                $this->messages[$i]['from_deleted'] = $row['from_deleted'];
                $this->messages[$i]['to_deleted'] = $row['to_deleted'];
                $this->messages[$i]['from_vdate'] = date($this->dateformat, strtotime($row['from_vdate']));
                $this->messages[$i]['to_vdate'] = date($this->dateformat, strtotime($row['to_vdate']));
                $this->messages[$i]['from_ddate'] = date($this->dateformat, strtotime($row['from_ddate']));
                $this->messages[$i]['to_ddate'] = date($this->dateformat, strtotime($row['to_ddate']));
                $this->messages[$i]['created'] = date($this->dateformat, strtotime($row['created']));
                $i++;
            }
        }
		
		return $this->messages;
    }
	
    function getmessage($message) 
	{
		$this->messages = array();
		
		$conditions="`id` = '".$message."' && (`from` = '".$this->userid."' || `to` = '".$this->userid."')";
		
		if($conditions!="")       
			$this->db->where($conditions);
		$this->db->limit(1,0);
		
		$query = $this->db->get($this->table_name);
		
        if($query->num_rows() > 0) 
		{
			$result=$query->result_array();

            $this->messages = array();

            $row = $result[0];
			
            $this->messages[0]['id'] = $row['id'];
            $this->messages[0]['title'] = $row['title'];
            $this->messages[0]['message'] = $this->render($row['message']);
            $this->messages[0]['fromid'] = $row['from'];
            $this->messages[0]['toid'] = $row['to'];
            $this->messages[0]['from'] = $this->getusername($row['from']);
            $this->messages[0]['to'] = $this->getusername($row['to']);
            $this->messages[0]['from_viewed'] = $row['from_viewed'];
            $this->messages[0]['to_viewed'] = $row['to_viewed'];
            $this->messages[0]['from_deleted'] = $row['from_deleted'];
            $this->messages[0]['to_deleted'] = $row['to_deleted'];
            $this->messages[0]['from_vdate'] = date($this->dateformat, strtotime($row['from_vdate']));
            $this->messages[0]['to_vdate'] = date($this->dateformat, strtotime($row['to_vdate']));
            $this->messages[0]['from_ddate'] = date($this->dateformat, strtotime($row['from_ddate']));
            $this->messages[0]['to_ddate'] = date($this->dateformat, strtotime($row['to_ddate']));
            $this->messages[0]['created'] = date($this->dateformat, strtotime($row['created']));
        }
		
		return $this->messages;
    }
	
    function getusername($userid) 
	{
		$this->db->select("un");
		$this->db->where("`id` = '".$userid."'");
		$this->db->limit(1,0);
		
		$query = $this->db->get("user");

        if($query->num_rows()>0)
		{
			$result=$query->result_array();

            $row = $result[0];
            return $row['un'];
        } 
		else 
		{
            return "Unknown";
        }
    }

    function viewed($message) 
	{	
		try
		{
			$this->db->set('to_viewed','1');
			$this->db->set('to_vdate', 'NOW()',false);
			$this->db->limit(1,0);
			
			$this->db->where('id',$message);
			$this->db->update($this->table_name);
		}
		catch(Exception $e)
		{
			return false;
		}
			
		return true;
    }
	
    function deleted($message) 
	{
		try
		{
			$this->db->set('to_deleted','1');
			$this->db->set('to_ddate', 'NOW()',false);
			$this->db->limit(1,0);
			
			$this->db->where('id',$message);
			$this->db->update($this->table_name);
		}
		catch(Exception $e)
		{
			return false;
		}
			
		return true;
    }
	
    function sendmessage($to,$title,$message) 
	{		
		try
		{
			$this->db->set('to',$to);
			$this->db->set('from',$this->userid);
			$this->db->set('title',$title);
			$this->db->set('message',$message);
			$this->db->set('created','NOW()',false);
			
			$this->db->insert($this->table_name);
		}
		catch(Exception $e)
		{
			return false;
		}
			
		return true;
    }
	
    function render($message) 
	{
        $message = strip_tags($message, '');
        $message = stripslashes($message); 
        $message = nl2br($message);
        return $message;
    }
	
}

?>
