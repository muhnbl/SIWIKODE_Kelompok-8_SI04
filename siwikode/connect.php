<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $wisata = $_POST['wisata'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $conn = new mysqli('localhost', 'root', '', 'dbsiwikode');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
    else {
        $stmt = $conn ->prepare("insert into testimoni(name, email, wisata, rating, comment)
        values( ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('s', $name, $email, $wisata, $rating, $comment);
        $stmt->execute();
        echo "Testimoni dikirim...";
        $stmt->close();
        $stmt->close();
    }
?>
