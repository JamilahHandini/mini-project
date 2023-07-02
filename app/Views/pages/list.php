<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">All Tasks</h5>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="new-product.html" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addModal">+&nbsp; New Task</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="text-center" id="addTaskForm">
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"></span>
                                    <input type="text" class="form-control" placeholder="Judul" name="judul">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Detail Modal -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Judul: <span id="modal-judul"></span></p>
                            <p>Status: <span id="modal-status"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="text-center" id="updateTaskForm">
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"></span>
                                    <input type="text" id="judul-modal" class="form-control" placeholder="Judul" name="judul">
                                </div>

                                <div clas="row">
                                    <a>Status :</a>
                                    <input type="checkbox" id="checkbox-update-modal" name="status" value="1">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="text-center" id="updateTaskForm">
                            <div class="modal-body">
                                <h5>
                                    Anda yakin menghapus data ini?
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="delete-button-modal" class="btn btn-danger">Delete Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Success Delete Modal -->
            <div class="modal fade" id="succesDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Success Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="text-center" id="updateTaskForm">
                            <div class="modal-body">
                                <h5>
                                    Data Berhasil Dihapus
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class=" text-center display responsive no-wrap table table-striped  order-column dataTable no-footer" id="taskTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scriptAjax'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var dataTable = $('#taskTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': "<?= site_url('task/getTasks') ?>",
                'data': function(data) {
                    return {
                        data: data,
                    };
                },
                dataSrc: function(data) {
                    return data.data;
                }
            },
            'columns': [{
                    data: 'judul'
                },
                {
                    "render": function(data, type, row, meta) {
                        if (row.status == 1) {
                            var a = `
                                <input type="checkbox" class="myCheckboxStatus" id="ckBox" checked>
                            `;
                            return a;
                        } else {
                            var a = `
                                <input type="checkbox" class="myCheckboxStatus id="ckBox"">
                            `;
                            return a;
                        }
                    }
                },
                {
                    "render": function() {
                        var a = `
                            <a href="#" class="detailTask">
                                <i class="fas fa-eye text-secondary"></i>
                            </a>
                            <a href="#" class="updateTask" class="mx-3">
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                            <a href="#" class="deleteTask">
                                <i class="fas fa-trash text-secondary"></i>
                            </a>
                            `;

                        return a;
                    }
                },
            ]
        });
        $('#taskTable tbody').on('click', '.detailTask', function() {
            var rowData = dataTable.row($(this).closest('tr')).data();
            var id = rowData['id'];

            $.ajax({
                url: '<?= site_url('task/detail/') ?>' + id,
                type: 'POST',
                success: function(data) {
                    $('#modal-judul').text(data.data.judul);
                    if (data.data.status == 0) {
                        $('#modal-status').text("Belum Selesai");
                    } else if (data.data.status == 0) {
                        $('#modal-status').text("Selesai");
                    }

                    $('#detailModal').modal('show');

                }
            });
        });

        $('#taskTable tbody').on('click', '.updateTask', function() {
            var rowData = dataTable.row($(this).closest('tr')).data();
            var id = rowData['id'];

            $('#updateModal').modal('show');

            $('#updateTaskForm').submit(function(e) {
                e.preventDefault();

                $('#updateTaskForm').submit(function(e) {
                    e.preventDefault();

                    // Get the checkbox value
                    var checkboxValue = $('#checkbox-update-modal').is(':checked') ? 1 : 0;
                    var textValue = $('#judul-modal').val();

                    var formData = {
                        judul: textValue,
                        status: checkboxValue
                    };

                    $.ajax({
                        url: '<?= site_url('task/update/'); ?>' + id,
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#taskTable').DataTable().ajax.reload();
                                $('#updateModal').modal('hide');
                            } else {
                                alert(response.error)
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(error)
                        }
                    });
                });

            });

        });

        $('#taskTable tbody').on('click', '.deleteTask', function() {
            var rowData = dataTable.row($(this).closest('tr')).data();
            var id = rowData['id'];

            $('#deleteModal').modal('show');

            $('#delete-button-modal').on('click', function() {
                $.ajax({
                    url: '<?= site_url('task/delete/') ?>' + id,
                    type: 'POST',
                    success: function(response) {
                        $('#taskTable').DataTable().ajax.reload();
                        $('#deleteModal').modal('hide');
                        $('#successDeleteModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        alert(error)
                    }
                });
            });
        });

        $('#taskTable tbody').on('change', '.myCheckboxStatus', function() {
            var rowData = dataTable.row($(this).closest('tr')).data();
            var id = rowData['id'];

            var checkboxValue = $('#ckBox').is(':checked') ? 1 : 0;
            var formData = {
                status: checkboxValue
            };

            $.ajax({
                url: '<?= site_url('task/updateStatus/') ?>' + id,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#taskTable').DataTable().ajax.reload();
                }
            });
        });

    });
</script>

<script>
    var modal = document.getElementById("addModal");
    var btn = document.getElementById("addModal");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<script>
    $(document).ready(function() {
        $('#addTaskForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('task/add'); ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#addModal').modal('hide');
                        $('#taskTable').DataTable().ajax.reload();
                    } else {
                        alert(response.error)
                    }
                },
                error: function(xhr, status, error) {
                    alert(error)
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>