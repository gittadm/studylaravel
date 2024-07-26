@extends('admin.layout.app')

@section('title', 'Ваш профиль')

@section('content-title', 'Ваш профиль')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                @if(session()->has('message'))
                    <p class="text-success">{{ session('message') }}</p>
                @endif

                @if(session()->has('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Основные данные</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.profile.update') }}" class="form form-horizontal" id="profileForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Имя</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="profileName" value="{{ old('name', $user->name) }}" autocomplete="off" class="form-control" name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" id="profileMiddleName" value="{{ old('email', $user->email) }}" autocomplete="off" class="form-control" name="email" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Логин</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" readonly id="profileLogin" class="form-control" autocomplete="off" value="{{ $user->login }}" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1" id="profileBtn">Сохранить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <h4 class="card-title mt-2 mb-2">Смена пароля</h4>

                            <form method="post" action="{{ route('admin.profile.update.password')  }}" class="form form-horizontal" id="passwordForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Текущий пароль*</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" id="currentPassword" class="form-control" name="current_password" placeholder="">
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input type="password" id="newPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submi" class="btn btn-primary mr-1 mb-1" id="passwordBtn">Сохранить</button>
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
