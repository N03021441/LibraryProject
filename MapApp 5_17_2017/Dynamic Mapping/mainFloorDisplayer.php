<?php
    include ("Admin/connect.php");

    $query = "SELECT * FROM shelflocations WHERE Map = 0 ORDER BY ShelfNo ASC";
    $result = mysqli_query($conn, $query)or die(mysqli_error());

    $list = array();
    $i = 0;
    
    while($row = mysqli_fetch_array($result)){
        $list[] = array(
            'X' => $row['X'],
            'Y' => $row['Y'],
            'Width' => $row['Width'],
            'Height' => $row['Height'],
            'ShelfNo' => $row['ShelfNo'],
            'Map' => $row['Map']
        );
        //if shelf belongs to concourse map and is not missing a value, echo a rectangle element representing the shelf
        if(!in_array("MISSING", $list[$i])) {
            //the width and height attributes are swapped because the values in the database are swapped. The values need to be
            //entered this way so the shelves display the correct way
            $string = "<rect id =\"" . $list[$i]['ShelfNo'] . "\" width=\"" . $list[$i]['Height'] . "\" height=\"" . $list[$i]['Width'] . "\" x=\"" . $list[$i]['X'] . "\" y=\"" . $list[$i]['Y'] . "\" style=\"fill:rgb(0,0,0);\"/>";
            echo($string);
        }
        $i++;
    }
?>