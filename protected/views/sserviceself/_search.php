<style>

</style>
 <?php 
        $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'action'=>Yii::app()->createUrl($this->route),
                'method'=>'get',
				'type'=>'horizontal',
        )); 
        $addAttribute = $model->attributeSearchLabels();
        $attributes = array_keys($addAttribute);
   ?>  
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">高级搜索</h3>
      </div>
      <div class="modal-body ">


            <div class="" style="margin-left:-80px;">

				
			   <?php     
				   foreach ($attributes as $attribute) {
						$this->widget('ext.widgets.BootstrapBuildFormChild', array(
						   'textField_span' => 'span4 mr5',
						   'form' => $form,
						   'model' => $model,
						   'attribute' => $attribute,
						));
				   }
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
