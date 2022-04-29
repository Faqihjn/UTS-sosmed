<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4"style="margin-top:20px">Todo List</h5>
            <?php if(session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php } ?>
            <form action="/todo/create" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= session('id') ?>"/>
            <input type="hidden" name="user_name" value="<?= session('name') ?>"/>
            <div class="row mt-5 ">
        <div class="col-6 col-sm-6">
            <label for="title">Tulis Postingan</label>       
            <textarea name="postingan" id="postingan" cols="70" rows="10" value= <?= old('postingan') ?>></textarea>
            <br>
            <button type="submit" class="btn btn-primary text-white ">Submit</button>
        </div>
    </div>
    </form>
    </div>
    </div>
</div>
<?= $this->endSection() ?>