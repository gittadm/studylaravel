@extends('admin.layout.app')

@section('title', 'Пользователи')

@section('content-title', 'Пользователи')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">

                @if(session()->has('message'))
                    <p class="text-success">{{ session('message') }}</p>
                @endif

                @if(session()->has('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif

                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary">
                            <i data-feather="plus"></i>
                            <span>Новый пользователь</span>
                        </a>
                    </div>
                </div>

                @includeIf('admin.users.filter')

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

                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->login }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @include('admin.users.status')
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.users.edit', [$user->id]) }}"  class="btn btn-sm btn-outline-dark">
                                                        <span>Редактировать</span>
                                                    </a>
                                                    <a href="{{ route('admin.users.delete', [$user->id]) }}" class="btn btn-sm btn-outline-danger">
                                                        <span>Удалить</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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

                <div class="row">
                    <div class="col-12">
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
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
