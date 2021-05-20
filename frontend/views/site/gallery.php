
<?php
for($i=1;$i<13;$i++): ?>
<input type="checkbox" id="pic-<?=$i?>"/>
<label for="pic-<?=$i?>" class="lightbox">
    <img src="/frontend/web/img/photo<?=$i?>.jpg"/>
</label>
<?php
endfor;
?>

<div class="grid">
<?php
for($i=1;$i<13;$i++): ?>
    <label for="pic-<?=$i?>" class="grid-item">
        <img style="width: 100%" src="/frontend/web/img/photo<?=$i?>.jpg"/>
    </label>
<?php
endfor;
?>
</div>


