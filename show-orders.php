<?php 
/**********************************************
 *       order-form.php
 *       Visar ett beställningsformulär
 *  
 **********************************************/

require_once 'header.php';
require_once 'db.php';


$sql = "SELECT
    O.id AS Ordernummer,
    O.date AS Orderdatum,
    C.name AS Kund,
    F.title AS Filmtitel
FROM
    films AS F,
    customers AS C,
    orders AS O
WHERE
    F.id = O.film
AND C.id = O.customer";

    $stmt = $db->prepare($sql);
    $stmt->execute();

echo "<table class='table'>";
echo "<tr>
        <th>Ordernummer</th>
        <th>Orderdatum</th>
        <th>Kund</th>
        <th>Filmtitel</th>
    </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
$Ordernummer = htmlspecialchars( $row['Ordernummer']);
$Orderdatum = htmlspecialchars( $row['Orderdatum']);
$Kund = htmlspecialchars( $row['Kund']);
$Filmtitel = htmlspecialchars( $row['Filmtitel']);

echo "<tr>
        <td>$Ordernummer</td><td>$Orderdatum</td><td>$Kund</td><td>$Filmtitel</td>
    </tr>";
endwhile;
echo '</table>';

require_once 'footer.php';