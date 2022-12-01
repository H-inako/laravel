<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>商品登録</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
        $(function() {
            //小カテゴリ
            $('#product_category').on('change',function () {
            var cate_val = $('option:selected', this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/subcategory',
                type: 'POST',
                data: {'product_category_id' : cate_val},
                datatype: 'json',
                })
                .done(function(data) {
                $('#product_subcategory option').remove();
                $('#product_subcategory').append($('<option>').text('選択してください').attr('value', ''));
                $.each(data, function(key,value) {
                        $('#product_subcategory').append($('<option>').text(value.name).attr('value', value.id));
                    })
                })
                .fail(function() {
                console.log('失敗');
                }); 
            });

            $('#file_upload_btn_1').on('click', function() {
                const allowExtensions = '.(jpg|jpeg|png|gif)$';
                if ($('#image_1')[0].files[0].name.match(allowExtensions) && $('#image_1')[0].files[0].size < 10485760) {

                    var formData = new FormData();
                    formData.append('image', $('#image_1')[0].files[0]);

                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/images',
                    type: 'POST',
                    data: formData,
                    dataType: 'text',
                    processData: false,
                    contentType: false,
                    })
                    .done(function(data) {
                    $('#image_1_path').attr('value', data);
                    $('#show_image_1').attr('src', '/storage/images/'+ data);
                    })
                    .fail(function() {
                    console.log('通信失敗');
                    });
                } else {
                    alert('拡張子がjpg、jpeg、png、gif以外または10MB以上のファイルはアップロードできません');
                    return;
                }
            });
        });
        </script>
    </head>
    <body>
        <header>
        </header>
        <main>
            <h1 class="page-title">商品登録</h1>
            <form method="post" action="{{ route('product_post') }}"  enctype="multipart/form-data">
            @csrf
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">商品名</td>
                        <td class="form-item-input">            
                            <input class="name" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">商品カテゴリ</td>
                        <td class="form-item-input">
                            <span>   
                                {{-- カテゴリ --}}    
                                <select class="product_category" id="product_category" name="product_category_id"> 
                                <option value="" hidden>選択してください</option>  
                                @foreach($product_categories as $product_category)
                                <option value="{{ $product_category->id }}" {{ old('product_category_id') == $product_category->id ? 'selected' : '' }}> {{ $product_category->name }}</option>
                                @endforeach
                                </select>
                            </span>
                            <span>
                                {{-- サブカテゴリ --}}
                                <select class="product_subcategory" id="product_subcategory" name="product_subcategory_id">
                                @if(!empty(old('product_subcategory_id')))
                                    @foreach($product_subcategories as $product_subcategory)
                                        @if($product_subcategory->product_category_id == old('product_category_id'))
                                            <option value="{{ $product_subcategory->id }}" {{ (old('product_subcategory_id') == $product_subcategory->id) ? 'selected': '' }}>{{ $product_subcategory->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                                </select>
                            </span>
                        @error('product_category_id')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        @error('product_subcategory_id')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">商品写真</td>
                        <td class="form-item-input">
                        <p>写真1</p>
                            <input type="file" name="image_1_file" id="image_1" >
                            <input type="hidden" name="image_1" id="image_1_path" value="{{ old('image_1') }}">
    
                            @if(!empty(old('image_1')))
                                <img src="/storage/images/{{ old('image_1') }}" alt="" class="show_image">
                            @else
                                <img src="" class="show_image" id="show_image_1">
                            @endif
                            
                            <button type="button" id="file_upload_btn_1">アップロード</button>
                        </td>
                    </tr>
                    @error('image_1')
                        <tr class="error">
                            <td>{{ $message }}</td>
                        </tr>
                    @enderror
                    <tr>
                        <td class="form-label">商品説明</td>
                        <td class="form-item-input"><textarea class="product_content" name="product_content">{{ old('product_content') }}</textarea>
                        @error('product_content')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    </tr>
                </table>
            </div>
            <div class="button">
            <input class="btn confirm" type="submit" value="確認画面へ">
            </div>
            <div class="button">
                <a class="btn former" href="{{ route('top') }}">トップへ戻る</a>
            </div>
            </form> 
        </main>

    </body>
</html>
