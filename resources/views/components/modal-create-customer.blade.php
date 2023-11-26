@props(['user'])
<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUserLabel">
                    Edit profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCustomerForm" action="{{ route('customers.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" value="{{ old('email', 'customer.email@example.com') }}" class="form-control" id="email" name="email" required>
                        @error('email')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="first_names">First Names:</label>
                        <input type="text" value="{{ old('first_names', 'Leonardo') }}" class="form-control" id="first_names" name="first_names" required>
                        @error('first_names')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_names">Last Names:</label>
                        <input type="text" value="{{ old('last_names', 'Da Vinci') }}" class="form-control" id="last_names" name="last_names" required>
                        @error('last_names')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar_image">Avatar Image:</label>
                        <input type="file" class="form-control-file" id="avatar_image" name="avatar_image">
                        @error('avatar_image')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" value="{{ old('password', 'password') }}" class="form-control" id="password" name="password" required>
                        @error('password')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="phone" value="{{ old('phone', '1234567890')}}"  class="form-control" id="phone" name="phone" required>
                        @error('phone')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" maxlength="250" value="{{ old('address', '177A Bleecker Street, Greenwich Village, New York') }}" class="form-control" id="address" name="address" required>
                        @error('address')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="second_email">Second Email:</label>
                        <input type="email" value="{{ old('second_email', 'customer.second_email@example.com') }}" class="form-control" id="second_email" name="second_email" required>
                        @error('second_email')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>