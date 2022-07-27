@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
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
                <form action="{{route('product.update', $product->id)}}" method="post" class="w-50"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" value="{{$product->title ?? old('title')}}" name="title" class="form-control"
                               placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{$product->description ?? old('description')}}" name="description"
                               class="form-control" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10 "
                                  placeholder="Контент">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value="{{$product->price ?? old('price')}}" class="form-control"
                               placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" value="{{$product->count ?? old('count')}}" class="form-control"
                               placeholder="Количество">
                    </div>
                    <div class="w-25 mb-3">
                        <img src="{{asset('storage/' .$product->preview_image)}}" alt="preview_image"
                             class="w-50">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    {{$category->id == $product->category_id ? ' selected' : ''}}
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тэг" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    {{$tag->id == $product->tag_id}}
                                    >{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
