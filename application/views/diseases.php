<div class="body">
   
    <?php if(!$new): ?>
    <p><?php echo $add; ?></p>
    <?php echo $table; ?>
    <?php else: ?>
    <h2><?php echo $title; ?></h2>
    <?php echo validation_errors(); ?>
    <?php
    
    echo form_open_multipart('diseases/'.$this->uri->segment(2).'/'.$this->uri->segment(3),array());
    echo form_hidden($this->uri->segment(2),$this->uri->segment(3));
    ?>
    <div class="block">
    <?php 
    echo form_label('Name', 'name');
    echo form_input('name');
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Description', 'description');
    echo form_textarea('description');
    ?>
    </div><div class="block">
    <?php 
    echo form_submit('submit',ucfirst($this->uri->segment(2)));
    ?>
    </div>
    <?php 
    echo form_close();
    echo anchor("diseases/","Back to Diseases");
    ?>
    <?php endif; ?>
    
</div>