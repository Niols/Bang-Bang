<?php

const CFG_DIR = 'cfg/';
const LIB_DIR = 'lib/';
const TPL_DIR = 'tpl/';

include LIB_DIR . 'config.class.php';
include LIB_DIR . 'bang.class.php';

Config::init();
Bang::init();

if (isset ($_GET['search'])) {
    $search = urldecode($_GET['search']);
    
    list($key, $search_clean) = Bang::cut ($search);

    if (! $url = Bang::resolve ($key)) {
	$url = Bang::resolve ('default');
	$search_clean = $search;
    }
    
    $url = str_replace ('{searchTerms}', urlencode ($search_clean), $url);

    header('Location: ' . $url);
    exit();
}

else if (isset ($_GET['opensearch'])) {
    include TPL_DIR . 'opensearch.php';
}

else {
    include TPL_DIR . 'startpage.php';
}
