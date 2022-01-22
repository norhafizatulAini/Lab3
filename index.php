<?php
include_once("dbconnect.php");
$sqlquery = "SELECT * FROM tbl_agent ORDER BY name ASC";

if ($_GET['submit'] == "search"){
    $search = $_GET['search'];
    $sqlquery = "SELECT * FROM tbl_agent WHERE name LIKE '%$search%'";
}
else
{
$sqlquery = "SELECT * FROM tbl_agent";
}

$results_per_page = 10;
    if (isset($_GET['pageno'])) {
        $pageno = (int)$_GET['pageno'];

        $page_first_result = ($pageno - 1) * $results_per_page;
    } else {
        $pageno = 1;
        $page_first_result = ($pageno - 1) * $results_per_page;
    }

    $stmt = $conn->prepare($sqlquery);
    $stmt->execute();
    $number_of_result = $stmt->rowCount();
    $number_of_page = ceil($number_of_result / $results_per_page);

    $sqlquery = $sqlquery . " LIMIT $page_first_result , $results_per_page";
    $stmt = $conn->prepare($sqlquery);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();


function subString($str)
{
    if (strlen($str) > 15)
    {
        return $substr = substr($str, 0, 15) . '...';
    }
    else
    {
        return $str;
    }
}
?>

<!DOCTYPE html>
<html>
<title>NIMS CHOCO TUB</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>

<body>
    <!-- Top menu -->
    <div class="w3-header w3-container w3-padding-64 w3-center w3-brown">
        <h1 style="font-size:calc(10px + 4vw);">NIMS CHOCO TUB</h1>
        <p style="font-size:calc(8px + 1vw);">"Nims Only The Best"</p>
    </div>
    <div class="w3-container w3-center w3-xlarge"><p><b>Nims Choco Tub Agent List</b> </p></div>
    <div class="w3-container w3-card w3-padding w3-row w3-round" style="width:100%">
        <form class="w3-container" action="index.php" method="get">
            <div class="w3-twothird"><input class="w3-input w3-border w3-round w3-center" placeholder = "Enter your search term here" type="text" name="search"></div>
            <div class="w3-third"><input class="w3-input w3-border w3-brown w3-round" type="submit" name="submit" value="search"><br></b></div>
        </form>
    </div>

    <div class="w3-grid-template">
         <?php
         foreach ($rows as $agent){
            $name = $agent["name"];
            $email = $agent["email"];
            $phone = $agent["phone"];
            $address = $agent["address"];

            echo "<div class='w3-center w3-padding'>";
            echo "<div class='w3-card-4 w3-brown'>";
            echo "<header class='w3-container w3-khaki'>";
            echo "<h5><b>$name</b></h5>";
            echo "</header>";
            echo "<img class='w3-image' src=../../Lab2/img/$phone.jpg" . " onerror=this.onerror=null;this.src='../../Lab2/img/image.png'" . " style='width:100%;height:250px'>";
            echo "<div class='w3-container w3-justify'><hr>";
            echo "<p>Email:<i style='font-size:16px'></i>&nbsp&nbsp$email<br> 
            Phone:<i style='font-size:16px'></i>&nbsp&nbsp$phone<br>
            Address:<i style='font-size:16px'></i>&nbsp&nbsp$address</p><hr>";
    
                echo "</div>";
                echo "</div>";
                echo "</div>";
         }  
         ?>
        
    </div>
    
    <?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + $results_per_page;
    } else {
        $num = $pageno * $results_per_page - 9;
    }
    echo "<div class='w3-container w3-row'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "index.php?pageno=' . $page . '" style=
        "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>

<button onclick="topFunction()" id="myBtn" title="Go to top"class="fa fa-angle-double-up" style="font-size:36px"></button>
    <style>
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: white;
        color: black;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }
    
    #myBtn:hover {
        background-color: #555;
    }
    </style>
    <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }

   
    </script>

    <footer class="w3-row-padding w3-padding-32">
        <hr></hr>
        <p class="w3-center">Nism Crispy Choco Tub &copy;</p>
    </footer>

</body>
</html>