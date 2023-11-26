@extends('layouts.app')

@section('title', 'Clientes')
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
    <x-ModalCreateCustomer :user="$customer->user ?? null" />
    <x-ModalEliminar />
    <x-Navbar />
    <div class="container">
        <h1 class="" style="margin-top: 75px">Customers</h1>
        <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalUser">
            <i class="fa-solid fa-plus text-white"></i> Add Customer
        </button>
    </div>
    <div class="table-responsive container-fluid p-2 m-0">
        <table class="table m-0 table-hover table-striped border border-secondary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">First Names</th>
                    <th scope="col">Last Names</th>
                    <th scope="col">Actions</th>
                    {{-- <th scope="col">Password</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr scope="row">
                        <td>{{ $customer->id_customer }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->user->email }}</td>
                        <td>{{ $customer->user->first_names }}</td>
                        <td>{{ $customer->user->last_names }}</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" onclick="window.location.href = '{{ route('customers.resetDefaultProject', $customer) }}'">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-white"></i>
                                </button>
                                <button type="button" class="btn btn-danger pmd-btn-icon pmd-ripple-effect ml-2" data-toggle="modal" data-target="#modalEliminar" onclick="setDeleteForm('{{ route('customers.destroy', ['customer' => $customer]) }}')">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </button>
                            </div>
                        </td>
                        {{-- <td>{{ $customer->user->password }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function setDeleteForm(action) {
            // Set the action attribute and id value for the delete form
            document.getElementById('deleteForm').action = action;
        }
    </script>
    {{-- <h4>Recursos</h4> --}}
    {{-- @foreach ($customers as $customer)
        <li>
            <a href="{{route('customers.resources', $customer)}}">{{$customer->user->first_names}} {{$customer->user->last_names}}</a>
        </li>
    @endforeach --}}
@endsection