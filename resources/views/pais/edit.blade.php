<div class='container'>
    <h1>Edit Municipio</h1>
    <form method="POST" action='{{route ('paises.update', ['pais' =>$pais->pais_codi])}}'>
       @method('put')
        @csrf
        <div class='mb-3'>
            <label for="codigo" class='form-label'>Id</label>
            <input type="text" class='form-control' id='id' aria-describedby="codiHelp" name="id"
            disabled='disabled' value="{{$pais->pais_codi}}">
            <div id="codiHelp" class="form-text">Pais Id.</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Pais</label>
            <input type="text" required class="form-control" id="name" placeholder="Pais name."
            name="name" value="{{$pais->pais_codi}}">
        </div>
        <label for="departamento">Municipio:</label>
        <select class="form-select" id="municipio" name="code" required>
            <option selected disabled value="">Choose one...</option>
            @foreach ($municipios as $municipio)
            @if ($municipio->muni_codi == $pais->muni_codi)      
            <option selected value="{{$municipio->muni_codi}}">{{$$municipio->muni_nomb}}</option>   
            @else
            <option value="{{$municipio->muni_codi}}">{{$municipio->muni_nomb}}</option>
            @endif
            @endforeach
        </select>
          <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('municipios.index')}}" class="btn btn-warning">Cancel</a>
          </div>
      </form>
  </div>