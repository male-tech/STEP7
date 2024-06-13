$(document).ready(function(){
    $('#search-button').on('click',function(){
        var formData = $('#search-form').serialize();

        $.ajax({
            url: '/search',
            type: 'GET',
            data: formData,
            success: function(data){
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
                                '<form method="POST" action="/product/destroy/' + product.id + '" class="d-inline">' +
                                    '@csrf' +
                                    '@method("POST")' +
                                    '<button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return checkDelete()">削除</button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>'
                        );
                    });
                } 
            },
        });
    });
});

$(document).ready(function() {
    $('#delete-button').click(function() {
        
         var button = $(this);
         var form = button.closest('#delete-form');
         var productId = form.data('id');

        $.ajax({
            url: '/destroy' + productId,
            type: 'POST',
            data: form.serialize(),
            success: function() {
                $('#product-' + productId).remove();
            },
            error: function(xhr) {
                alert('削除に失敗しました: ' + xhr.responseText);
            }
        });
    });
});

function checkDelete(){
    if(window.confirm('削除してもよろしいですか？')){
        return true;
    } else {
        return false;
    }
}



