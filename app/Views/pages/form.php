<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">Add Tasks</h5>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pb-0">
                <div class="col-4">
                    <div class="table-responsive">
                        <div class="input-group mb-3">
                            <form class="text-center" id="addTaskForm">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"></span>
                                    <input type="text" class="form-control" placeholder="Judul" name="judul">
                                </div>
                                <button class="btn btn-primary text-center" type="submit">Add Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scriptAjax'); ?>

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
                        alert(response.success)
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