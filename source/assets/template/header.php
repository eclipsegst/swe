<?php 
	if(!isset($_SERVER['HTTPS'])) {
        $redir = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: $redir");
    }
?>
<li><a href="<?php echo base_url();?>login/do_logout/" target="_blank">Logout</a></li>