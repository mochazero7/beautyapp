<?php
//Get the base-64 string from data
$filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

//Decode the string
$unencodedData=base64_decode($filteredData);

//Save the image
file_put_contents('$_POST[id_scrapbook].png', $unencodedData);
?>
<h2>Save the image and show to user</h2>
<table>
    <tr>
        <td align="left">
            <a href="scrapbook.php">
            	Kembali</a>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <br />
            <br />
			
<?php
//Show the image
echo '<img src="'.$_POST['img_val'].'" />';
?>
        </td>
    </tr>
</table>
<style type="text/css">
body, a, span {
	font-family: Tahoma; font-size: 10pt; font-weight: bold;
}

</style>