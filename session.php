<?php
session_start();
    // print_r($_SESSION['person']);
?>
<!DOCTYPE html>
<html>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 3px solid black;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<body>
    <center><h3> Recipes Data </h3><center><br>
    <table>
        <!-- HTML Part (optional) -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>

        <?php
    for ($i = 0; $i < count($_SESSION['person']); $i+=3) {
      echo'<tr>';
            echo' <td>'. $_SESSION['person'][$i].'</td>';
            echo' <td>'. $_SESSION['person'][$i+1].'</td>';
            echo' <td>'. $_SESSION['person'][$i+2].'</td>';
        echo '</tr>';
         }?>
    </table>
    
</body>

</html>