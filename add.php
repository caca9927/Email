
<?php 

    
    $con = mysqli_connect("localhost", "root", "", "hmail");
    



    if(isset($_POST['submit'])){
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
        $user = $_POST['user'];
        $password = $_POST['pass'];
        $date = date("Y/m/d H:i:sa");
        $time = date("Y/m/d");

        $domain = 'itmail.com';
        $email =$user ."@". $domain;

        $mysql = "INSERT INTO `hm_accounts`
        (`accountdomainid`, `accountadminlevel`, `accountaddress`, `accountpassword`, `accountactive`, `accountisad`, `accountmaxsize`, `accountvacationmessageon`, `accountpwencryption`, `accountforwardenabled`, `accountforwardkeeporiginal`, `accountenablesignature`, `accountlastlogontime`, `accountvacationexpires`, `accountvacationexpiredate`, `accountpersonfirstname`, `accountpersonlastname`)
        VALUES ('1', '0', '$email', '$password', '1', '0', '0', '0', '3', '0','0', '0', NOW(), '0',NOW(), 'user', '1')";
        
        mysqli_query($con,$mysql);

    }

?>
