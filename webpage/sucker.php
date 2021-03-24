<?php
if(!isset($_POST['name']) || $_POST['name']==''){
    header('Location: sorry.php');
    exit();
}
else if(!isset($_POST['section']) || $_POST['section']==''){
    header('Location: sorry.php');
    exit();
}
else if(!isset($_POST['creditNumber']) || $_POST['creditType']==''){
    header('Location: sorry.php');
    exit();
}
else if(!isset($_POST['creditType'])){
    header('Location: sorry.php');
    exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
$suckers = fopen('suckers.txt','a+');
$sucker = $_POST['name'].';'.$_POST['section'].';'.$_POST['creditNumber'].';'.$_POST['creditType']."\n";
fwrite($suckers,$sucker);
fclose($suckers);
?>

<h1>Thanks, sucker!</h1>

<h2>Your information has been recorded!</h2>
<dl>
    <dt>Name</dt>
    <dd>
        <?=$_POST['name'];?>
    </dd>

    <dt>Section</dt>
    <dd>
        <?=$_POST['section'];?>
    </dd>

    <dt>Credit Card</dt>
    <dd>
        <?=$_POST['creditNumber']?> (<?=$_POST['creditType']?>)
    </dd>
</dl>
<div>
    <pre>
        <?php $suckers = fopen('suckers.txt','r');
        $number = 0;
        while(!feof($suckers)) {
            $number++;
            echo (string)$number .'. '. fgets($suckers)?>
        <?php }
        fclose($suckers);?>
    </pre>
</div>
</body>
</html>