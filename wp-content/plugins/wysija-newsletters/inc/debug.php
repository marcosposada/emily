<?php

global $wysija_queries;
$wysija_queries=array();

include_once('dBug.php');
function dbg($mixed,$exit=true){
    if(!function_exists('is_user_logged_in')) include(ABSPATH.'wp-includes'.DS.'pluggable.php');
    if(is_user_logged_in() || isset($_GET['dbg'])){
        new dBug ( $mixed );
        if($exit) {
            global $wysija_msg,$wysija_queries;
            echo '<h2>WYSIJA MSG</h2>';
            echo '<pre>';
            dbg($wysija_msg,0);
            echo '</pre>';

            echo '<h2>WYSIJA QUERIES</h2>';
            echo '<pre>';
            dbg($wysija_queries,0);
            echo '</pre>';
            exit;
        }
    }
}
$debugok=false;
$pageisconfig=false;
//dbg(WYSIJA_DBG);
if(isset($_REQUEST['page']) && $_REQUEST['page']=='wysija_config') $pageisconfig=true;
if(WYSIJA_DBG==3){
    if(WYSIJA_ITF && !$pageisconfig){
        $debugok=true;
    }
}
if(WYSIJA_DBG==4 && !$pageisconfig){
    $debugok=true;
}

if($debugok || WYSIJA_DBG==99){
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}


function wysija_queries(){
    if(((is_admin() && (defined('WYSIJA_ITF') && WYSIJA_ITF)) || isset($_GET['dbg'])) ){
        global $wpdb,$wysija_queries;
        echo '<div class="wysija-footer"><h2>WYSIJA QUERIES</h2>';
        echo '<pre>';
        dbg($wysija_queries,0);
        echo '</pre>';


        /*echo "<h2>WYSIJA QUEUE</h2>";
        $modelQ=&WYSIJA::get('queue','model');
        $wysija_queue=$modelQ->getReady();
        echo "<pre>";
        print_r($wysija_queue);
        echo "</pre>";*/

        echo '</div>';
    }
}

if(defined('WP_ADMIN')){
    add_action('admin_footer','wysija_queries');
}else{
   add_action('get_footer','wysija_queries');
}

