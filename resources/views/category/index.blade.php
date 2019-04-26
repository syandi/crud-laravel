@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Daftar Kategory</div>

                <div class="card-body">
                    <table id="table-category"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function operateFormatter(value, row, index) {
        return [
        '<a class="like" href="javascript:void(0)" title="Like">',
        '<i class="fas fa-edit"></i>',
        '</a>  ',
        '<a class="remove" href="javascript:void(0)" title="Remove">',
        '<i class="fa fa-trash"></i>',
        '</a>'
        ].join('')
    }

    window.operateEvents = {
        'click .like': function (e, value, row, index) {
        alert('You click like action, row: ' + JSON.stringify(row))
        },
        'click .remove': function (e, value, row, index) {
        $table.bootstrapTable('remove', {
            field: 'id',
            values: [row.id]
        })
        }
    }

    $('#table-category').bootstrapTable({
        url: 'api/category',
        pagination: true,
        search: true,
        columns: [
            {
                field: 'id',
                title: 'ID'
            },
            {
                field: 'name',
                title: 'Deskripsi'
            },
            {
                field: 'operate',
                title: 'Aksi',
                align: 'center',
                events: window.operateEvents,
                formatter: operateFormatter
            }
        ]
    })

</script>
@endsection
