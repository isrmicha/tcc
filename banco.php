<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1610470400068";
class Tcc
{
    public $id;
    public $autor;
    public $tema;
    public $link;
    public $dataAtualizacao;
}
// Create connection
if(isset($_GET['login'])){
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
$sql = "SELECT * FROM users WHERE email='$email' and senha='$senha' limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo 'true';
} else {
   echo 'false';
}
$conn->close();
}



    if(isset($_GET['create'])){
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
        $autor = $_GET['autor'];
        $tema = $_GET['tema'];
        $link = $_GET['link'];
        $sql = "INSERT INTO tccs (autor,tema,link) VALUES ('$autor','$tema','$link') ";
        if ($conn->query($sql) === TRUE) {
            echo "true";
        } else {
          echo "false";
        }
        $conn->close();
        }

        if(isset($_GET['read'])){
            $conn = new mysqli($servername, $username, $password,$dbname);
            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
            $sql = "SELECT * FROM tccs";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $resultados = array();
                while($row = $result->fetch_assoc()) {
                    $resultadoTemp = new Tcc();
                    $resultadoTemp->id = $row["id"];
                    $resultadoTemp->autor = $row["autor"];
                    $resultadoTemp->tema = $row["tema"];
                    $resultadoTemp->link = $row["link"];
                    $resultadoTemp->dataAtualizacao = $row["dataAtualizacao"];
                    array_push($resultados,$resultadoTemp);
                }
                echo json_encode($resultados);
            } else {
               echo "0 resultados";
            }
            $conn->close();
            }

        if(isset($_GET['update'])){
            $conn = new mysqli($servername, $username, $password,$dbname);
            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
            $id = $_GET["id"];
            $autor = $_GET['autor'];
            $tema = $_GET['tema'];
            $link = $_GET['link'];
            $sql = "UPDATE tccs SET autor='$autor',tema ='$tema', link='$link' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "true";
            } else {
              echo "false";
            }
            $conn->close();
            }

            if(isset($_GET['delete'])){
                $conn = new mysqli($servername, $username, $password,$dbname);
                if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
                $id = $_GET["id"];
                $sql = "DELETE FROM tccs WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "true";
                } else {
                  echo "false";
                }
                $conn->close();
                }

    
   


?>