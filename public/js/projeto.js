function deleteRegistroPaginacao(rotaUrl, idRegistro) {
    if (confirm('Tem certeza que deseja excluir este registro?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id  : idRegistro
            },
            beforeSend: function() {
                $.blockUI({ message: 'Excluindo registro...',timeout: 3000 });
            },
        }).done(function(data) {
            $.unblockUI();
            console.log(data,'Requisição concluída.');
            if (data.success) {
                window.location.reload();
            }
        }).fail(function(data) {
            $.unblockUI();
            console.log(data,'Erro na requisição.');
            alert('Ocorreu um erro ao excluir o registro.');
        });

    }
}


    $('#mascara_valor').mask('#.##0,00', {reverse: true});
