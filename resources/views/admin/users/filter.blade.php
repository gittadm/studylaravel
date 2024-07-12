<div class="row mb-2">
    <div class="col-md-12 col-lg-12">
        <form role="form" method="get">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <input type="text" style="width: 100%;" autocomplete="off"
                           value="{{ $filter['search'] ?? '' }}" placeholder="ФИО, логин или email" name="search" class="form-control">
                </div>
                <div class="col-sm-6 col-md-3">
                    <select class="form-control filter-select" autocomplete="off" name="status" style="width: 100%;">
                        <option value="">Все статусы</option>
                        @foreach($statuses as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 col-md-3">
                    <select class="form-control filter-select" autocomplete="off" name="sort" style="width: 100%;">
                        <option value="1">Сорт. по ФИО</option>
                        <option value="2">Сорт. по id</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-default btn-outline" title="Применить фильтр" style="width: 20%;" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <a href=""
                       class="btn btn-default btn-outline ml-2" title="Сбросить фильтр">
                        <i class="fa fa-eraser"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
