<?php require 'controller.php'; ?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Paginar Resultados</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div id= "content">
 <?php
    switch ($action ){
        case 'edit':
            $data = $dm->edit($code);
             break;
        case 'add':
            $data = $dm->add();

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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div id="msg-cnt"> </div>
            </div>
            <div class="modal-body">
                <form id="frm" method="post" >
                    <input type="hidden" id="action" name="action" value="" />
                    <input type="hidden" name="id" id="id" value="" />

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">address short:</label>
                        <input type="text" class="form-control" name="address_short" id="address_short" maxlength="100" value="" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">address large: </label>
                        <input type="text" class="form-control" name="address_large" id="address_large" maxlength="100" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">price </label>
                        <input type="text" class="form-control" name="price"  id="price" maxlength="100" value=""/>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <input id="btn-submit" type="submit"  name="submit" class="btn btn-info" value="actualizar">
            </div>
        </div>
    </div>
</div>



</body>
</html>