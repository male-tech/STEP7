$(document).ready(function(){ 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });

    $('#product-table').tablesorter();
    
    $(document).on('click', '.btn-danger', function(e) {
        e.preventDefault();
        var deleteConfirm = confirm('削除してよろしいでしょうか？');
        if(deleteConfirm == true){
            var clickEle = $(this);
            var productId = clickEle.attr('data-product_id');

            $.ajax({
                url: '/destroy/'+productId,
                type: 'POST',
                data: {'_token': $('meta[name="csrf-token"]').attr('content')},})
                .done(function() {
                    clickEle.parents('tr').remove();
                  })
                .fail(function() {
                    alert('エラー');
                  });
            }else{
                (function(e) {
                    e.preventDefault()
                  });
            }
        
    });
    
    $('#search-button').on('click',function(e){
        e.preventDefault();
        var searchText = $('#search-form').serialize();

        console.log(searchText)
        $.ajax({
            url: '/search',
            type: 'GET',
            data: searchText,
            dataType: 'json',
            })
            .done(function(data) {
                console.log (data)
                $('#products-tbody').empty();
                if (data.length > 0){
                    $.each(data, function(index,product){
                        $('#products-tbody').append(
                            '<tr>' +
                            '<td>' + product.id + '</td>' +
                            '<td><img src="/storage/' + product.image + '" alt="商品画像" width="100"></td>' +
                            '<td>' + product.product_name + '</td>' +
                            '<td>' + product.price + '</td>' +
                            '<td>' + product.stock + '</td>' +
                            '<td>' + product.company.company_name + '</td>' +
                            '<td>' +
                                '<a href="/show/' + product.id + '" class="btn btn-info btn-sm mx-1">詳細</a>' +
                                '<form id="delete-form" method="POST" action="/destroy/' + product.id + '" class="d-inline">'  +         
                                '<input type="hidden" name="_method" value="POST">' + 
                                '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">'+
                                '<button data-product_id="' + product.id + '" type="submit" class="btn btn-danger btn-sm mx-1">削除</button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>'
                        );
                    });
                    $("#product-table").trigger("update");
                    

                } else {
                    $('#products-tbody').append('<tr><td colspan="7">検索結果が見つかりませんでした。</td></tr>');
                }
        }).fail(function(xhr, status, error) {
            console.log('Error: ' + error);
        });
    }); 

});



