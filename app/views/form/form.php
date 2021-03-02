<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'data')->textarea(['id' => 'data']);?>
    <?=Html::submitButton('Асинхронно', ['name'=>'type','value'=>'async', 'class' => 'btn btn-success','style'=>'margin-right:10px']); ?>
    <?=Html::submitButton('Последовательно', ['name'=>'type','value'=>'queue', 'class' => 'btn btn-success','style'=>'margin-right:10px']); ?>
<?php ActiveForm::end();?>

<?php
$this->registerJs(<<<JS
    $('form button[type=submit]').click(function(){
        var type = $(this).val();
        var data = $(this).closest('form').find('#data').val();
        $.post({
            url: '/send',
            data: JSON.stringify({
                type: type,
                data: data    
            }),
            dataType: 'json',
            success: function () {
                
            },
            error: function () {
                alert('error');
            }
        })
        return false;
    });
JS);
