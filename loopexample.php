<html>
<body>
    <?php
        $count = 0;
        /*while ($count < 10){
            echo "<p>my number in the loop is: ".$count."<br></br>";
            $count++;
        }
        */
        
        /*do {
            echo "<p>my number in the loop is: ".$count."<br></br>";
            $count++;
        }
        while($count <= 10);*/
        
        /*for($newcount = 0; $newcount < 10; $newcount++){
            echo "<p>my number in the loop is: ".$newcount."<br></br>";
        }*/

$d = array("zero", "one", "two", "cat", "dog");
foreach($d as $value){
    echo "<p>My value in the loop is:  ".$value."<br></br></p>";
}

    ?>
</body>
</html>
