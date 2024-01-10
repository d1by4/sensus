<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="bi bi-person-circle"></i>
                    Data
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary buttonAdd" data-toggle="modal" data-target="#modal-lg">
                        Tambah Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-2">Nama</th>
                            <th class="col-2">Asal</th>
                            <th class="col-2">No Telepon</th>
                            <th class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; // Mulai nomor dari 1 
                        ?>
                        <?php foreach ($data['penduduk'] as $list) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $list['nama'] ?></td>
                                <td><?= $list['asal'] ?></td>
                                <td><?= $list['no_tlpn'] ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/penduduk/edit/<?= $list['id']; ?>" class="btn btn-warning buttonEdit" data-toggle="modal" data-target="#modal-lg" data-id='<?= $list['id'] ?>'>Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus?')" href="<?= BASEURL; ?>/penduduk/delete/<?= $list['id']; ?>" class=" btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?> <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- modal -->
    <div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">Tambah </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= BASEURL; ?>/penduduk/add" method="post">
                    <div class="modal-body">
                        <div>
                            <input class="form-control" type="hidden" id="id" name="id" placeholder="">
                            <label for="nama">Nama Lengkap</label>
                            <input class="form-control" type="text" id="nama" name="nama" placeholder="I Kadek Dibya Wardhana Dinata">
                        </div>

                        <div class="mt-3">
                            <label>Asal</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="asal" name="asal" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Denpasar</option>
                                <option data-select2-id="109">Karangasem</option>
                                <option data-select2-id="110">Klungkung</option>
                                <option data-select2-id="111">Gianyar</option>
                                <option data-select2-id="112">Tabanan</option>
                                <option data-select2-id="113">Jembrana</option>
                                <option data-select2-id="114">Bangli</option>
                                <option data-select2-id="114">Buleleng</option>
                                <option data-select2-id="114">Badung</option>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection">
                                </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>

                        <div class="mt-3">
                            <label for="no_tlpn">Masukkan No Telepon Anda</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" id="no_tlpn" name="no_tlpn" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text" placeholder="+62....">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>