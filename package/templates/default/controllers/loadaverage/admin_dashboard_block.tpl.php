<div class="for_progress"><?php echo LANG_LA_CURRENT1; ?></div>
<div class="process_status">
    <div class="progressbar" data-width="<?php echo $la[0] ?>%"><?php echo ($_la[0] > $la[0] ? LANG_LA_OVERLOAD.' '.($_la[0] - $la[0]) : $la[0]); ?>%</div>
    <div class="progressbar_blank" data-width="<?php echo (100-$la[0]) ?>%"></div>
</div>
<div class="for_progress"><?php echo LANG_LA_CURRENT5; ?></div>
<div class="process_status">
    <div class="progressbar" data-width="<?php echo $la[1] ?>%"><?php echo ($_la[1] > $la[1] ? LANG_LA_OVERLOAD.' '.($_la[1] - $la[1]) : $la[1]); ?>%</div>
    <div class="progressbar_blank" data-width="<?php echo (100-$la[1]) ?>%"></div>
</div>
<div class="for_progress"><?php echo LANG_LA_CURRENT15; ?></div>
<div class="process_status">
    <div class="progressbar" data-width="<?php echo $la[2] ?>%"><?php echo ($_la[2] > $la[2] ? LANG_LA_OVERLOAD.' '.($_la[2] - $la[2]) : $la[2]); ?>%</div>
    <div class="progressbar_blank" data-width="<?php echo (100-$la[2]) ?>%"></div>
</div>

<script>
    $(function() {
        $('.progressbar, .progressbar_blank').each(function (){
            $(this).width($(this).data('width'));
        });
    });
</script>