/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// const {
//     pullAt
// } = require("lodash");

// modal confirmation
// function submitDelete(id) {
//     console.log(document.getElementById('formDelete-' + id).submit());
// 

// mereset modal
$('#modalAjax').on('hidden.bs.modal', function () {
    $('input').val('');
    $('.error').html('');
    $('select').val('');
})

// edit aspek
$(document).on('click', '#edit-aspek', function (e) {
    e.preventDefault();

    var aspek_id = $(this).data('id');
    var url = '/aspek/edit/';
    $.get(url + aspek_id, function (data) {
        $('#aspek').val(data.aspek);
        $('#aspek-id').val(data.id);
        $('#save-aspek').val('edit-aspek');
        $('#modal-title').html('Edit Aspek Penilaian')
    })
})

// Input dan update aspek
$('#save-aspek').on('click', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var aspek = $('#aspek').val();
    var aspek_id = $('#aspek-id').val();
    var button = $('#save-aspek').val();
    console.log(button)

    if (button == 'create') {

        $.ajax({
            type: 'POST',
            url: '/aspek/add',
            data: {
                'aspek': aspek
            },
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Ditambahkan',
                    'success'
                ).then(() => {
                    location.reload();
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors['errors']['aspek'][0]);
                $('#aspek-error').html(errors['errors']['aspek'][0]);
            }
        })
    } else {
        $.ajax({
            type: 'PUT',
            url: '/aspek/update/' + aspek_id,
            data: {
                'aspek': aspek
            },
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Diubah',
                    'success'
                ).then(() => {
                    location.reload()
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors['errors']['aspek'][0]);
                $('#aspek-error').html(errors['errors']['aspek'][0]);
            }

        })
    }
})

// delete aspek
$(document).on('click', '.delete-aspek', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $(this).data('id');
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menghapus data ini ? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/aspek/delete/' + id,
                type: 'DELETE',
                success: function (response) {
                    Swal.fire(
                        'Deleted',
                        'Data Berhasil Dihapus',
                        'success',
                    ).then(() => {
                        location.reload();
                    })
                },
                error: function (e) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat menghapus data',
                        'error',
                    )
                }
            })
        }
    })
})

// Edit Krtieria 
$(document).on('click', '#edit-kriteria', function (e) {
    e.preventDefault();

    var kriteria_id = $(this).data('id');
    var url = '/kriteria/edit/';
    $.get(url + kriteria_id, function (data) {
        var aspek_id = data.aspek_id;
        var nama_kelas = data.kelas;
        $('#modalEdit').modal('show');
        $('#kriteria-id').val(data.id);
        $('#aspek_id').val(data.aspek_id);
        $('#simbol').val(data.simbol);
        $('#kriteria').val(data.kriteria);
        $('#nilai_target').val(data.nilai_target);
        $('#kelas').val(data.kelas);
        $('#save-kriteria').val('edit-user');
        $('#modal-title').html('Edit Kriteria Penilaian')
    })
})

// input dan update kriteria
$('#save-kriteria').on('click', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.error').html('');

    var kriteria_id = $('#kriteria-id').val();
    var aspek_id = $('#aspek_id').val();
    var simbol = $('#simbol').val();
    var kriteria = $('#kriteria').val();
    var nilai_target = $('#nilai_target').val();
    var kelas = $('#kelas').val();
    var button = $('#save-kriteria').val();


    console.log(button);

    if (button == 'create') {
        $.ajax({
            type: 'POST',
            url: '/kriteria/add',
            data: {
                'aspek_id': aspek_id,
                'simbol': simbol,
                'kriteria': kriteria,
                'nilai_target': nilai_target,
                'kelas': kelas
            },
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Ditambahkan',
                    'success'
                ).then(() => {
                    location.reload();
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors['errors']);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    } else {
        $.ajax({
            type: 'PUT',
            url: '/kriteria/update/' + kriteria_id,
            data: {
                'aspek_id': aspek_id,
                'simbol': simbol,
                'kriteria': kriteria,
                'nilai_target': nilai_target,
                'kelas': kelas
            },
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Diubah',
                    'success').then(() => {
                    location.reload();
                });
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    }
})

// delete kriteria
$(document).on('click', '.delete-kriteria', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $(this).data('id');
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menghapus data ini ? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/kriteria/delete/' + id,
                type: 'DELETE',
                success: function (response) {
                    Swal.fire(
                        'Deleted',
                        'Data Berhasil Dihapus',
                        'success',
                    ).then(() => {
                        location.reload();
                    })
                },
                error: function (e) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat menghapus data',
                        'error',
                    )
                }
            })
        }
    })
})

