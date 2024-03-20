<?php
function getComment(){
    global $connection
    $statement=$connection->prepare("select * from comment")

}

?>