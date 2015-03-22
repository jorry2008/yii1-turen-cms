        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="siteName">网站名称</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<input type="text" name="config_site_name" value="<?php echo isset($configs['config_site_name'])?$configs['config_site_name']['value']:'';?>" placeholder="Enter Site Name" id="siteName" class="form-control col-md-5">
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="adminer">网站管理员</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<input type="text" name="config_site_owner" value="<?php echo isset($configs['config_site_owner'])?$configs['config_site_owner']['value']:'';?>" placeholder="Enter Administorer Name" id="adminer" class="form-control col-md-5">
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 text-right form-label" for=address>联系地址</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<input type="text" name="config_address" value="<?php echo isset($configs['config_address'])?$configs['config_address']['value']:'';?>" placeholder="Enter Address" id="address" class="form-control col-md-5">
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="inputEmail1">电子邮件</label>
            <div class="col-md-10">
	            <div class="col-md-7">
	            	<input type="email" name="config_email" value="<?php echo isset($configs['config_email'])?$configs['config_email']['value']:'';?>" placeholder="Enter Email" id="inputEmail1" class="form-control col-md-5">
	            </div>
	            <span class="help-block">Example block-level help text here.</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="telephone">联系电话</label>
            <div class="col-md-10">
	            <div class="col-md-7">
            		<input type="text" name="config_tel" value="<?php echo isset($configs['config_tel'])?$configs['config_tel']['value']:'';?>" placeholder="Enter Tel Number" id="telephone" class="form-control col-md-5">
        		</div>
        		<span class="help-block">Example block-level help text here.</span>
        	</div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 text-right form-label" for="number">传真号码</label>
            <div class="col-md-10">
	            <div class="col-md-7">
            		<input type="text" name="config_fax" value="<?php echo isset($configs['config_fax'])?$configs['config_fax']['value']:'';?>" placeholder="Enter Fax Number" id="number" class="form-control col-md-5">
        		</div>
        		<span class="help-block">Example block-level help text here.</span>
        	</div>
        </div>
        
        
		


