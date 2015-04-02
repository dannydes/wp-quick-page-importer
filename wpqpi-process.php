<?php

if ( ! isset( $_POST['submit'] ) ) {
	die('dizastru');
}

if ( $_FILES['file']['type'] !== 'application/zip' &&
		$_FILES['file']['type'] !== 'application/octet-stream' ) {
	die('Xejn sew :(');
}

$zip_archive = new ZipArchive;
$res = $zip_archive->open( $_FILES['file']['tmp_name'] );
if ($res === true) {
	$filename = $_FILES['file']['name'];
	$zip_archive->extractTo( wpqpi_get_wp_path() . substr( $filename, 0, strlen( $filename ) - 4 ) );
	$zip_archive->close();
} else {
	echo 'ujj ma hadmitx :\'(';
}

//Taken from http://stackoverflow.com/questions/2354633/wordpress-root-directory-path
function wpqpi_get_wp_path() {
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname(dirname($base))."/wp-config.php"))
    {
        $path = dirname(dirname($base))."/";
    }
    else
    if (@file_exists(dirname(dirname(dirname($base)))."/wp-config.php"))
    {
        $path = dirname(dirname(dirname($base)))."/";
    }
    else
    $path = false;

    if ($path != false)
    {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}