<?php
$url = "https://api.themoviedb.org/3/movie/popular?api_key=32c132954248af768765a56aa700e711&language=en-US&page=1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result = curl_exec($ch);
curl_close($ch);


$res = json_decode($result, true);

$img_url = "https://image.tmdb.org/t/p/w500";

?>
<html>
    <head>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            th {
            border: 1px solid #dddddd;
            background-color: #FF8C00;
            text-align: center;
            padding: 8px;
            }

            td {
            border :1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>
                    Id Movie
                </th>
                <th>
                    Movie Name
                </th>
                <th>
                    Overview
                </th>
                <th>
                    Image
                </th>
            </tr>
        <?php
        foreach($res["results"] as $r) {
        ?>
            <tr>
                <td>
                    <?=$r["id"]?>
                </td>
                <td>
                    <?=$r["original_title"]?>
                </td>
                <td>
                    <?=$r["overview"]?>
                </td>
                <td>
                    <img src="<?=$img_url . $r["poster_path"]?>">
                    </img>
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
    </body>
</html>