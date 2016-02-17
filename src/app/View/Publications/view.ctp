<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publicação
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Publicações</a></li>
            <li class="active">Visualizar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $publication['User']['name'];?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?php echo h($publication['Publication']['title']); ?></h3>
                            <h5><?php echo $publication['Matter']['name']; ?><span class="mailbox-read-time pull-right"><?php echo h($publication['Publication']['registration']); ?></span></h5>
                        </div><!-- /.mailbox-read-info -->
                        <div class="mailbox-read-message">
                    <?php echo h($publication['Publication']['text_publication'])?>
                        </div><!-- /.mailbox-read-message -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <ul class="mailbox-attachments clearfix">
                            <li>
                                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                                    <span class="mailbox-attachment-size">
                                        1,245 KB
                                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                                    <span class="mailbox-attachment-size">
                                        1,245 KB
                                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.box-footer-->
                    <div class="box-footer">
                  <?php if($teacher['Teacher']['matter_id'] == $publication['Publication']['matter_id']){
                      echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil')).'Avaliar',
                          array('controller' => 'publications', 'action' => 'review',$publication['Publication']['id']),
                  array('class' => 'btn btn-default','escape' => false)); } ?>
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-star')).'1', array('controller' => 'ratings', 'action' => 'add'), array('escape' => false));?>
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-star')).'2', array('controller' => 'ratings', 'action' => 'add'), array('escape' => false));?>
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-star')).'3', array('controller' => 'ratings', 'action' => 'add'), array('escape' => false));?>
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-star')).'4', array('controller' => 'ratings', 'action' => 'add'), array('escape' => false));?>
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-star')).'5', array('controller' => 'ratings', 'action' => 'add'), array('escape' => false));?>
                        <span class='pull-right text-muted'>
                            5 likes - 2 comments</span>
                    </div><!-- /.box-footer -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
