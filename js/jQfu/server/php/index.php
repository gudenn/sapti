<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$options = array(
            //'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/files/',
            //'upload_url' => $this->get_full_url().'/files/',
            //'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => 'files',
        );
$upload_handler = new UploadHandler($options);
