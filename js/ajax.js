$( document ).ready(function() {

    $(document).on('click', '#btn-submit', function(e) {
        $.ajax({
            url: 'ajax.php',
            data: $("#frm-edit").serialize(),
            type: 'post',
            dataType: 'json',
            success: function (rs) {
                $('#msg-cnt').html(rs.message);

                if (rs.status == 'ok') {
                    alert('exito al cargar modulo');
                }
                else {
                    alert('Error al cargar modulo');
                }
            }
        });
        e.preventDefault();
    });

});





$( document ).ready(function() {


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
});






