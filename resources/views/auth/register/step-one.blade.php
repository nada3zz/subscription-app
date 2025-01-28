@include('layouts/app')

<article>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.post-step-one') }}" method="POST">
                        @csrf
                        <div class="mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>

                            @if ($errors->has('name'))
                            <span class="help-block">
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <div class="alert alert-danger"> {{ $errors->first('password') }}</div>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <div class="alert alert-danger"> {{ $errors->first('password_confirmation') }}</div>
                            </span>
                            @endif
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</article>