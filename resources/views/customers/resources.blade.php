@extends('layouts.app')

@section('title', 'Cliente recursos ' . $customer->id_customer)
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
    <x-ModalProjectsUser :customer="$customer ?? null" :projects="$projects ?? null" :defaultProject="$defaultProject" />
    <x-ModalCreateResource :customer="$customer ?? null" :defaultProject="$defaultProject"/>
    <x-ModalEditResource :defaultProject="$defaultProject"/>
    <x-ModalEliminar />
    <x-Navbar />
    <!-- Contenido de la pag -->
    <div class="container" style="margin: auto; margin-top: 150px; margin-bottom: 110px;">
        <div class="row">
            <!-- Columna para la imagen -->
            <div class="col-md-4">
                <img src="{{ asset('img/perfil.png') }}" alt="Foto de Perfil" class="img-fluid">
            </div>
            <!-- Columna para el texto -->
            <div class="col-md-8" style="font-size: 20px;">
                <p><strong>Nombre:</strong> {{ $customer->user->first_names }}</p>
                <p><strong>Email:</strong> {{ $customer->user->email }}</p>
                <p><strong>Teléfono:</strong> {{ $customer->phone }}</p>
                <p><strong>Dirección:</strong> {{ $customer->address }}</p>
                @if ($customer->second_email)
                    <p><strong>Segundo Email:</strong> {{ $customer->second_email }}</p>
                @endif
            </div>
        </div>
    </div>

    <div style="background-color: white; padding: 10px; color: white;"></div>


    <div class="title text-center m-0" style="font-size: 30px; color: black;">Resources</div>

    <div class="container d-flex align-items-center p-2">
        <p class="text-center p-0 m-0 h-100">{{ $defaultProject->name }}</p>
        <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect mx-4" data-toggle="modal"
            data-target="#modalProjectUser">
            <i class="fa-solid fa-ellipsis"></i>
        </button>
    </div>

    <div class="container d-flex justify-content-between p-0">
        <x-SidebarUser :customer="$customer" :defaultProject="$defaultProject" />
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect w-100" data-toggle="modal"
                        data-target="#modalResource">
                        <i class="fa-solid fa-plus text-white"></i> Add stage
                    </button>
                </div>
            </div>
            <div class="row">
                @foreach ($resources as $resource)
                    <div class="col-3 project"
                        style="cursor: pointer;">
                        <img src="{{ asset('img/folder_svgrepo.com.png') }}" alt="Carpeta 1" width="112" height="89" onclick="window.location.href = '{{ $resource->link }}'">
                        <div class="project-title" onclick="window.location.href = '{{ $resource->link }}'">{{ $resource->title }}</div>
                        <div class="d-flex justify-content-center align-items-center">
                          <button type="button"
                              class="btn btn-primary pmd-btn-icon pmd-ripple-effect d-flex justify-content-center align-items-center"
                              data-toggle="modal" data-target="#modalEditResource" data-id-resource="{{ $resource->id_resource }}"
                              data-title="{{ $resource->title }}" data-link="{{ $resource->link }}" onclick="populateEditModal(this)">
                              <i class="fa-solid fa-pen-to-square text-white h6"></i>
                          </button>
                          <button type="button"
                              class="btn btn-primary pmd-btn-icon pmd-ripple-effect ml-2 d-flex justify-content-center align-items-center"
                              data-toggle="modal" data-target="#modalEliminar" onclick="setDeleteForm('{{ route('resources.destroy', ['resource' => $resource]) }}')">
                              <i class="fa-solid fa-trash text-white h6"></i>
                          </button>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div style="background-color: white; padding: 10px; color: white;">h</div>

    <x-WhatsAppButton />
    <x-Footer />
    <script>
      function populateEditModal(button) {
          // Get the data attributes from the button
          var id_resource = button.getAttribute('data-id-resource');
          var title = button.getAttribute('data-title');
          var link = button.getAttribute('data-link');

          // Update the modal input fields
          var modal = document.getElementById('modalEditResource');
          modal.querySelector('#id_resource').value = id_resource;
          modal.querySelector('#edit_title').value = title;
          modal.querySelector('#edit_link').value = link;
      }
  </script>

<script>
  function setDeleteForm(action) {
      // Set the action attribute and id value for the delete form
      document.getElementById('deleteForm').action = action;
  }
</script>
@endsection
