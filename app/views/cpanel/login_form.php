
<?php
    if(isset($msg)){
        echo '<span style="color:blue;font-weight:bold">'.$msg.'</span>';
    }

    ?>

<form autocomplete="off" action="<?php echo BASE_URL;?>login/login_authen" method="POST">

    <table>
        <tr>
            <td>Login</td>
            <td><input type="text" required="1" name="username"></td>
        </tr>
        <tr>
            <td>Descripttion</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="Submit" name="login" value="Insert"></td>
        </tr>
    </table>



</form>