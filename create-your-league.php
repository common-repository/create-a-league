<?php
/*
Plugin Name: Create Your League
Plugin URI: http://www.createyourleague.com/
Version: 1.1
Author: createyourleague, http://www.risultatieclassifiche.net/
Author URI: http://www.risultatieclassifiche.net/
Description: Create Your League is a completely FREE service that allows you to publish the ranking table of your league directly to your WordPress web site.
*/

/*
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function createyourleague_get_remote_file($url)
{
   // get the host name and url path
   $parsedUrl = parse_url($url);
   $host = $parsedUrl['host'];
   if (isset($parsedUrl['path'])) {
      $path = $parsedUrl['path'];
   } else {
      // the url is pointing to the host like http://www.mysite.com
      $path = '/';
   }

   if (isset($parsedUrl['query'])) {
      $path .= '?' . $parsedUrl['query'];
   }

   if (isset($parsedUrl['port'])) {
      $port = $parsedUrl['port'];
   } else {
      // most sites use port 80
      $port = '80';
   }

   $timeout = 20;
   $response = '';

   $referer = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

   // connect to the remote server
   $fp = fsockopen($host, $port, $errno, $errstr, $timeout);

   if( !$fp ) {
      echo "Cannot retrieve $url";
   } else {
      // send the necessary headers to get the file
      fputs($fp, "GET $path HTTP/1.0\r\n" .
                 "Host: $host\r\n" .
                 "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.3) Gecko/20060426 Firefox/1.5.0.3\r\n" .
                 "Referer: $referer\r\n\r\n");

      // retrieve the response from the remote server
      while ($line = fread($fp, 4096)) {
         $response .= $line;
      }

      fclose($fp);

      // strip the headers
      $pos      = strpos($response, "\r\n\r\n");
      $response = substr($response, $pos + 4);
   }

   // return the file content
   return $response;
}

function createyourleague_context() {
    $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    $opts = array(
      'http' => array(
        'method'=>"GET",
        'header'=>"Referer: $url\r\n",
      )
    );
    return stream_context_create($opts);
}

function createyourleague_host($lang = '')
{
  $host = 'www.createyourleague.com';
  if ($lang == 'it') $host = 'www.risultatieclassifiche.net';
  return $host;
}

function createyourleague_ranking_func($atts) {
    $id = $atts['id'];
    $lang = $atts['lang'];
    $host = createyourleague_host($lang);

    return createyourleague_get_remote_file('http://' . $host . '/api/php/' . $id);
}

function createyourleague_days_func($atts) {
    $id = $atts['id'];
    $lang = $atts['lang'];
    $order = $atts['order'];
    $limit = $atts['limit'];
    $day = $atts['day'];
    $two_columns = $atts['two_columns'];
    
    $host = createyourleague_host($lang);

    return createyourleague_get_remote_file('http://' . $host . '/api/php-days/' . $id . '?order=' . urlencode($order) . '&limit=' . urlencode($limit) . '&day=' . urlencode($day) . '&two_columns=' . urlencode($two_columns));
}

function createyourleague_topscorers_func($atts) {
    $id = $atts['id'];
    $lang = $atts['lang'];
    $host = createyourleague_host($lang);

    return createyourleague_get_remote_file('http://' . $host . '/api/php-topscorers/' . $id);
}

add_shortcode('createyourleague', 'createyourleague_ranking_func');
add_shortcode('createyourleague_days', 'createyourleague_days_func');
add_shortcode('createyourleague_topscorers', 'createyourleague_topscorers_func');


