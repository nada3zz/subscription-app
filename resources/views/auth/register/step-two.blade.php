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
                        <form action="{{ route('register.post-step-two') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group{{ $errors->has('plan_id') ? ' has-error' : '' }}">
                                <label>Choose a Plan:</label>
                                @foreach($plans as $plan)
                                <div>
                                    <input type="radio" name="plan_id" value="{{ $plan->id }}" required>
                                    {{ $plan->name }} - ${{ $plan->price }}
                                </div>
                                @endforeach
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Complete Registration</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>