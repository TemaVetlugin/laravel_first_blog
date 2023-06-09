@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                        <li class="breadcrumb-item active">Редактировать</li>
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
                <div class="col-12">
                    <form action="{{route('admin.post.update', $post['id'])}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')
                        <div class="form-group w-25">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control " placeholder="Введите название" value="{{$post['title']}}">

                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content" >{{$post['content']}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50 m-20">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="preview_image mb-3">
                                <image class="w-50 " src="{{asset('storage/'.$post->preview_image)}}"></image>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input " id="exampleInputFile" name="preview_image" value="{{old('preview_image')}}">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50 m-20">
                            <label for="exampleInputFile">Добавить главное изображение</label>
                            <div class="main_image mb-3">
                                <image class="w-50 " src="{{asset('storage/'.$post['main_image'])}}"></image>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}" {{$category['id']==$post['category_id'] ?' selected':''}}>

                                        {{$category['title']}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите тэги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{is_array($post->tags->pluck('id')->toArray() )&&in_array($tag->id, $post->tags->pluck('id')->toArray())?'selected':''}} value="{{$tag['id']}}">{{$tag['title']}}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
