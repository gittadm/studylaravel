@extends('admin.layout.app')

@section('title', 'Пользователи')

@section('content-title', 'Пользователи')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">


                <div class="row mb-2">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-primary">
                            <i data-feather="plus"></i>
                            <span>Новый пользователь</span>
                        </button>
                    </div>
                </div>


                <!-- Striped rows start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ФИО</th>
                                        <th>Логин</th>
                                        <th>Email</th>
                                        <th>Аккаунт</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>Иванов Иван</td>
                                        <td>
                                            log123
                                        </td>
                                        <td>abs@email.ru</td>
                                        <td>
                                            <span class="badge rounded-pill badge-light-primary me-1">Активный</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-dark">
                                                <span>Редактировать</span>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <span>Удалить</span>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>ФИО</th>
                                        <th>Логин</th>
                                        <th>Email</th>
                                        <th>Аккаунт</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Striped rows end -->





            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
    </script>
@endsection
