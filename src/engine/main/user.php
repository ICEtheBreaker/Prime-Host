<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
class User {
	private $registry;

	private $user_id;
	private $email;
	private $firstname;
	private $lastname;
	private $balance;
	private $access_level;

  	public function __construct($registry) {
		$this->registry = $registry;
		if (isset($this->registry->session->data['user_id'])) {
			$query = $this->registry->db->query("SELECT * FROM users WHERE user_id = '" . (int)$this->registry->session->data['user_id'] . "' AND user_status = '1'");
			
			if ($query->num_rows) {
				$this->user_id = $query->row['user_id'];
				$this->email = $query->row['user_email'];
				$this->firstname = $query->row['user_firstname'];
				$this->lastname = $query->row['user_lastname'];
				$this->balance = $query->row['user_balance'];
				$this->access_level = $query->row['user_access_level'];
			} else {
				$this->logout();
			}
		}
  	}
		
  	public function login($email, $password) {
        $sql = "select * from users where user_email = '" . $this->registry->db->escape($email) . "' AND
        user_password = '" . $this->registry->db->escape(md5($password)) . "'
        AND user_status = '1'";

        // и в sql его метод он не отдает нужных данных пиздец
        // тут тип проверка есть ли вообще этот юзер чи не

        // так можно же просто взять с базы два значения
        //  пароль и емейл а потом сверить то что вводит юзер
        // с тем что есть в базе 

        // так вот это модуль уже написанный к этой панельки и у оригинала он работает збс
        // чё то в коде намудрено переделкиными
        // типо смари ща 

		$query = $this->registry->db->query($sql);

        // var_dump($query->num_rows);

		if($query["num_rows"]) {
			@$this->registry->session->data['user_id'] = $query->row['user_id'];
			
			@$this->user_id = $query->row['user_id'];
			@$this->email = $query->row['user_email'];
			@$this->firstname = $query->row['user_firstname'];
			@$this->lastname = $query->row['user_lastname'];
			@$this->balance = $query->row['user_balance'];
			@$this->access_level = $query->row['user_access_level'];

	  		return true;
		} else {
	  		return false;
		}
  	}

  	public function logout() {
		unset($this->registry->session->data['user_id']);
	
		$this->user_id = null;
		$this->email = null;
		$this->firstname = null;
		$this->lastname = null;
		$this->balance = null;
		$this->access_level = 0;
  	}
  
  	public function isLogged() {
		return $this->user_id;
  	}
  
  	public function getId() {
		return $this->user_id;
  	}
	
  	public function getEmail() {
		return $this->email;
  	}
	
  	public function getFirstname() {
		return $this->firstname;
  	}
	
  	public function getLastname() {
		return $this->lastname;
  	}
	
  	public function getBalance() {
		return $this->balance;
  	}
	
  	public function getAccessLevel() {
		return $this->access_level;
  	}
}
?>
