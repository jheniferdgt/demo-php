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
    //
    // $('#btn-submit').click(function(e){
    //     console.log( "submit btn!" );
    //     $.ajax({
    //         url: 'ajax.php',
    //         data: $("#frm-edit").serialize(),
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (rs) {
    //             console.log('iiiiiiiiiii');
    //             console.log(rs);
    //             $('#msg-cnt').html(rs.message);
    //
    //             // if (respuesta == 1) {
    //             //     alert('exito al cargar modulo');
    //             // }
    //             // else {
    //             //     alert('Error al cargar modulo');
    //             // }
    //         }
    //     });
    //     e.preventDefault();
    //     //Some code
    // });

    // $("#frm-edit").submit(function(e) {
    //     console.log( "submit ajax!" );
    //     //var frm = $(this);
    //     $.ajax({
    //         url: 'ajax.php',
    //         data: $("#frm-edit").serialize(),
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (rs) {
    //             console.log('iiiiiiiiiii');
    //             console.log(rs);
    //             $('#msg-cnt').html(rs.message);
    //
    //             // if (respuesta == 1) {
    //             //     alert('exito al cargar modulo');
    //             // }
    //             // else {
    //             //     alert('Error al cargar modulo');
    //             // }
    //         }
    //     });
    //     e.preventDefault();
    // });

});
