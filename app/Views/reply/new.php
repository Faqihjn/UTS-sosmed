<?= $this->extend('base') ?>
<?= $this->section('content') ?>

    <h3>Reply Postingan : <i><?= $post['user_name'] ?></i></h3>
 
    <?php
        $hidden_data = [
            'post_id' => $post['id'],
            'user_id' => session()->get('id'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('name'),
        ];
        $reply = [
            'name' => 'reply',
            'id' => 'reply',
        ];
        $submit = [
            'name' => 'submit',
            'value' => 'Submit',
            'type' => 'submit',
            'class' => 'button'
        ];    
    ?>
    <div class="container">
        <?= form_open_multipart('reply/'.$post['id'].'/create') ?>
            
            <?= form_hidden($hidden_data) ?>

            <?= form_textarea($reply) ?>

            <?= form_submit($submit) ?>

        <?= form_close() ?>
    </div>
<?= $this->endSection() ?>
