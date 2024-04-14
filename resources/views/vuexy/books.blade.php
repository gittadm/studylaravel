@extends('vuexy.layout.app')

@section('title', 'Книги')

@section('content-title', 'Книги')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <a href="{{ route('vuexy.books.create') }}" class="btn btn-primary mr-1 mb-1"><i class="feather icon-plus"></i> Новая книга</a>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 80px;">ID</th>
                                        <th>Название</th>
                                        <th>Автор</th>
                                        <th>Издательство</th>
                                        <th>Год</th>
                                        <th>Добавлена</th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->year }}</td>
                                            <td>{{ $book->created_at }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    {{ $books->appends(request()->input())->links() }}
                                </div>
                                <div class="col-6 text-right">
                                    Всего: {{ $books->total() }}
                                </div>
                            </div>
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
