<?php
session_start();
class users{
	public $host="localhost";
	public $username="root";
	public $pass="";
	public $db_name="apti-portal";
	public $conn, $data, $activetestIds, $alltestIds, $qus, $res;	
	public function __construct()
	{
		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
		if($this->conn->connect_errno)
		{
			die ("database connection failed".$this->conn->connect_errno);
		}
	}

	public function signup($data)
	{
		$this->conn->query($data);
		return true;
	}
	
	public function mul_signup($uid)
	{
		$mul_query=$this->conn->query("SELECT * FROM users WHERE uid='$uid'");
	    $mul_query->fetch_array(MYSQLI_ASSOC);
		if($mul_query->num_rows==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
		public function mul_attempt($uid, $tid)
	{
		$mul_query=$this->conn->query("SELECT * FROM result WHERE uid='$uid' AND test_id='$tid'");
	    $mul_query->fetch_array(MYSQLI_ASSOC);
		if($mul_query->num_rows==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	public function mul_test($tid, $tname)
	{
		$mul_query=$this->conn->query("SELECT * FROM tests WHERE tid=$tid OR tname='$tname'");
	    $mul_query->fetch_array(MYSQLI_ASSOC);
		if($mul_query->num_rows==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	
	}
	public function signin($uid,$pwd,$tad)
	{
		$query=$this->conn->query("SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd'");
	    $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['uid']=$uid;
			$_SESSION['test_cat']=$tad;
			return true;
		}
		else
		{
			return false;
		}
	
	}
	public function admin_in($uid,$pwd)
	{
		$query=$this->conn->query("SELECT * FROM admin WHERE a_id='$uid' AND a_pwd='$pwd'");
	    $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['a_id']=$uid;
			return true;
		}
		else
		{
			return false;
		}
	
	}
	// the following function is responsible for fetching entire data into row
	public function	users_profile($uid)
	{
		$query=$this->conn->query("select first,last from users where uid='$uid'");
	    $row=$query->fetch_array(MYSQLI_ASSOC);
		$this->data=$row["first"].' '.$row["last"];
		$_SESSION['student_name'] = $this->data;
	}
	public function qus_show($tid)
	{
		 $query=$this->conn->query("select * from questions where tid=$tid ORDER BY rand()");
	    while($row=$query->fetch_array(MYSQLI_ASSOC))		
		{			
			$this->qus[]=$row;
		} 
	}
	public function leaderboard($tid)
	{
		$query=$this->conn->query("select * from result where test_id=$tid ORDER BY result DESC");
	    while($row=$query->fetch_array(MYSQLI_ASSOC))		
		{			
			$this->res[]=$row;
		} 
	}
	public function answer($data,$tid)
	{
		 $ans=implode("",$data);
		 $right=0;
		 $wrong=0;
		 $no_answer=0;
		 $query=$this->conn->query("select id,ans from questions where tid=$tid");
	    while($qust=$query->fetch_array(MYSQLI_ASSOC))		
		{			
			if($qust['ans']==$_POST[$qust['id']])
			{
				 $right++;
			}
			elseif($_POST[$qust['id']]=="no_attempt")
			{
				 $no_answer++;
			}
			else
			{
				$wrong++;
			}
		}
		$array=array();
		$_SESSION['score'] = $right;
		$array['right']=$right;
		$array['wrong']=$wrong;
		$array['no_answer']=$no_answer;
		return $array;
		
	}
	public function url($url)
	{
		header("location:".$url);
	
	}
	public function activetests()
	{		
		$query=$this->conn->query("select * from tests where status=1");
	   	while($row=$query->fetch_array(MYSQLI_ASSOC))		
		{
			
			$this->activetestIds[]=$row;
		}
		return $this->activetestIds;
	}
	public function alltests()
	{		
		$query=$this->conn->query("select * from tests");
	   	while($row=$query->fetch_array(MYSQLI_ASSOC))		
		{
			
			$this->alltestIds[]=$row;
		}
		return $this->alltestIds;
	}

}
?>