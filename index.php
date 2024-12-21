<!DOCTYPE html>
<html>
<head>
    <title>Sign Up User</title>
</head>
<body>
    <h1><strong>CADASTRO USUARIO</strong></h1> 
    <form action='dados.php' name='form' method ='POST'>
        <label for="user">User Name</label><br>
        <input type="text" name="name" value="<?php echo $user?>" id="user"><br>

        <label for="email">E-mail</label><br>
        <input type="text" name="email" value="" id="email"><br>

        <label for="pwd">Password</label><br>
        <input type="password" name="pwd" value="" id="pwd"><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>


