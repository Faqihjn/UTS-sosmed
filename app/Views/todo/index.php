<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Hello <?= session('name') ?> </h5>
            <h5 class="mb-4"style="margin-top:20px">Post List</h5>    
        <table class="table table-hover ">
            <tbody>
                <a href="/todo/new/" class="btn btn-primary text-white ">Add new post</a>
                <br />
                <br />
                <?php $no = 0; ?>
                <?php foreach ($post as $item): ?>
                <div class="card">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5><?=$item['user_name']?> </h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="pull-right reply"> 
                                            <a href="/todo/<?=$item['id']?>/view"><span><i class="fa fa-reply"></i> reply</span></a>
                                            <? if(session('id') == $item['user_id']) :?>
                                                <form action= "/post/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Are you sure?')" class="d-inline">
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <button type="submit" class="btn btn-danger text-white "> <i class='bx bx-trash'></i> </button>
                                                </form>
                                            <? endif?>
                                        </div><span><?=$item['created_at']?></span>
                                    </div>
                                </div> <?= $item['post']?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>                                                         
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <div>
    <?= $pager->links('todo', 'custom_pagination') ?> 
    </div>
    </div>
</div>
<?= $this->endSection() ?>




 