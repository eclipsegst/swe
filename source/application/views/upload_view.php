
<?php include './assets/template/header_student.php'; ?>
<title>Upload Form</title>
<script>
document.getElementById('confirm').addEventListener('change', checkFile, false);
approveletter.addEventListener('change', checkFile, false);

function checkFile(e) {

    var file_list = e.target.files;

    for (var i = 0, file; file = file_list[i]; i++) {
        var sFileName = file.name;
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file.size;
        var iConvert = (file.size / 10485760).toFixed(2);

        if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
            txt = "File type : " + sFileExtension + "\n\n";
            txt += "Size: " + iConvert + " MB \n\n";
            txt += "Please make sure your file is in pdf or doc format and less than 10 MB.\n\n";
            alert(txt);
        }
    }
}
</script>
</head>
<body>

<?php echo form_open_multipart('upload/do_upload?courseid='. $courseid.'&aname='.$aname);?>
<h1>Submit an Assignment</h1> 
<hr>
<div>
    <h3>1. Assignment Information</h3>
    Name:<br />
    Due Date: </br>
    Points Possible: </br>
</div>
<div>
    <h3>2. Assignment Submission</h3>
    Attach File: <input type="file" name="userfile" size="20" id="confirm" value="Browse My Computer" />

</div>
<div>
    <h3>3. Add Comments</h3>
        <textarea rows="10" cols="70" name="description" form="newpageform" placeholder="Enter content here..."></textarea>
</div>
<div>
    <input type="submit" name = "submit" value="Submit" size = "20"/> | <a href="">Cancel</a></td>
</div>

</form>

<?php include './assets/template/footer_student.php'; ?>