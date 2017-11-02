<?php
/*
	File: as_functions/as_aaindex.php
	Description: receive redirection from index.php file and manage page requests

*/

	global $as_request_map;
	
	if (!defined('AS_BASE'))
		define('AS_BASE', dirname(empty($_SERVER['SCRIPT_FILENAME']) ? dirname(__FILE__) : $_SERVER['SCRIPT_FILENAME']).'/');
	
	//declartion of site globall constants
	define( 'AS_DEBUG', true );					//debug site is true
	define( 'AS_ACC', AS_BASE.'as_account/' );	//as_account folder
	define( 'AS_THEME', AS_BASE.'as_themes/' );	//as_themes folder
	define( 'AS_CONT', AS_BASE.'as_content/' ); //as_content folder
	define( 'AS_APP', AS_BASE.'as_apps/' );		//as_apps folder
    define( 'AS_FUNC', AS_BASE.'as_functions/' ); //as_functions folder
	define( 'AS_TARGET', '' );

	if (!file_exists(AS_BASE.'as_config.php')) as_fatal_error('The config file could not be found!');
	require_once AS_BASE.'as_config.php';

	$as_request_map=is_array(@$AS_CONST_PATH_MAP) ? $AS_CONST_PATH_MAP : array();
	
	if (isset($_POST['as']) && $_POST['as'] == 'ajax')
		require 'as_ajax.php';

	elseif (isset($_GET['as']) && $_GET['as'] == 'image')
		require 'as_image.php';

	elseif (isset($_GET['as']) && $_GET['as'] == 'blob')
		require 'as_blob.php';

	else {
	
		require AS_FUNC.'as_base.php';
		
		function as_index_set_request()
		{
			if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }

			$relativedepth = 0;

			if (isset($_GET['as_rewrite'])) { // URLs rewritten by .htaccess or Nginx
				$urlformat = AS_URL_FORMAT_NEAT;
				$as_rewrite = strtr(as_gpc_to_string($_GET['as_rewrite']), '+', ' '); // strtr required by Nginx
				$requestparts = explode('/', $as_rewrite);
				unset($_GET['as_rewrite']);

				if (!empty($_SERVER['REQUEST_URI'])) { // workaround for the fact that Apache unescapes characters while rewriting
					$origpath = $_SERVER['REQUEST_URI'];
					$_GET = array();

					$questionpos = strpos($origpath, '?');
					if (is_numeric($questionpos)) {
						$params = explode('&', substr($origpath, $questionpos+1));

						foreach ($params as $param) {
							if (preg_match('/^([^\=]*)(\=(.*))?$/', $param, $matches)) {
								$argument = strtr(urldecode($matches[1]), '.', '_'); // simulate PHP's $_GET behavior
								$_GET[$argument] = as_string_to_gpc(urldecode(@$matches[3]));
							}
						}

						$origpath = substr($origpath, 0, $questionpos);
					}

					$normalizedpath = urldecode($origpath);
					if (substr($normalizedpath, -strlen($as_rewrite)) !== $as_rewrite) {
						$keepparts = count($requestparts);
						$requestparts = explode('/', urldecode($origpath)); // new request calculated from $_SERVER['REQUEST_URI']

						// loop forwards so we capture all parts
						for ($part = 0, $max = count($requestparts); $part < $max; $part++) {
							if (is_numeric(strpos($requestparts[$part], '&')) || is_numeric(strpos($requestparts[$part], '#'))) {
								$keepparts += count($requestparts) - $part - 1; // this is how many parts remain
								break;
							}
						}

						$requestparts = array_slice($requestparts, -$keepparts); // remove any irrelevant parts from the beginning
					}
				}

				$relativedepth = count($requestparts);
			}
			elseif (isset($_GET['as'])) {
				if (strpos($_GET['as'], '/') === false) {
					$urlformat = ( empty($_SERVER['REQUEST_URI']) || strpos($_SERVER['REQUEST_URI'], '/index.html') !== false )
						? AS_URL_FORMAT_SAFEST : AS_URL_FORMAT_PARAMS;
					$requestparts = array(as_gpc_to_string($_GET['qa']));

					for ($part = 1; $part < 10; $part++) {
						if (isset($_GET['as_'.$part])) {
							$requestparts[] = as_gpc_to_string($_GET['as_'.$part]);
							unset($_GET['as_'.$part]);
						}
					}
				}
				else {
					$urlformat = AS_URL_FORMAT_PARAM;
					$requestparts = explode('/', as_gpc_to_string($_GET['qa']));
				}

				unset($_GET['qa']);
			}
			else {
				$phpselfunescaped = strtr($_SERVER['PHP_SELF'], '+', ' '); // seems necessary, and plus does not work with this scheme
				$indexpath = '/index.php/';
				$indexpos = strpos($phpselfunescaped, $indexpath);

				if (is_numeric($indexpos)) {
					$urlformat = AS_URL_FORMAT_INDEX;
					$requestparts = explode('/', substr($phpselfunescaped, $indexpos + strlen($indexpath)));
					$relativedepth = 1 + count($requestparts);
				}
				else {
					$urlformat = null; // at home page so can't identify path type
					$requestparts = array();
				}
			}

			foreach ($requestparts as $part => $requestpart) { // remove any blank parts
				if (!strlen($requestpart))
					unset($requestparts[$part]);
			}

			reset($requestparts);
			$key = key($requestparts);

			$requestkey = isset($requestparts[$key]) ? $requestparts[$key] : '';
			$replacement = array_search($requestkey, as_get_request_map());
			if ($replacement !== false)
				$requestparts[$key] = $replacement;

			as_set_request(
				implode('/', $requestparts),
				($relativedepth > 1 ? str_repeat('../', $relativedepth - 1) : './'),
				$urlformat
			);
		}

		as_index_set_request();
		
		require 'as_aapage.php';		

	}
	
?>
	