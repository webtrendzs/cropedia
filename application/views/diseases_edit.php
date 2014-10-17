<div class="body">
    <h2><?php echo $title; ?></h2>
    <?php echo validation_errors(); ?>
    <?php
    
    echo form_open_multipart('diseases/'.$this->uri->segment(2).'/'.$this->uri->segment(3),array());
    echo form_hidden($this->uri->segment(2),$this->uri->segment(3));
    ?>
    <div class="block">
    <?php 
    echo form_label('Name', 'name');
    echo form_input('name',$name);
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Description', 'description');
    echo form_textarea('description',$description);
    ?>
    </div><div class="block">
    <?php 
    echo form_submit('submit',ucfirst($this->uri->segment(2)));
    ?>
    </div>
    <?php 
    echo form_close();
    echo anchor("diseases/","Back to diseases");
    ?>
    
</div>