@extends('layouts.master')
@section('title')
<title>SIMS - Import Santri</title>
@stop
@section('content')
<section class="content-header">
    <h1>Import Santri</h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/santri">Santri</a></li>
        <li class="active">Import Santri</li>
    </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Import Santri</h3>
                    </div>
                    <form role="form" action="/santri/import_excel" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="file">Pilih File Excel</label>
                                <input name="file" type="file" id="file" placeholder="Masukkan File">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>  
                </div>
            </div>        
        </div>   
</section>
@stop