// Edit calon paskibraka
$(document).on('click', '#edit-calon-paskib', function (e) {
    e.preventDefault();

    var calon_paskib_id = $(this).data('id');
    var url = '/calon-paskib/edit/';
    $.get(url + calon_paskib_id, function (data) {
        // var aspek_id = data.aspek_id;
        // var nama_kelas = data.kelas;
        $('#modalEdit').modal('show');
        $('#calon-paskib-id').val(data.id);
        $('#periode').val(data.periode);
        $('#name').val(data.name);
        $('#alamat').val(data.alamat);
        $('#asal_sekolah').val(data.asal_sekolah);
        $('#jenis_kelamin').val(data.jenis_kelamin);
        $('#tgl_lahir').val(data.tgl_lahir);
        $('#no_telp').val(data.no_telp);
        $('#save-calon-paskib').val('edit-user');
        $('#modal-title').html('Edit Calon Paskibra');
    })
})

// input dan update calon paskibraka
$('#save-calon-paskib').on('click', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.error').html('');

    var calon_paskib_id = $('#calon-paskib-id').val();
    var periode = $('#periode').val();
    var name = $('#name').val();
    var alamat = $('#alamat').val();
    var asal_sekolah = $('#asal_sekolah').val();
    var jenis_kelamin = $('#jenis_kelamin').val();
    var tgl_lahir = $('#tgl_lahir').val();
    var no_telp = $('#no_telp').val();
    var button = $('#save-calon-paskib').val();
    console.log(button);

    if (button == 'create') {
        $.ajax({
            type: 'POST',
            url: '/calon-paskib/add',
            data: {
                'periode': periode,
                'name': name,
                'alamat': alamat,
                'asal_sekolah': asal_sekolah,
                'jenis_kelamin': jenis_kelamin,
                'tgl_lahir': tgl_lahir,
                'no_telp': no_telp,
            },
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Ditambahkan',
                    'success'
                ).then(() => {
                    window.location = "/calon-paskib"
                    // location.reload();
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    } else {
        $.ajax({
            type: 'PUT',
            url: '/calon-paskib/update/' + calon_paskib_id,
            data: {
                'periode': periode,
                'name': name,
                'alamat': alamat,
                'asal_sekolah': asal_sekolah,
                'jenis_kelamin': jenis_kelamin,
                'tgl_lahir': tgl_lahir,
                'no_telp': no_telp,
            },
            success: function (response) {
                console.log(response);
                //show success message
                Swal.fire(
                    'Success',
                    'Data Berhasil Diubah',
                    'success').then(() => {
                    window.location = "/calon-paskib"
                    // location.reload();
                });
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    }
})

// delete calon paskibra
$(document).on('click', '.delete-calon-paskib', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $(this).data('id');
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menghapus data ini ? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/calon-paskib/delete/' + id,
                type: 'DELETE',
                success: function (response) {
                    Swal.fire(
                        'Deleted',
                        'Data Berhasil Dihapus',
                        'success',
                    ).then(() => {
                        location.reload();
                    })
                },
                error: function (e) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat menghapus data',
                        'error',
                    )
                }
            })
        }
    })
})

// pilih periode untuk tampilkan data
$('#periode-tampil').on('change', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var value = $(this).find(":selected").val();
    console.log(value);

    $.ajax({
        type: 'GET',
        url: '/calon-paskib/periode-tampil',
        data: {
            'periode': value
        },
        success: function (response) {
            console.log(response.data);
            var data = response.data;

            // menghapus konten sebelumnya
            $('#data-table tbody').empty();

            // memasukkan data ke dalam table 
            var no = 1;
            data.forEach(function (data) {
                var row = `
                    <tr>
                        <td> ${no++} </td>
                        <td> ${data.name} </td>
                        <td> ${data.alamat} </td>
                        <td> ${data.asal_sekolah} </td>
                        <td> ${data.jenis_kelamin} </td>
                        <td> ${data.tgl_lahir} </td>
                        <td> ${data.no_telp} </td>
                        <td>
                            <a href="javascript:void(0)" id="edit-calon-paskib" data-toggle="modal" data-target="#modalAjax" data-id="${data.id}" class="btn btn-secondary btn-action mr-1" data-toggle="tooltip"><i class="fas fa-pencil-alt pt-1"></i></a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-action delete-calon-paskib" data-id="${data.id}"><i class="fas fa-trash pt-1"></i>
                            </a>
                        </td>
                    </tr>
                `;

                $('#data-table tbody').append(row);
            })
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            console.log(data);
        }
    })
})

