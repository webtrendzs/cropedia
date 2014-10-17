<div class="body">
    <div class="details">
    <h2><?php echo $title; ?></h2>
    <?php
    
    echo form_open_multipart('crops/'.$this->uri->segment(2).'/'.$this->uri->segment(3),array());
    echo form_hidden($this->uri->segment(2),$this->uri->segment(3));
    ?>
    <div class="block">
    <?php 
    echo form_label('Crop name');
    echo $name;
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Recommended altitude');
    echo $altitude;
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Farming method');
    echo $farming_method;
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Description');
    echo $description;
    ?>
    </div><div class="block">
    <?php 
    echo form_label('Harvest time');
    echo $harvest_time;
    ?>
    </div>
    <?php 
    echo form_close();
    echo anchor("crops/","Back to crops");
    ?>
    </div>
    <?php if($diseases): ?>
    <div class="diseases">
        <h2>Diseases affecting <?php echo $name; ?></h2>
        <?php foreach($diseases as $key=>$row): ?>
        <h4><?php echo $row->name; ?></h4>
        <p><?php echo $row->description; ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>