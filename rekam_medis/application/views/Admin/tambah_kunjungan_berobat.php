<div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-data-info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/Data_Kunjungan_Berobat">Data Kunjungan Berobat</a></li>
                    <li class="breadcrumb-item active">Tambah Data Kunjungan Berobat</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Data Kunjungan Berobat</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;">Tambah Data Kunjungan Berobat</h4>
                        <hr>
                        <form action="<?= base_url(); ?>Admin/tambahKunjunganBerobat" method="POST">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">NIK <span style="color: red;">*</span></h6>
                                    <select class="form-control mb-3" id="nik" style="width: 100%; height:36px;" onchange="show_kunjungan_karyawan(this.value)" required>
                                        <option>Select a NIK</option>
                                        <?php foreach ($data_karyawan as $row) { ?>
                                            <option value=" <?= $row->id_karyawan ?>"><?= $row->nik ?> || <?= $row->nama_karyawan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Nama <span style="color: red;">*</span></h6>
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" readonly required>
                                    <input type="hidden" name="nik" id="nik_karyawan" class="form-control" readonly required>
                                    <input type="hidden" name="id_karyawan" id="id_karyawan" class="form-control" readonly required>
                                </div>

                                <div class="col-10 mt-2">
                                    <h6 class="input-title mt-0">Catatan Rekam Medis <span style="color: red;">*</span></h6>
                                    <div class="row">
                                        <div class="col-11">
                                            <select class="select2 form-control mb-3 custom-select" id="catatan_rekam_medis" style="width: 100%; height:36px;" onchange="show_preview(this.value)">
                                                <option>Select a Rekam Medis</option>
                                                <option value="kunjungan_berobat">Kunjungan Obat Terdahulu</option>
                                                <option value="skd">SKD</option>
                                                <option value="mcu">MCU</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn" type="button" id="preview"><i class="fas fa-search"></i> Preview</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3" id="tampil_preview">
                                </div>

                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Keluhan <span style="color: red;">*</span></h6>
                                    <input type="text" name="keluhan" class="form-control" required>
                                </div>

                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Diagnosa <span style="color: red;">*</span></h6>
                                    <input type="text" name="diagnosa" class="form-control" required>
                                </div>

                                <div class="col-12 mt-2">
                                    <h6 class="input-title mt-0">Tanggal Berobat <span style="color: red;">*</span></h6>
                                    <input type="text" class="form-control" name="tgl_berobat" id="tgl_berobat" placeholder="Tanggal Berobat" required autocomplete="off" />
                                </div>

                                <div class="col-12 mt-2">
                                    <table class="table table-striped mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" style="text-align: center;">Obat</th>
                                                <th scope="col" style="text-align: center;">Kuantiti</th>
                                                <th scope="col" style="text-align: center;"><button id="addRow" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="loop">
                                            <tr>
                                                <td>
                                                    <select class="form-control mb-3" id="select2obat" name="id_obat[]" style="width: 100%; height:36px;" required></select>
                                                </td>
                                                <td> <input type="number" name="qty[]" id="qty" class="form-control" required placeholder="Kuantiti"></td>
                                                <td style="text-align: center;">
                                                    <button id="deleteRow" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##########################SCRIPT PENDUKUNG########################## -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>

<!-- Plugins js -->
<script src="<?= base_url(); ?>assets/plugins/timepicker/moment.js"></script>
<script src="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asGradient.js"></script>
<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

<script>
    $(document).ready(function() {
        $("#nik").select2({
            allowClear: true,
            placeholder: "Select a NIK",
        });

        select2obat();

        var id_karyawan = "";
        var tampil_preview = document.getElementById("tampil_preview")
        tampil_preview.style.display = "none"

        $('#tgl_berobat').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD-MM-YYYY'
        });

        var no = 1;
        $('thead').on('click', '#addRow', function() {
            var tr = `<tr>
                    <td>
                    <select class='form-control mb-3' id='select2obat${no}' name='id_obat[]' style='width: 100%; height:36px;' required>
                        <option value=""></option>    
                        <?php foreach ($obat as $row) { ?> 
                        <option value="<?= $row->id_obat ?>"> <?= $row->nama_obat ?></option>
                        <?php } ?>
                    </select>
                    </td>
                    <td><input type='number' name='qty[]' id='qty' class='form-control' required placeholder='Kuantiti'></td>
                    <td style='text-align: center;'>
                    <button id='deleteRow' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
                    </td>
                    </tr>`
            $('#loop').append(tr).html();
            select2obats(no);
            $('#select2obat' + no).select2({
                allowClear: true,
                placeholder: "Select a Obat",
            });
            no++;

        });
        $('#loop').on('click', '#deleteRow', function() {
            $(this).parent().parent().remove();
        });

        $("#preview").click(function() {
            tampil_preview.style.display = "block"
        });
    });

    function select2obats(no) {
        console.log(no)
        $('#select2obat' + no).select2({
            allowClear: true,
            placeholder: "Select a Obat",
        });
    }

    function select2obat() {
        $("#select2obat").select2({
            allowClear: true,
            placeholder: "Select a Obat",
        });
        show_obat()
    }

    function show_obat() {
        $.ajax({
            url: "<?php echo base_url('Admin/get_obat'); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(x) {
                if (x.status == true) {
                    $('#select2obat').html('<option value=""></option>');
                    $.each(x.data, function(k, v) {
                        $('#select2obat').append(`<option value="${v.id_obat}">${v.nama_obat}</option>`).html();
                    });
                }
            }
        });
    }

    function show_kunjungan_karyawan(value) {
        $.ajax({
            url: "<?php echo base_url('Admin/get_karyawan'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_karyawan: value
            },
            success: function(value) {
                if (value.status == true) {
                    id_karyawan = value.data.id_karyawan;
                    $('#nama_karyawan').val(value.data.nama_karyawan);
                    $('#id_karyawan').val(value.data.id_karyawan);
                    $('#nik_karyawan').val(value.data.nik);
                }
            }
        });
    }

    function show_preview(value) {

        $.ajax({
            url: "<?php echo base_url('Admin/get_preview'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                database: value,
                id_karyawan: id_karyawan,
            },

            success: function(value) {
                if (value.database == 'kunjungan_berobat') {
                    var title = "Kunjungan Berobat Terdahulu"
                    $('#tampil_preview').html(`
                            <h4 style="text-align: center;"> Catatan Rekam Medis ${title}</h4>
                            <hr>
                            <table class='table table-striped mb-0'>
                            <thead>
                            <tr>
                            <th scope='col' style='text-align: center;'>NIK</th>
                            <th scope='col' style='text-align: center;'>NAMA</th>
                            <th scope='col' style='text-align: center;'>KELUHAN</th>
                            <th scope='col' style='text-align: center;'>DIAGNOSA</th>
                            <th scope='col' style='text-align: center;'>TGL</th>
                            </tr>
                            </thead>
                            <tbody id='preview_kunjungan_berobat'>

                            </tbody>
                            </table>
                            `);
                    $.each(value.data, function(k, v) {
                        var body = `
                                <tr> 
                                <td align="center">${v.nik}</td>
                                <td align="center">${v.nama}</td>
                                <td align="center">${v.keluhan}</td>
                                <td align="center">${v.diagnosa}</td>
                                <td align="center">${v.tgl}</td>
                                </tr>
                               `
                        $('#preview_kunjungan_berobat').html(body);
                    });
                } else if (value.database == 'skd') {
                    console.log(value.data)
                    var title = 'SKD'
                    $('#tampil_preview').html(`
                            <h4 style="text-align: center;"> Catatan Rekam Medis ${title}</h4>
                            <hr>
                            <table class='table table-striped mb-0'>
                            <thead>
                            <tr>
                            <th scope='col' style='text-align: center;'>NIK</th>
                            <th scope='col' style='text-align: center;'>NAMA</th>
                            <th scope='col' style='text-align: center;'>TANGGAL MULAI SKD</th>
                            <th scope='col' style='text-align: center;'>TANGGAL AKHIR SKD</th>
                            <th scope='col' style='text-align: center;'>DIAGNOSA PENYAKIT</th>
                            <th scope='col' style='text-align: center;'>TEMPAT BEROBAT</th>
                            </tr>
                            </thead>
                            <tbody id='preview_kunjungan_berobat'>

                            </tbody>
                            </table>
                            `);
                    $.each(value.data, function(k, v) {
                        var body = `
                                <tr> 
                                <td style='text-align: center;'>${v.nik}</td>
                                <td style='text-align: center;'>${v.nama_karyawan}</td>
                                <td style='text-align: center;'>${v.tanggal_mulai_skd}</td>
                                <td style='text-align: center;'>${v.tanggal_akhir_skd}</td>
                                <td style='text-align: center;'>${v.diagnosa_penyakit}</td>
                                <td style='text-align: center;'>${v.tempat_berobat}</td>
                                </tr>
                               `
                        $('#preview_kunjungan_berobat').html(body);
                    });
                } else if (value.database == 'mcu') {
                    var title = 'MCU'
                    $('#tampil_preview').html(`
                            <h4 style="text-align: center;"> Catatan Rekam Medis ${title}</h4>
                            <hr>
                            <table class='table table-striped mb-0'>
                            <thead>
                            <tr>
                            <th scope='col' style='text-align: center;'>NIK</th>
                            <th scope='col' style='text-align: center;'>NAMA</th>
                            <th scope='col' style='text-align: center;'>FASILITATOR MCU</th>
                            <th scope='col' style='text-align: center;'>WAKTU MCU</th>
                            <th scope='col' style='text-align: center;'>TEKANAN DARAH</th>
                            <th scope='col' style='text-align: center;'>HASIL PEMERIKSAAN DOKTER</th>
                            <th scope='col' style='text-align: center;'>HASIL LAB URIN</th>
                            <th scope='col' style='text-align: center;'>HASIL RONTGEN THORAK</th>
                            <th scope='col' style='text-align: center;'>HASIL PEMERIKSAAN MATA</th>
                            <th scope='col' style='text-align: center;'>HASIL PEMERIKSAAN PENDENGARAN</th>
                            </tr>
                            </thead>
                            <tbody id='preview_kunjungan_berobat'>

                            </tbody>
                            </table>
                            `);

                    $.each(value.data, function(k, v) {
                        var body = `
                                <tr> 
                                <td style='text-align: center;'>${v.nik}</td>
                                <td style='text-align: center;'>${v.nama_karyawan}</td>
                                <td style='text-align: center;'>${v.fasilitator_mcu}</td>
                                <td style='text-align: center;'>${v.waktu_mcu}</td>
                                <td style='text-align: center;'>${v.tekanan_darah}</td>
                                <td style='text-align: center;'>${v.hasil_pemeriksaan_dokter}</td>
                                <td style='text-align: center;'>${v.hasil_lab_urin}</td>
                                <td style='text-align: center;'>${v.hasil_rontgent_thorak}</td>
                                <td style='text-align: center;'>${v.hasil_pemeriksaan_mata}</td>
                                <td style='text-align: center;'>${v.hasil_pemeriksaan_pendengaran}</td>
                                </tr>
                               `
                        $('#preview_kunjungan_berobat').html(body);
                    });
                }
            }
        });
    }
</script>