<?php 

function is_block($string){
    
    $block_elements = array('article', 'aside', 'blockquote', 'button', 'canvas', 'caption', 'col', 'colgroup', 
        'dd', 'div', 'dl', 'dt', 'embed', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 
        'header', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'nav', 'p', 'ol', 'ul',
    );
    
    if(is_string($string)){
        if(array_search(strtolower($string), $block_elements)){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    };
};

// Return $content wrapped in a specified HTML $tag with optional $class
function tag_wrap($tag, $content = "", $class = NULL){
    $result = (is_block($tag)) ? "\r<" : "<" ;
    $result .= $tag;
    $result .= (!empty($class)) ? ' class="'.$class.'">' : '>' ;
    $result .= $content;
    $result .= (is_block($tag)) ? "\r</$tag>\n" : "</$tag>" ;
    
    return $result;
};

function cln($str)
{
    // strip dangerous characters. Cribbed from Tom Wheeler.
    $chars = preg_quote("={}:<?(^$!>)*");
    $str = strip_tags(preg_replace("/[$chars]/", '', $str));
    return $str;
}

?>