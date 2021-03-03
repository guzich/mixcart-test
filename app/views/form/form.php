<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<?php $form = ActiveForm::begin();?>
    <div style="padding-bottom:20px">
        <div class="alert alert-success">
            <div>Выполняются асинхронно: <span id="async-count">0</span></div>
            <div>В очереди: <span id="queue-count">0</span></div>
        </div>
    </div>
    <?= $form->field($model, 'data')->textarea(['id' => 'data']);?>
    <?=Html::submitButton('Асинхронно', ['name'=>'type','value'=>'async', 'class' => 'btn btn-success','style'=>'margin-right:10px']); ?>
    <?=Html::submitButton('Последовательно', ['name'=>'type','value'=>'queue', 'class' => 'btn btn-success','style'=>'margin-right:10px']); ?>
    <div style="padding-top:20px">
        <div class="alert alert-danger" style="display: none; magin-top:20px" id="error"></div>
    </div>
<?php ActiveForm::end();?>

<?php
$this->registerJs(<<<JS
    $('form button[type=submit]').click(function(){
        var form = $(this).closest('form');
        var type = $(this).val();
        var data = form.find('#data').val();
        
        $.post({
            url: '/send',
            data: JSON.stringify({
                type: type,
                data: data    
            }),
            dataType: 'json',
            contentType: 'application/json',
            success: function (res) {
                if (res.isOk) {
                    console.log('ok')
                } else {
                    console.log('res')
                    
                    $('#error').html(res.error).stop().show();
                    $('#error').fadeOut(3000);
                }
                $('#queue-count').html(res.queue);
                $('#async-count').html(res.async)
            },
            error: function () {
                alert('error');
            }
        })
        return false;
    });
JS);
