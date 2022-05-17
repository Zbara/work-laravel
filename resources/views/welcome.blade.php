<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Work</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Test Work</h2>
        </div>
        <div class="col-md-5">
            <div id="alert"></div>
        </div>
        <form id="saveForm">
            <div class="col-md-5">
                <label for="brand" class="form-label">Марка</label>
                <select class="form-select" id="brand" name="brandId" required>
                    <optgroup label="Выберите марку"></optgroup>
                    <option value="0">Не выбрана</option>
                    @foreach ($brand as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <label for="model" class="form-label">Модель</label>
                <select class="form-select" id="model" name="modelId" disabled>

                </select>
            </div>
            <div class="col-md-5">
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit" disabled id="sendButton">
                    Отправить данные
                </button>
            </div>
        </form>
    </main>
</div>
</body>

<script src="/js/app.js"></script>
</html>
