@extends('admin.layout.app')

@section('title', '№ ' . $user->id . ' ' . $user->name)

@section('content-title', 'Пользователь № ' . $user->id . ' ' . $user->name)

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if($errors->any())
                                <div style="color: red; margin-bottom: 12px;">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            @if(session()->has('message'))
                                <p class="text-success">{{ session('message') }}</p>
                            @endif
                            <form action="{{ route('admin.users.update', [$user->id]) }}" class="form form-horizontal" method="post">
                                @csrf
{{--                                <input type="hidden" name="id" value="{{ $user->id }}">--}}
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
                                                            <option value="{{ $key }}"
                                                                    @if($key == old('status', $user->status)) selected @endif>{{ $status }}</option>
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
                                                    <input type="text" value="{{ old('name', $user->name) }}" required autocomplete="off" class="form-control" name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Логин</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" autocomplete="off" value="{{ old('login', $user->login) }}" name="login" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" autocomplete="off" value="{{ old('email', $user->email) }}" name="email" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Сохранить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <h4 class="card-title mt-2 mb-2">Смена пароля</h4>

                            <form action="{{ route('admin.users.update.password', [$user->id]) }}" class="form form-horizontal" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span class="">Новый пароль*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" id="newPassword" class="form-control" name="password" placeholder="не менее 8 символов">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Повтор пароля*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1" id="passwordBtn">Сохранить</button>
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
