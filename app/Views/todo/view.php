<?= $this->extend('base2') ?>
<?= $this->section('content') ?>
    <div class="container">

        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5><?= $user['name'] ?> </h5>
                                    </div><span> -  <?= $post['created_at'] ?></span>
                                </div>
                                <br>
                                <div class="col-4 d-flex justify-content-center" >
                                    <h4><small><?= $post['post'] ?></small></h4>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>    
            

       <!-- <?= $post['post'] ?>
        <hr>
        <div class="flex-container">
            <div>
                <small>
                    Created By <?= $user['name'] ?> at <?= $post['created_at'] ?>
                </small>
            </div>
-->
            <div style="margin-left:auto">
                <h5><a href="<?= base_url('reply/'.$post['id']).'/new' ?>" style="color:#16a085">Buat Reply</a></h5>
            </div>
        </div>
    </div>
    <hr>
        <div style="text-align:center"><h1>REPLY</h1></div>
    <hr>
    <?php foreach($reply->getResult() as $r): ?>
        <div class="container" style="margin-top:30px;">
            <div class="flex-container">
                <div style="text-align:center">
                    <small><strong><h6><?= $r->name ?></h6></strong></small>                
                    <small><?= $r->created_at ?></small>
                </div>
                <br>
                <div style="margin-left:30px">
                    <?= $r->reply ?>
                </div>
            </div>
            <div style="float:right">
                    <? if(session('id') == $r['user_id'] ):?>
                        <form action= "/reply/<?= $r->id ?>.<?=$post['id']?>" method="post" onsubmit="return confirm('Are you sure?')" class="d-inline">
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-danger text-white "> <i class='bx bx-trash'></i> </button>
                        </form>
                    <? endif?>
            </div>
        </div>
    <?php endforeach ?>
<?= $this->endSection() ?>