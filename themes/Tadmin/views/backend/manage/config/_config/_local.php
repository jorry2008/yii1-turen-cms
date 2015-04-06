        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="frontLanguage">前台语言</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<?php echo CHtml::dropDownList('config_front_language', Yii::app()->config->get('config_front_language'), $language, array('class'=>'form-control col-md-5')); ?>
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="frontLanguage">后台语言</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<?php echo CHtml::dropDownList('config_back_language', Yii::app()->config->get('config_back_language'), $language, array('class'=>'form-control col-md-5')); ?>
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>

