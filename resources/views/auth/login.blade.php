<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Iniciar Sesión
        </h2>
  
    </x-slot>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 p-2 border-radiu">
              <h2 class="display-5 text-center text-dark">Iniciar Sesión</h2>
                
              <x-jet-validation-errors class="mb-4" />
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control" />
                      <label class="form-label" for="form2Example1">Email</label>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control" />
                      <label class="form-label" for="form2Example2">Contraseña</label>
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                  
                      <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                      </div>
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success btn-block text-white mb-4">Sign in</button>
                  
                    <!-- Register buttons -->
                  </form>
             
            </div>
        </div>
    </div>
  
</x-app-layout>