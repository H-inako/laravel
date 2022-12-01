

$('#product_category').change(function () {
    var cate_val = $(this).val();

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/fetch/category',
      type: 'POST',
      data: {'category_val' : cate_val},
      datatype: 'json',
    })
    .done(function(data) {
      // 子カテゴリのoptionを一旦削除
      $('#product_subcategory option').remove();
      // DBから受け取ったデータを子カテゴリのoptionにセット
      $.each(data, function(key, value) {
        $('#product_subcategory').append($('<option>').text(value.name).attr('value', key));
      })
    })
    .fail(function() {
      console.log('失敗');
    }); 
    
  });