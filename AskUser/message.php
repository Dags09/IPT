<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error in querying database");

// if user query matched to database query we'll show the reply otherwise it goes to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching reply from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing reply to a variable which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry, I can't understand you, i am just simple chatbot!";
}

// close the database connection
mysqli_close($conn);
?>
