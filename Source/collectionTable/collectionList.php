ass Collection extends CI_Controller
	{
		private $_id;
		private $_pawprint;
		private $_file;

		function __construct()
		{
			parent::__construct();
		}
		public function getId()
		{
			return $this->_id;
		}
		public function setId()
		{
			$yhid->_id= $id;
		}
		public function getPawprint()
		{
			return $this->_pawprint;
		}

		public function setPawprint($id)
		{
			$this->_pawprint = $id;
		}

		public function setFile($name)
		{
			$this->_file = $name;
		}

		public function getFile()
		{
			return $this->_file;
		}

		public function commit()
		{
			$data = array(
				'id'=> $this->_id,
				'pawprint' => $this->_pawprint,
				'file' => $this->_file,
			);

			if ($this->_id > 0) {
				if ($this->db->update('Collection', $data. array('id' => $this->_id))) {
					return true;
				}
			} else {		
				if ($this->db->insert('Collecton', $data)) {
					$this->_id = $this->db->insert_id();
					return true;
				}
			}
			return false;

		}
