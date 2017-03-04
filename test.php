<?php
function staticInMethod()
{
    if(!isset($count))
        static $count=0;
    $count=$count+1;
     return $count++;

}

echo staticInMethod()."<br/>";
echo staticInMethod()."<br/>";

$str = 'one,two,three,four';

// 零 limit
print_r(explode(',',$str,0));
echo "<br/>";

// 正的 limit
print_r(explode(',',$str,2));
echo "<br/>";

// 负的 limit
print_r(explode(',',$str,-1));
echo "<br/>";

echo "hello world";
echo "<br/>";

$a=array("a"=>"aa");
$a["b"]="bb";
print_r($a);

echo "</br>";

/*
 * Array ( [0] => one,two,three,four )
Array ( [0] => one [1] => two,three,four )
Array ( [0] => one [1] => two [2] => three )
hello world
 */

$partten="/((page\/\d*)\1+)/";
$replace="page/11";
$url="sdfksdfjpage/111/page/223";

echo preg_replace($partten,$replace,$url);
echo "<br/>";
echo strpos($url,"page");


echo "<br/>";
echo substr_replace($url,$replace,strpos($url,"page"));
echo "<br/>";

$str="aaakkkbbbddabcabc";

function test($match)
{
    print_r($match);
    echo "<br/>";
    return $match[1];
}

echo preg_replace_callback("/(.)(\\1)+/","test",$str);

echo "</br>------<br/>";

$input = "plain [indent] deep [indent] deeper [/indent] deep [/indent] plain";

function parseTagsRecursive($input)
{

    $regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#';

    if (is_array($input)) {
        $input = '<div style="margin-left: 10px">'.$input[1].'</div>';
    }

    return preg_replace_callback($regex, 'parseTagsRecursive', $input);
}

$output = parseTagsRecursive($input);

echo $output;


echo "</br>------<br/>";
$text = "April fools day is 04/01/2002\n";
$text.= "Last christmas was 12/24/2001\n";
// the callback function
function next_year($matches)
{
  // as usual: $matches[0] is the complete match
  // $matches[1] the match for the first subpattern
  // enclosed in '(...)' and so on
    print_r($matches);
  return $matches[1].($matches[2]+1);
}
echo preg_replace_callback(
            "|(\d{2}/\d{2}/)(\d{4})|",
            "next_year",
            $text);