// Edit nilai
$(document).on('click', '#edit-nilai', function (e) {
    e.preventDefault();

    var nilai_id = $(this).data('id');
    var url = '/nilai/edit/';
    $.get(url + nilai_id, function (data) {
        console.log(data)
        $('#modalEdit').modal('show');
        $('#nilai-id').val(data.id);
        $('#cari-nama').val(data.calon_paskibraka_id);
        $('#cari-nama').trigger('change');
        // $('#cari-nama option[value=" + data.calon_paskibraka_id + "]').attr('selected', true);
        $('#asal_sekolah').val(data.asal_sekolah);
        $('#jenis_kelamin').val(data.jenis_kelamin);
        $('#akademik').val(data.akademik);
        $('#jalan_ditempat').val(data.jalan_ditempat);
        $('#langkah_tegap').val(data.langkah_tegap);
        $('#penghormatan').val(data.penghormatan);
        $('#belok').val(data.belok);
        $('#hadap').val(data.hadap);
        $('#lari').val(data.lari);
        $('#pushup').val(data.pushup);
        $('#situp').val(data.situp);
        $('#pullup').val(data.pullup);
        $('#tb').val(data.tb);
        $('#bb').val(data.bb);
        $('#bentuk_kaki').val(data.bentuk_kaki);
        $('#save-nilai').val('edit-user');
        $('#modal-title').html('Edit Nilai');
    })
})

// input dan update nilai
$('#save-nilai').on('click', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.error').html('');

    var data = $('#nilai-form').serialize();
    var button = $('#save-nilai').val();
    var nilai_id = $('#nilai-id').val();

    if (button == 'create') {
        $.ajax({
            type: 'POST',
            url: '/nilai/add',
            data: data,
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Ditambahkan',
                    'success'
                ).then(() => {
                    location.reload();
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    } else {
        $.ajax({
            type: 'PUT',
            url: '/nilai/update/' + nilai_id,
            data: data,
            success: function (response) {
                console.log(response);
                Swal.fire(
                    'Success',
                    'Data Berhasil Diubah',
                    'success'
                ).then(() => {
                    location.reload();
                })
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors);
                $.each(errors.errors, function (key, val) {
                    $('#' + key + "-error").html(val[0]);
                })
            }
        })
    }
})

// delete nilai
$(document).on('click', '.delete-nilai', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $(this).data('id');
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menghapus data ini ? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/nilai/delete/' + id,
                type: 'DELETE',
                success: function (response) {
                    Swal.fire(
                        'Deleted',
                        'Data Berhasil Dihapus',
                        'success',
                    ).then(() => {
                        location.reload();
                    })
                },
                error: function (e) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat menghapus data',
                        'error',
                    )
                }
            })
        }
    })
})

// detail nilai
$(document).on('click', '#detail-nilai', function (e) {
    e.preventDefault();

    var nilai_id = $(this).data('id');
    var url = '/nilai/detail/';
    $.get(url + nilai_id, function (data) {
        var bentuk_kaki;
        if (data.bentuk_kaki == 5) {
            bentuk_kaki = "Normal"
        } else if (data.bentuk_kaki == 3) {
            bentuk_kaki = "X / O kurang dari 5cm"
        } else {
            bentuk_kaki = "X / O lebih dari 5cm"
        }

        $('#nama_lengkap').html(data.calon_paskibraka.name);
        $('#gender').html(data.calon_paskibraka.asal_sekolah);
        $('#sekolah').html(data.calon_paskibraka.jenis_kelamin);
        $('#nilai_akademik').html(data.akademik);
        $('#nilai_jalan_ditempat').html(data.jalan_ditempat);
        $('#nilai_langkah_tegap').html(data.langkah_tegap);
        $('#nilai_penghormatan').html(data.penghormatan);
        $('#nilai_belok').html(data.belok);
        $('#nilai_hadap').html(data.hadap);
        $('#nilai_lari').html(data.lari);
        $('#nilai_pushup').html(data.pushup);
        $('#nilai_situp').html(data.situp);
        $('#nilai_pullup').html(data.pullup);
        $('#nilai_tb').html(data.tb);
        $('#nilai_bb').html(data.bb);
        $('#nilai_bentuk_kaki').html(bentuk_kaki);
    })

})
