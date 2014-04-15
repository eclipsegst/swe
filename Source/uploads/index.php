<html>
<body>

<?php 
$files = glob('./test/*.php');
usort($files, function($a, $b) {
    return filemtime($a) < filemtime($b);
});
?>

<?php
foreach($files as $file){
    printf('<tr><td><input type="checkbox" name="box[]"></td>
            <td><a href="%1$s" target="_blank">%1$s</a></td>
            <td>%2$s</td></tr><br/>', 
            $file,date('F d Y, H:i:s', filemtime($file)));
}
?>
</body>
</html>