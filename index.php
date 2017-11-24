<?php require 'controller.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Paginar Resultados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
<div id="content">
<?php
switch ($action ){
    case 'edit':
        $data = $dm->edit($code);
        require_once 'template/edit.php';
        break;
    case 'add':
        $data = $dm->add();
        require_once 'template/add.php';
        break;
    case 'delete':
        $data = $dm->delete($code);


    default:
        $data = $dm->listing();
        require_once 'template/listing.php';
        break;
}
?>
</div>
</body>
</html>