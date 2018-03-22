<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Session.php");
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
	

Class Admin{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}
								
	//customer login
	public function adminLogin($data){
		$uname = $data['uname'];
		$pass = $data['pass'];
		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);
		$pass = $this->fm->validation($data['pass']);
	    $pass = mysqli_real_escape_string($this->db->link, $pass);
	    $pass = md5($pass);

	    //check empty
	    if (empty($uname) or empty($pass))
		{
			$msg = "Fields must not be empty !";
			return $msg;
		}else{
			//admin login access
			$sql = "SELECT * FROM tbl_user WHERE email='$uname' AND password='$pass'";
			$result = $this->db->select($sql);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("adminLogin",true);
				Session::set("username",$uname);
				Session::set("userid",$value['id']);
				Session::set("name",$value['name']);
				header("Location: index.php");
			}else{
				$msg = "Username or password not matched !";
				return $msg;
			}
		}
	}


	public function getAdmin(){
		$sql = "SELECT * FROM tbl_user WHERE id=1 ";
		$result = $this->db->select($sql);
		return $result;
	}


	public function changePassword($data){
		$name = $data['name'];
		$email = $data['email'];
		$oldpass  = $data['oldpass'];
		$oldpass  = md5($data['oldpass']);
		$npass    = $data['newpass'];
		$newpass  = md5($data['newpass']);

		$sql = "select * from tbl_user where id=1";
		$result = $this->db->select($sql);
		
		while ($old = $result->fetch_assoc()) {
			if($old['password'] == $oldpass){

				if (!empty($npass)) {
					$sql  = "update tbl_user set name='$name', email='$email', password='$newpass' where id=1";
					$result = $this->db->update($sql);
					if ($result) {
						return true;
					
					}else{
						return false;
						}
				}else{
					$sql  = "update tbl_user set name='$name', email='$email' where id=1";
					$result = $this->db->update($sql);
					if ($result) {
						return true;
					
					}else{
						return false;
						}
				}
			}
				
		}
		
	}


//end of Admin class
	}
?>