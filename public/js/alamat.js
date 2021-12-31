    $('#provinces').on('change', function (e) {
        console.log(e);
        var province_id = e.target.value;
        $.get('/regencies?province_id=' + province_id, function (data) {
            console.log(data);
            $('#regencies').empty();
            $('#regencies').append('<option value="0" disable="true" selected="true">Pilih Kota</option>');

            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">Pilih Kecamatan</option>');

            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

            $.each(data, function (index, regenciesObj) {
                $('#regencies').append('<option value="' + regenciesObj.id + '">' + regenciesObj.name + '</option>');
            })
        });
    });

    $('#regencies').on('change', function (e) {
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/districts?regencies_id=' + regencies_id, function (data) {
            console.log(data);
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">Pilih Kecamatan</option>');

            $.each(data, function (index, districtsObj) {
                $('#districts').append('<option value="' + districtsObj.id + '">' + districtsObj.name + '</option>');
            })
        });
    });

    $('#districts').on('change', function (e) {
        console.log(e);
        var districts_id = e.target.value;
        $.get('/village?districts_id=' + districts_id, function (data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

            $.each(data, function (index, villagesObj) {
                $('#villages').append('<option value="' + villagesObj.id + '">' + villagesObj.name + '</option>');
                console.log("|" + villagesObj.id + "|" + villagesObj.district_id + "|" + villagesObj.name);
            })
        });
    });