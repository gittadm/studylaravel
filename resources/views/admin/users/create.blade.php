@extends('admin.layout.app')

@section('title', 'Новый пользователь')

@section('content-title', 'Новый пользователь')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.users.store') }}" class="form form-horizontal" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Статус*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-control" required autocomplete="off" name="status">
                                                        @foreach($statuses as $key => $status)
                                                            <option value="{{ $key }}">{{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Фамилия и имя*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" value="" required autocomplete="off" class="form-control" name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Логин</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" autocomplete="off" value="" name="login" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" autocomplete="off" value="" name="email" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Пароль</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="password" class="form-control" autocomplete="off" value="" placeholder="">
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
