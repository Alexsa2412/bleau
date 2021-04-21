@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="form-validation-list">
            <li class="form-validation-list-item fw-bold">Verifique os erros:</li>
            @foreach($errors->all() as $error)
                <li class="form-validation-list-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
