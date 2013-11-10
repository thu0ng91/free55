<li class="span2">
    <div class="thumbnail">
        <a href="<?php echo $this->createUrl('book/view', array('id' => $data->book->id)); ?>" rel="tooltip" data-title="<?php echo $data->title; ?>">
            <img src="<?php echo H::getNovelImageUrl($data->book->imgurl); ?>" width="300" height="200" alt="<?php echo $data->title; ?>">
        </a>
        <h5><?php $this->widget('bootstrap.widgets.TbLabel', array(
                'type' => 'success', // 'success', 'warning', 'important', 'info' or 'inverse'
                'label' => $data->book->category->title,
            )); ?>&nbsp;&nbsp;        <a href="<?php echo $this->createUrl('book/view', array('id' => $data->book->id)); ?>" rel="tooltip" data-title="<?php echo $data->title; ?>">
                <?php echo $data->title; ?>
            </a></h5>
<!--        <p>--><?php //echo H::substr($data->summary, 10);?><!--</p>-->
    </div>
</li>