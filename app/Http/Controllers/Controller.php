<?php

namespace App\Http\Controllers;

use DOMDocument;
use DOMXPath;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Metatags;
use OpenGraph;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function getMetaTags($str)
    {
        $pattern = '
  ~<\s*meta\s

  # using lookahead to capture type to $1
    (?=[^>]*?
    \b(?:name|property|http-equiv)\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  )

  # capture content to $2
  [^>]*?\bcontent\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  [^>]*>

  ~ix';

        if(preg_match_all($pattern, $str, $out))
            return array_combine($out[1], $out[2]);
        return array();
    }


    public function getMetaTag()
    {

//        return $this->getMetaTags("https://google.com");
//
//        $data = OpenGraph::fetch("https://www.example.com");
//return $data;


        $metadata = \Metatags::get("https://example.com/");
        return $metadata;

        $html=$this->file_get_contents_curl("https://google.com");

        libxml_use_internal_errors(true); // Yeah if you are so worried about using @ with warnings
        $doc = new DomDocument();
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        $query = '//*/meta[starts-with(@property, \'og:\')]';
        $metas = $xpath->query($query);
        $rmetas = array();
        foreach ($metas as $meta) {
            $property = $meta->getAttribute('property');
            $content = $meta->getAttribute('content');
            $rmetas[$property] = $content;
        }
return $rmetas;









        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');
        //get and display what you need:
        $title = $nodes->item(0)->nodeValue;

        $metas = $doc->getElementsByTagName('meta');
        for ($i = 0; $i < $metas->length; $i++)
        {
            $meta = $metas->item($i);
            if($meta->getAttribute('name') == 'description')
                $description = $meta->getAttribute('content');
            if($meta->getAttribute('name') == 'keywords')
                $keywords = $meta->getAttribute('content');
        }

        return ['title'=>$title,'description'=>$description??'','keywords'=>$keywords??''];
    }

    function file_get_contents_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
