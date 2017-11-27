

<form id="frm-edit" method="post">
    <hr/>
    <h3>Edit</h3>
    <div align="right">
        <input type="button"  class="btn btn-info" value="return"  name="Back" onclick="history.back()" />
    </div>
    <div id="msg-cnt"></div>
    <div   align="center" >

        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="update" value="yes" />
        <input type="hidden" name="id" value="<?php echo (int)$_GET['id']; ?>" />
        <label for="address short">address short :</label><br>
        <input type="text" name="address_short" id="address_short" maxlength="100" value="<?php echo $data['address_short']; ?>" >
        <br/><br/>
        <label for="address large">address large:</label><br>
        <input type="text" name="address_large" id="address_large" maxlength="100" value="<?php echo $data['address_large']; ?>" >
        <br/><br/>
        <label for="address large">Price:</label><br>
        <input type="text" name="price"  id="price" maxlength="100" value="<?php echo $data['price']; ?>" >
        <br/><br/>
        <input id="btn-submit" type="submit" name="submit" value="actualizar">
        </div>
</form>


