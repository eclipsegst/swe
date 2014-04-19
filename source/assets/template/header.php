<head>
<?php 
	if(!isset($_SERVER['HTTPS'])) {
        $redir = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: $redir");
    }
?>

<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
text-align:center;
}
</style>

</head>
<li><a href="<?php echo base_url();?>login/do_logout/" target="_blank">Logout</a></li>
