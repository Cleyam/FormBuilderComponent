<?php   
spl_autoload_register(function ($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once 'vendor' . DIRECTORY_SEPARATOR . $file . '.php';
});
use formBuilder\Form;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Form Builder</title>
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
<?php 
$testGroup = ['1'=>'test1','2'=>'test2','3'=>'test3'];
$select = [1,2,3,4,5,6,7,8,9,10,11,12];


$newForm = new Form('test','POST');


echo $newForm->formStart()->label('Name','Name')->input('Name', 'text')->label('Surname','Surname')->input('Surname', 'text')->label('Email','Email')->input('Email', 'email')->label('Password','Password')->input('Password', 'password')->select('Choice', $select)->textarea('Message')->checkbox('check','check', 'Check-me !')->radio('testRadio', $testGroup)->groupCheckbox($testGroup)->submitButton('Submit')->formEnd();


?>
    <script src="libs/js/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>