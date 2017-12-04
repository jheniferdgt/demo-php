$( document ).ready(function() {
// add new item and save edit item
    $(document).on('click', '#btn-submit', function(e) {
        console.log("ok");
        $.ajax({
            url: 'ajax.php',
            data: $("#frm").serialize(),
            type: 'post',
            dataType: 'json',
            success: function (rs) {
                $('#msg-cnt').html(rs.message);
                if (rs.status == 'ok') {
                    window.location.href = 'http://localhost/demo-php/index.php';
                }
                else {
                    alert('Error al cargar modulo');
                }
            }
        });
        e.preventDefault();
        return false;
    });

    // edit
    $(document).on('click', '.btn-edit', function(e) {
        var obj = $(this);
        var code = obj.data('code');
        $('#exampleModal h1').html('Edit item');
        $.ajax({
            url: 'ajax.php',
            data: {code:code, action: 'search-by-id'},
            type: 'post',
            dataType: 'json',
            success: function (response) {
                if(response.sysid > 0){
                    $('#action').val('edit');
                    $('#address_short').val(response.address_short);
                    $('#address_large').val(response.address_large);
                    $('#price').val(response.price);
                    $('#id').val(response.sysid);
                }

            }
        });
        e.preventDefault();
        return false;
    });

    // add open form
    $(document).on('click', '#btn-add', function(e) {
        $('#exampleModal h1').html('Add New item');
        $('#action').val('add');
        $('#address_short').val('');
        $('#address_large').val('');
        $('#price').val('');
        $('#id').val('');

        e.preventDefault();
        return false;
    });

    $(document).on('click', '.btn-delete', function(e) {
        var obj = $(this);
        var code = obj.data('code');
        var location="demo-php/index.php";
        $.ajax({
            url: 'ajax.php',
            data: {action:'delete', code:code},
            type: 'post',
            dataType: 'json',
            success: function (rs) {
                $('#msg-cnt').html(rs.message);

                if (rs.status == 'ok') {
                    alert('se elimino correctamente');
                    window.location.href = 'http://localhost/demo-php/index.php';

                }
                else {
                    alert('Error al eliminar');
                }
            }
        });
        // return false;
        e.preventDefault();

    });








    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.


        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });



});




