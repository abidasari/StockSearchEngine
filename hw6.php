<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stocks</title>
        <script type="application/javascript">
            function funcreset()
            {
                document.getElementById("outdiv").innerHTML = "";
                document.getElementById("searchbar").setAttribute("value", "");

            }

        </script>
        <?php
        function arrowsymbl($num)
        {
            if($num < 0)
                return "Red_Arrow_Down.png";
            else
                return "Green_Arrow_Up.png";
        }
        function formatytd($ytdval, $lastprice)
        {
            $outvar = $lastprice - $ytdval;
            $outvar = round($outvar, 2);
            if ($outvar < 0)
                return "($outvar)"."<img src = 'http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png' height='12' width='12'>";
            elseif($outvar > 0)
                return "$outvar"."<img src = 'http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png' height='12' width='12'>";
            else
                return "0";
//                return "<img src = 'Green_Arrow_Up.png' height='12' width='12'><img src = 'Red_Arrow_Down.png' height='11' width='11'>";
        }
        function domktcap($mktcap)
        {
            $out = 0;
            if($mktcap > 9999999) {
                $out = $mktcap / 1000000000;
                return round($out,2) . " B";
            }
            else {
                $out = $mktcap / 1000000;
                return round($out,2) . " M";
            }
        }
        function change($inp)
        {
            $out = round($inp, 2);
            if($inp < 0)
            {
                $img = "<img src='http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png' height='12' width='12'>";
                $out = $out . $img;
                return $out;
            }
            elseif($inp > 0)
            {
                $img = "<img src='http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png' height='12' width='12'>";
                $out = $out . $img;
                return $out;
            }
            else
            {
//                $img = "<img src='Green_Arrow_Up.png' height='11' width='11'>"."<img src='Green_Arrow_Up.png' height='11' width='11'>";
//                $out = $img;
                return "0";
            }
        }
         function changeper($inp)
        {
            $out = round($inp, 2);
            if($inp < 0)
            {
                $img = "<img src='http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png' height='12' width='12'>";
                $out = $out ."%". $img;
                return $out;
            }
            elseif($inp > 0)
            {
                $img = "<img src='http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png' height='12' width='12'>";
                $out = $out ."%". $img;
                return $out;
            }
            else
            {
//                $img = "<img src='Green_Arrow_Up.png' height='11' width='11'>"."<img src='Green_Arrow_Up.png' height='11' width='11'>";
//                $out = $img;
                return "0%";
            }
        }
        function percentytd($inp)
        {
            $outvar = round($inp,2);

            if ($outvar < 0)
                return $outvar."%<img src = 'http://cs-server.usc.edu:45678/hw/hw6/images/Red_Arrow_Down.png' height='12' width='12'>";
            elseif($outvar > 0)
                return $outvar."%<img src = 'http://cs-server.usc.edu:45678/hw/hw6/images/Green_Arrow_Up.png' height='12' width='12'>";
            else
                return 0;
//                return "<img src = 'Green_Arrow_Up.png' height='11' width='11'><img src = 'Red_Arrow_Down.png' height='11' width='11'>";
        }

        ?>
        <style>
            div.main{
                background-color: #F3F3F3;
                border-width: thin;
                border-style: solid;
                border-color: darkgray;
                text-align: center;
                width: 450px;
                height: 180px;
                margin: auto;
                margin-top: 15px;
            }
            div.test{
                margin-top: 15px;
                font-family: Arial;
                /*margin-bottom: 150px;*/
            }
            .forms{
                background-color: #F3F3F3;
                align-content: center;
                margin-left: 40px;
                margin-right: 40px;
                margin-top: 20px;
                margin-bottom: 15px;
            }
            p.header{
                text-align: center;
                padding-top: 5px;
                padding-bottom: 0;
                margin-top: 0;
                margin-bottom: 0;
                font-size: 36px;
                font-family: "Times New Roman", Times, serif;
                font-style: italic;
            }
            hr {
                width: 98%;
                border-style: solid;
                border-width: thin;
                border-color: darkgray;
                margin-top: 0;
            }
            table.tabl{
                border: 1px solid darkgray;
                border-collapse: collapse;
                text-align: left;
                background-color: #F2F2F2;
                margin: auto;
                width: 750px;

            }
            table.tabl1{
                border: 1px solid darkgray;
                border-collapse: collapse;
                text-align: center;
                background-color: #F2F2F2;
                margin: auto;
                width: 750px;
                height:26px;
            }
            table.tabl2{
                border: 1px solid darkgray;
                border-collapse: collapse;
                text-align: left;
                background-color: #F2F2F2;
                margin: auto;
                width: 750px;
            }

            th.cont{
                padding: 2px;
                height: 24px;
                border: 1px solid darkgrey;
                border-collapse: collapse;
                width: 750px;
            }
            td.cont{
                padding: 2px;
                height: 24px;
                border: 1px solid darkgrey;
                border-collapse: collapse;
                background-color: #F8F8F8;
            }
            th.cont2{
                padding: 2px;
                height: 24px;
                border: 1px solid darkgrey;
                border-collapse: collapse;
                width: 50%;
            }
            td.cont2{
                padding: 2px;
                height: 24px;
                border: 1px solid darkgrey;
                border-collapse: collapse;
                background-color: #F8F8F8;
                text-align: center;
                width: 50%;
            }
        </style>
    </head>

    <body>
    <?php
    date_default_timezone_set('America/Los_Angeles');

    if($_POST && isset($_POST["search"]))
        $searchedfor = $_POST["search"];
    elseif($_GET && isset($_GET["Xsxs"]))
        $searchedfor = $_GET["search"];
    elseif($_POST && isset($_POST["Reset"]))
        $searchedfor = "";
    else
        $searchedfor = "";

    ?>
        <div class="main">  
            <p class="header">Stock Search</p>
            <hr>
            <form class="forms" name="formstock" method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                <table>
                    <tr>
                        <td><label style="font-size: 16px">Company Name or Symbol: </label></td>
                        <td><input id="searchbar" type="text" value="<?= $searchedfor;?>" name="search" style="width:170px" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: left;"><button type="submit" id="submitButton">Search</button><button id="reset" type="reset" onclick="funcreset()" >Clear</button></td>
                    </tr>
                </table>                
            </form>
            <a href="http://www.markit.com/product/markit-on-demand" target="_blank">Powered by MarkIt on Demand</a>
        </div>
        <div id="outdiv" class="test">
            <?php
            if($_POST && isset($_POST["search"])) {
                //echo 'Content of the $_POST array: <br>';
                $url = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=" . $_POST["search"];
                $searchvar = $_POST['search'];
//                $searchedfor = $_GET["search"];
                $xml = simplexml_load_file($url);
                if($xml->count() == 0) {
//                    echo "no children";
                    echo "<table class='tabl1'>";
                    echo "<td>No records have been found.</td>";
                    echo "</table>";
                }
                else {
                    echo "<table class='tabl'>";
                    echo "<tr><th class='cont'>Name</th><th class='cont'>Symbol</th><th class='cont'>Exchange</thcla><th class='cont'>Details</th></tr>";
                    foreach ($xml->children() as $books) {
                        echo "<tr>";
                        echo "<td class='cont' style='width: 53%'>" . $books->Name . "</td>";
                        echo "<td class='cont' style='width: 15%'>" . $books->Symbol . "</td>";
                        echo "<td class='cont'>" . $books->Exchange . "</td>";
                        echo "<td class='cont' style='width: 12%'><a href = 'hw6.php?Xsxs=$books->Symbol&search=$searchvar'>More Info</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            elseif($_GET && isset($_GET["Xsxs"]))
            {
                $url2 = "http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=" . $_GET["Xsxs"];
                $jsonob = file_get_contents($url2);
                $decodedjson = json_decode($jsonob, true);
                if($decodedjson["Status"] == "SUCCESS") {
                    echo "<table class='tabl2'>";

                        echo "<tr><th class='cont2'>Name</th><td class='cont2'>".$decodedjson["Name"]."</td></tr>";
                        echo "<tr><th class='cont2'>Symbol</th><td class='cont2'>".$decodedjson["Symbol"]."</td></tr>";
                        echo "<tr><th class='cont2'>Last Price</th><td class='cont2'>".$decodedjson["LastPrice"]."</td></tr>";
                        echo "<tr><th class='cont2'>Change</th><td class='cont2'>".change($decodedjson["Change"])."</td></tr>";
                        echo "<tr><th class='cont2'>Change Percent</th><td class='cont2'>".changeper($decodedjson["ChangePercent"])."</td></tr>";
                        echo "<tr><th class='cont2'>Timestamp</th><td class='cont2'>".date('Y-m-d h:i A',strtotime($decodedjson["Timestamp"]))."</td></tr>";
                        echo "<tr><th class='cont2'>Market Cap</th><td class='cont2'>".domktcap($decodedjson["MarketCap"])."</td></tr>";
                        echo "<tr><th class='cont2'>Volume</th><td class='cont2'>".number_format($decodedjson["Volume"])."</td></tr>";
                        echo "<tr><th class='cont2'>Change YTD</th><td class='cont2'>".formatytd($decodedjson["ChangeYTD"], $decodedjson["LastPrice"])."</td></tr>";
                        echo "<tr><th class='cont2'>Change Percent YTD</th><td class='cont2'>".percentytd($decodedjson["ChangePercentYTD"])."</td></tr>";
                        echo "<tr><th class='cont2'>High</th><td class='cont2'>".$decodedjson["High"]."</td></tr>";
                        echo "<tr><th class='cont2'>Low</th><td class='cont2'>".$decodedjson["Low"]."</td></tr>";
                        echo "<tr><th class='cont2'>Open</th><td class='cont2'>".$decodedjson["Open"]."</td></tr>";

                    echo "</table>";
                }
                else {
                    echo "<table class='tabl1'><tr><td class='cont'>There is no stock information available.</td></tr></table>";
                }
            }
            ?>
        </div>
<!--        <noscript></noscript>-->
    </body>
</html>
