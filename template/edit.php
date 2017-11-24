<form method="post">
    <hr/>
    <h3>Edit</h3>


    <?php if ( isset($_POST['update'] ) ): ?>
        <div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action. </div>
    <?php endif;?>
    <input type="hidden" name="action" value="edit" />
    <input type="hidden" name="id" value="<?php echo (int)$_GET['id']; ?>" />
    <label for="address short">address short :</label><br>
    <input type="text" name="address_short" maxlength="100" value="<?php echo $data['address_short']; ?>" >
    <br/><br/>
    <label for="address large">address large:</label><br>
    <input type="text" name="address_large" maxlength="100" value="<?php echo $data['address_large']; ?>" >
    <br/><br/>
    <label for="address large">Price:</label><br>
    <input type="text" name="price" maxlength="100" value="<?php echo $data['price']; ?>" >
    <br/><br/>
    <input type="submit" name="update" value="actualizar">

    <div align="center">
        <input type="button"  class="btn btn-info" value="return"  name="Back" onclick="history.back()" />
    </div>


</form>

