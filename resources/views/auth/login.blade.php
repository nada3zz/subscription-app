@include('layouts/app')

<article>
    <div class="container mt-5 x-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                </span>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            @if ($errors->has('credentials'))
                            <div class="alert alert-danger">
                                {{ $errors->first('credentials') }}
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>