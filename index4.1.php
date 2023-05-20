<?php
function Getter(){

require __DIR__ . '/vendor/autoload.php';



$client = new Google_Client();
$client->setApplicationName('G');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$range = 'A:D';

$spreadsheetId = '';

$response = $service->spreadsheets_values->get($spreadsheetId, $range);
return($response);

}
   
 
?>

<!doctype html>
<html lang = "en">
    <meta charset = "UTF-8">
    <meta name = "viewport"
    content ="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <div id="form">
      <form action ="laba4_2.php" method= "post">
        <label for = "Email">Email</label>
        <input type = "Email" name = "Email" required>
        <label for = "Category">Category</label>


<?php
$masq = array();
$masq[0] = 'comics';
$masq[1]='books';
$masq[2]='copybooks';
$masq[3]='notebooks';
$masq[4]='other';

 
?>
<select name = "Category" required>
   


   
    <?php foreach ($masq as $s): ?>
        <option value = <?php echo $s; ?>><?php echo $s; ?></option>
    <?php endforeach; ?>




 </select>
    <label for = "Title">Title</label>
  
    <input type = "Text" name = "Title" required>
   
    <label for = "Description">Description</label>
    <textarea rows = "3" name = "Description"></textarea>

    <input type = "Submit" value = "Save">
      </form>

<div id = "table">
    <table>
        <thead>
        <th>Category</th>
        <th>Email</th>
            <th>Title</th>
            <th>Description</th>
</thead>


<?php  $errt =0; $ma = Getter();?>
<?php for($i =0; $i< count ($ma); $i++): ?>
    <?php for($j =0; $j< count ($ma[$i]); $j =$j +4): ?>
<tbody>


    <tr>
    
    
        <td><?php echo $ma[$i][$j];
        ?></td>
        <td><?php echo $ma[$i][$j+1];
        ?></td>
        <td><?php echo $ma[$i][$j+2];
        ?></td>
        <td><?php echo $ma[$i][$j+3];
        ?></td>
    <?php endfor; ?>
    <?php endfor; ?>


</tr>
</tbody>


</table>


    </div >
</body>
</html>