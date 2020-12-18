function merge_sort($array) {
    if(count($array) == 1 ) return $array;
	
    $middle = count($array) / 2;
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);
	
    $left = merge_sort($left);
    $right = merge_sort($right);
	
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
	
    while (count($left) > 0 && count($right) > 0) {
        if($left[0] > $right[0]) {
            $result[] = $right[0];
            $right = array_slice($right , 1);
        } else {
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
	
    while (count($left) > 0) {
        $result[] = $left[0];
        $left = array_slice($left, 1);
    }
	
    while (count($right) > 0) {
        $result[] = $right[0];
        $right = array_slice($right, 1);
    }
	
    return $result;
}

$array = [3, 7, 4, 4, 6, 5, 8];
echo implode(', ', merge_sort($array));
