<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Curso - Introducción a laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">                                                        
        
    </head>
    <body class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar usuario
                    </button>
                </div>                
            </div>
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> 
                                        <form                                              
                                            action="{{ route('users.destroy', $user) }}" 
                                            method="POST"
                                        >
                                            @method('DELETE')
                                            @csrf

                                            <input 
                                                type="submit"
                                                value="Eliminar" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Desea eliminar...?')"
                                            >
                                                
                                    
                                            
                                        </form>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('users.store')}}" method="POST">
                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    
                        <div class="modal-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-sm-12 mb-3">
                                    <label for="name" class="form-label">Nombre del usuario:</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        class="form-control"
                                        placeholder="Nombre del usuario"
                                        value="{{ old('name') }}"
                                    >
                                </div>
                                
                                <div class="col-sm-12 mb-3">
                                    <label for="email" class="form-label">Correo electrónico:</label>
                                    <input 
                                        type="text" 
                                        name="email" 
                                        id="email" 
                                        class="form-control"
                                        placeholder="Correo electrónico"
                                        value="{{ old('email') }}"
                                    >
                                </div>
                                
                                <div class="col-sm-12 mb-3">
                                    <label for="name" class="form-label">Contraseña:</label>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        class="form-control"
                                        placeholder="Contraseña"
                                        value="{{ old('password') }}"
                                    >
                                </div>                                    
                            </div>
  
                        </div>
                    
                        <div class="modal-footer">
                            @csrf
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
