<html>
<?PHP
require_once "check.php";
$show_form=true;
if(isset($_POST['Submit']))
{
    $validator = new check();
    $validator->addValidation("Name","req","Please fill in Name");
    $validator->addValidation("Email","email",
"The input for Email should be a valid email value");
    $validator->addValidation("Email","req","Please fill in Email");
    if($validator->ValidateForm())
    {
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";
 
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
          echo "<p>$inpname : $inp_err</p>\n";
        }
    }
}
 
if(true == $show_form)
{
?>
<form name='test' method='POST' action='' accept-charset='UTF-8'>
Name: <input type='text' name='Name' size='20'>
Email: <input type='text' name='Email' size='20'>
<input type='submit' name='Submit' value='Submit'>
</form>
<?PHP
}//true == $show_form
?>
</html>