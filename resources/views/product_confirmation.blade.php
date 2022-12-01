<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>商品登録確認画面</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
    
        </script>
    </head>
    <body>
        <header>
        </header>
        <main>
            <h1 class="page-title">商品登録確認画面</h1>
            @csrf
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">商品名</td>
                        <td class="form-item-input">            
                        {{ $input["name"] }}
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">商品カテゴリ</td>
                        <td class="form-item-input">
                            <span>       
                            {{ $category->name }} > {{ $subcategory->name }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">商品写真</td>
                        <td class="form-item-input">
                        @if ($input['image_1'])
                        <p>写真1</p>
                        <span><img src="/storage/images/{{ $input['image_1'] }}" class="show_image"></span><br>
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">商品説明</td>
                        <td class="form-item-input">
                            {{ $input["product_content"] }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="button">
                <input class="btn confirm" type="submit" value="商品を登録する">
            </div>
            <div class="button">
                <button class="btn former" type="button" onclick="history.back()">前に戻る</button>
            </div>
            </form> 
        </main>

    </body>
</html>
