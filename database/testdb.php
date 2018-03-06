 <?php 
$link = mysql_connect('umstraininghubcom.ipagemysql.com', 'payroll_account', 'childrenscan1993'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(payroll_account); 
?> 