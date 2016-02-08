<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Título da publicação
            <small> Autor</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Publicação</a></li>
            <li class="active"> Avaliar Publicação</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <!-- right column -->
            <div class="col-md-10 col-md-offset-1">
                <!-- Horizontal Form -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Avaliar Publicação</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputAddress3" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="sel1" >
                                        <option>Não avaliada</option>
                                        <option>Aprovada</option>
                                        <option>Reprovada</option>
                                        <option>Imprópria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress3" class="col-sm-2 control-label"> Texto da avaliação</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" placeholder="Avaliação..."> </textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-default">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Avaliar</button>
                                </div>
                            </div>    
                        </div><!-- /.box-footer -->
                    </form>
                </div><!-- /.box -->
                <!-- general form elements disabled -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
