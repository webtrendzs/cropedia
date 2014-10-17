<div class="body">
    <h2><?php echo $title; ?></h2>
    <?php
    
    echo form_open_multipart('crops/'.$this->uri->segment(2).'/'.$this->uri->segment(3),array());
    echo form_hidden($this->uri->segment(2),$this->uri->segment(3));
    ?>
    <div class="block">
        <?php echo $table; ?>
    <?php 
    echo form_submit('submit',ucfirst($this->uri->segment(2)));
    ?>
    </div>
    <?php 
    echo form_close();
    echo anchor("crops/","Back to crops");
    ?>
    
</div>