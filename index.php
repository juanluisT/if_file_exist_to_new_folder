<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<script src="jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple>
	</form>

<script type="text/javascript">
		<?php $timestamp = time();?>
		/*$(function() {
    $('#file_upload').uploadifive({
        'checkScript'  : '/check-exists.php',
        'uploadScript' : '/uploadify.php',
        'onCheck'      : function(file, exists) {
            if (exists) {
                alert('The file ' + file.name + ' exists on the server.');
            }
        }
    });
});*/

		$(function() {
			$('#file_upload').uploadify({
				'auto'             : true,
				'method'   : 'post',
				'multi'    : true,
				//'buttonImage' : 'browse-btn.png',
				'buttonText' : 'PHOTOS...',
				//'checkScript'      : 'check-exists.php',
              //  'uploadScript'     : 'uploadify.php',
		/*'onCheck'  : function(file, exists) {if (exists) {alert('The file ' + file.name + ' exists on the server.'); }*/
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
					},
				'queueID'          : 'queue',
				'swf'      : 'uploadify.swf',
				// 'checkScript'  : 'check-exists.php',
				'uploader' : 'uploadify.php'
				/*'onUploadComplete' : function(file, data) { console.log(data); }*/
			
			});
		});
	</script>
    <style type="text/css">
    .uploadify-button {
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
    }
</style>
</body>
</html>