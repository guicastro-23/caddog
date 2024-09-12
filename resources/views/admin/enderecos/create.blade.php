@extends('admin.layouts.principal')

@section('conteudo-principal')
    <div class="container">
        <h4>Criar Novo Endereço</h4>

        <form action="{{ route('admin.enderecos.store') }}" method="POST">
            @csrf

            <!-- Campo de seleção para cidades -->
            <div class="input-field">
                <select name="cidades_id" id="cidades_id">
                    @foreach($cidades as $cidade)
                        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                    @endforeach
                </select>
                <label for="cidades_id">Cidade</label>
                @error('cidades_id')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo de texto para logradouro -->
            <div class="input-field">
                <input type="text" name="logradouro" id="logradouro" value="{{ old('logradouro') }}" />
                <label for="logradouro">Logradouro</label>
                @error('logradouro')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo de texto para bairro -->
            <div class="input-field">
                <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}" />
                <label for="bairro">Bairro</label>
                @error('bairro')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo de texto para complemento -->
            <div class="input-field">
                <input type="text" name="complemento" id="complemento" value="{{ old('complemento') }}" />
                <label for="complemento">Complemento</label>
                @error('complemento')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn waves-effect waves-light" type="submit">Salvar Endereço</button>
        </form>
    </div>

    <!-- Inicializa o componente select do Materialize -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
        });
    </script>
@endsection
