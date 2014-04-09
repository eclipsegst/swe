<?php

class Collect extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('collect_view', array('error' => ' ' ));
	}

	function download()
	{

		$this->load->helper('file');
		// $data['names'] = get_filenames('upload');
		// $data = array
		// (
		//   [0] => /home/content/html/assets/testimonials/cccs_1.jpg
		//   [1] => /home/content/html/assets/testimonials/chepakho_1.jpg
		//   [2] => /home/content/html/assets/elliott.jpg
		//   [3] => /home/content/html/assets/jgashi.pdf
		// )

		// $data = array(
  //              [0] => 'My Title',
  //              [1] => 'My Heading',
  //              [2] => 'My Message'
  //         );
		// $dir = "./uploads";
		// $string = read_file('./uploads/lb5_zztg2.c');
		// if(empty($string)){
		// 	echo "cannot read file.";
		// }
		// else{
		// 	echo "read file successfully.";
		// }
		// if (is_dir($dir)) {
  //   		if ($dh = opendir($dir)) 
  //   		{
  //   			closedir($dh);
  //   		}
		// }
		// else
		// {
		// 	// echo "The path cannot be found.";
		// 	$fc_path = FCPATH.SELF;
		// 	echo $fc_path;
		// }

		$this->load->library('zip');

		// $name = 'mydata1.txt';
		// $data = 'A Data String!';

		// $this->zip->add_data($name, $data);

		// // Write the zip file to a folder on your server. Name it "my_backup.zip"
		// $this->zip->archive('./uploads/my_backup.zip'); 
		// mkdir('./uploads/newfolder/', 0777, TRUE);
		$path = './p/';
		$labname = "CS4320"; // pass lab or assignment name
		$lab = $labname."."."zip";// be sure use double quotes
		$this->zip->read_dir($path);
		// Download the file to your desktop. Name it "lab6.zip"
		$this->zip->download($lab);//

		// $data = file_get_contents("./uploads/lb5_zztg2.c"); // Read the file's contents
		// if(empty($data)){
		// 	echo "empty!";
		// }else{
		// 	$name = 'lb5_zztg2.c';
		// 	force_download($name, $data);
		// 	echo "force_downloading";
		// }
				// $this->load->view('files_list', $data);
	}
}
?>
