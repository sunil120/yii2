<?php

function mpr($param) {
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

function mprd($param) {
    mpr($param);
    die();
}

function mvr($param) {
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

function mvrd($param) {
    mvr($param);
    die();
}

function mjrd($param) {
    if (is_array($param)) {
        header('Content-Type: application/json');
        echo json_encode($param);
        die;
    } else {
        mprd($param);
    }
}

function setHeader($status) {

    $status_header = 'HTTP/1.1 ' . $status . ' ' . _getStatusCodeMessage($status);
    $content_type = "application/json; charset=utf-8";

    header($status_header);
    header('Content-type: ' . $content_type);
    header('X-Powered-By: ' . "DRC <drcsystems.com>");
}

function _getStatusCodeMessage($status) {
    $codes = Array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
    );
    return (isset($codes[$status])) ? $codes[$status] : '';
}

/**
 * Word Limiter
 *
 * Limits a string to X number of words.
 * @author Harsh Shah
 * @access	public
 * @param	string
 * @param	integer
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 * @created 27 Apr 2015
 */
if ( ! function_exists('word_limiter'))
{
	function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
}

// ------------------------------------------------------------------------

/**
 * Character Limiter
 *
 * Limits the string based on the character count.  Preserves complete words
 * so the character count may not be exactly as specified.
 * @author Harsh Shah
 * @access	public
 * @param	string
 * @param	integer
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 * @created 27 Apr 2015
 */
if ( ! function_exists('character_limiter'))
{
	function character_limiter($str, $n = 500, $end_char = '&#8230;')
	{
		if (strlen($str) < $n)
		{
			return $str;
		}

		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n)
		{
			return $str;
		}

		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';

			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
			}
		}
	}
}

// ------------------------------------------------------------------------
