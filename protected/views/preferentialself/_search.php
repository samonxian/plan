<?php
/* @var $this SutuoController */
/* @var $model Sutuo */
/* @var $form CActiveForm */
?>
 <?php 
        $form=$this->beginWidget('CActiveForm', array(
                'action'=>Yii::app()->createUrl($this->route),
                'method'=>'get',
        )); 
        $addAttribute = $model->attributeAddLabels();
        $attributes = array_keys($addAttribute);
   ?>  
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">高级搜索</h3>
      </div>
      <div class="modal-body">


            <div class=" form-horizontal" style="margin-left:-80px;">

              
           <?php     
                foreach($attributes as $a):
            ?>

                        <div class="control-group ">
                            <?php echo $form->label($model,$a,array(
                                "class"=>"control-label",
                            )); ?>
                            <div class="controls">
                                <?php echo $form->textField($model,$a,array(
                                    "class"=>"span5",
                                )); ?>
                            </div>
                        </div>

                <?php
                    endforeach;
                ?>

           
            </div><!-- search-form -->
      </div>
      <div class="modal-footer">
            <button class="btn">搜索</button>
      </div>
</div>           
<?php 

    $this->endWidget(); 
?>
