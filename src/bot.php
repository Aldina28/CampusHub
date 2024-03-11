<?php

$conn = mysqli_connect("localhost","root","","onlinebot");

if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

$query = "SELECT * FROM chatbot WHERE messages LIKE '%$user_messages%'";
$runQuery = mysqli_query($conn, $query);

if(mysqli_num_rows($runQuery) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery);
    // echo result
    echo $result['response'];
}else{
    echo "Sorry can't find your query!<br/><br/>If you can't find your query here, please fill the form: <a href='https://forms.gle/5nA5YQmZf2tf1tnf7' style='text-decoration: none; color: white'> <u>Click to add your query</u></a>";
}
}else{
    echo "connection Failed " . mysqli_connect_errno();
}
?>