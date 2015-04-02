<?php

if ( ! isset( $_POST['submit'] ) ) {
	die('dizastru');
}

$filename = $_FILES['file']['name'];

if ( $_FILES['file']['type'] !== 'application/zip' &&
		$_FILES['file']['type'] !== 'application/octet-stream' ) {
	die('Xejn sew :(');
}

$zip_archive = new ZipArchive();
$zip_archive->open( $filename );
$zip_archive->extractTo( wpqpi_get_wp_path() . $filename );

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