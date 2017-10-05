<?php

function t($data, $exit = FALSE) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if ($exit) {
        die();
    }
}

function btn_add($uri, $text, $class = 'glyphicon glyphicon-plus') {
    echo anchor($uri, '<i class="' . $class . '"></i> ' . $text);
}

function btn_edit($uri, $class = 'glyphicon glyphicon-edit') {
    echo anchor($uri, '<i class="' . $class . '"></i>');
}

function btn_manage($uri, $class = 'glyphicon glyphicon-random') {
    echo anchor($uri, '<i class="' . $class . '"></i>');
}

function btn_delete($uri, $class = 'glyphicon glyphicon-trash') {
    return anchor($uri, '<i class="' . $class . '"></i>',
            array('onClick' => "return confirm('You are about to delete a record');"));
}

// escap html entity
function e($str) {
    return htmlentities($str);
}

function limit_to_numwords($string, $numwords) {
    $except = explode(' ', $string, $numwords + 1);
    if (count($except) >= $numwords) {
        array_pop($except);
    }
    $except = implode(' ', $except);
    return $except;
}



function is_logged_in() {
    $CI = &get_instance();
    return (bool) $CI->admin_model->loggedin();
}



function get_uri() {
    $CI = &get_instance();
    $uri = '';
    if ($CI->uri->segment(1)) {
        $uri = $CI->uri->segment(1);
        if ($CI->uri->segment(2))
            $uri = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        return $uri;
    }
}



function camelCase($str, array $noStrip = []) {
    // non-alpha and non-numeric characters become spaces
    $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
    $str = trim($str);
    // uppercase the first character of each word
    $str = ucwords($str);
    return $str;
}

/* * ******** Implemented for Session *********** */
/* * ***** Double Dimentation Array Search ***** */
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}






/**
 * Initialize Pagination In Codeigniter with Bootstrap
 * @param  int $total_rows    Total Number of Record
 * @param  int $no_of_records Create Pagination Link with $no_of_records 
 * @param  String $url        Return URL
 * @author Edited By Dipanjan Ghosh
 */
function pagination($total_rows, $no_of_records, $url) {
    $CI = &get_instance();
    $config['base_url'] = $url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $no_of_records;
    $config['use_page_numbers'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'page';

    $config['full_tag_open'] = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['first_link'] = FALSE;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = FALSE;
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $CI->pagination->initialize($config);
}




/**
 * Pagination in CI with Bootstrap Style
 * @return String The whole pagination links
 */
function pagination_links() {
    $CI = &get_instance();
    return $CI->pagination->create_links();
}







