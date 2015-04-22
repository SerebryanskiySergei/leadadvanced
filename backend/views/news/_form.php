<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\News $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
            <?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
            $form->field($model, 'offer_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(common\models\Offer::find()->all(),'id','title'),
                ['prompt'=>'Choose...']
            ); ?>

            <?= $form->field($model, 'category')->radioList([\common\models\News::NOVINKI=>'Новинки',\common\models\News::CHANGE_OFFER=>'Изменения оффера',\common\models\News::STOP_OFFER=>'Приостановка оффера',\common\models\News::CHANGES_GEO=>'Изменения Гео',\common\models\News::NEW_LENDING=>'Новые лендинги',\common\models\News::SALES=>'Акции',\common\models\News::SYSTEM_TICKETS=>'Системные тикеты']) ?>
            <?= $form->field($model, 'visibility')->radioList([\common\models\News::VISIBILITY_ALL=>'Показывать всем',\common\models\News::VISIBILITY_NOONE=>'Не показывать',\common\models\News::VISIBILITY_ADVERTISER=>'Для рекламодателей',\common\models\News::VISIBILITY_WEBMASTER=>'Для вебмастеров']) ?>

        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'News',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
