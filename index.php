<!DOCTYPE html>
<html>
<body>

<?PHP
 class Pipeline {
   static function make(...$functions) {
        return function($arg) use ($functions) {
            $result = $arg;

            foreach($functions as $function) {
                $result = $function($result);
            }
            return $result;
        };
    }
}
  
$pipeline = Pipeline::make(
    function($var) { return $var * 3; },
    function($var) { return $var + 1; },
    function($var) { return $var / 2; }
);

echo $pipeline(3); // zwróci 5
?>

</body>
</html>