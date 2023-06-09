@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Теги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Теги</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-2">
                        <a href='{{route('admin.tag.create')}}' type="button" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <br>
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th colspan="3" class="text-center">Действие</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{$tag['id']}}</td>
                                                <td>{{$tag['title']}}</td>
                                                <td class="text-center"><a href="{{route('admin.tag.show', $tag['id'])}}">
                                                        <i class="nav-icon fas fa-search"></i>
                                                    </a></td>
                                                <td class="text-center"><a class="text-success"
                                                       href="{{route('admin.tag.edit', $tag['id'])}}">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a></td>
                                                <td class="text-center">
                                                    <form action="{{route('admin.tag.delete', $tag->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="nav-icon fas fa-hand-point-up text-danger"
                                                               role="button"></i>
                                                        </button>
                                                    </form>


                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>


                </div>
            </div>
            <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
