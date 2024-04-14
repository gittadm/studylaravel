@extends('vuexy.layout.app')

@section('title', 'Новая книга')

@section('content-title', 'Новая книга')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Основные данные</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" id="form" method="post" action="{{ route('vuexy.books.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Название*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text"value="" autocomplete="off" class="form-control" name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Автор*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text"  value="" autocomplete="off" class="form-control" name="author" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Жанр</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" value="" autocomplete="off" class="form-control" name="genre" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Издательство</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" autocomplete="off" value="" name="publisher" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Год</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" min="1900" max="2026" value="" autocomplete="off" class="form-control" name="year" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Аннотация</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="6" name="annotation" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Изображение</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" value="" autocomplete="off" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Файл</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" value="" autocomplete="off" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
    </script>
@endsection
