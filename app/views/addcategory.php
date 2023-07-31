
<?php
    if(isset($msg)){
        echo '<span style="color:blue;font-weight:bold">'.$msg.'</span>';
    }
    ?>

<form autocomplete="off" action="<?php echo BASE_URL;?>category/insertcategory" method="POST">

    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" required="1" name="title"></td>
        </tr>
        <tr>
            <td>Descripttion</td>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <td><input type="Submit" name="addcategory" value="Insert"></td>
        </tr>
    </table>



</form>