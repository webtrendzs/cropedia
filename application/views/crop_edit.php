<div class="body">
    <h2><?php echo $title; ?></h2>
    <?php echo validation_errors(); ?>
    <?php
    
    echo form_open_multipart('crops/'.$this->uri->segment(2).'/'.$this->uri->segment(3),array());
    echo form_hidden($this->uri->segment(2),$this->uri->segment(3));
    ?>
    <div class="block">
    <?php 
    echo form_label('Crop name', 'name');
    echo form_input('name',$name);
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Recommended altitude', 'altitude');
    echo form_input('altitude',$altitude);
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Farming method', 'farming_method');
    echo form_input('farming_method',$farming_method);
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Description', 'description');
    echo form_textarea('description',$description);
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Harvest time', 'harvest_stime');
    echo form_input('harvest_time',$harvest_time);
    ?>
    </div><div class="block">
    <?php  if(count($diseases)):
    echo form_label('Common diseases', 'diseases[]');
    echo form_multiselect('diseases[]',$diseases);
    
    endif;
    ?>
    </div><div class="block">
    <?php 
    echo form_submit('submit',ucfirst($this->uri->segment(2)));
    ?>
    </div>
    <?php 
    echo form_close();
    echo anchor("crops/","Back to crops");
    ?>
    
</div>