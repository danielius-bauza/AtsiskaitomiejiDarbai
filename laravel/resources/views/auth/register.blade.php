<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mt-8">Create an account</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf

            <div class="form-control w-full mt-2">
                <label class="label" for="name"><span class="label-text">Name</span></label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="input input-bordered w-full @error('name') input-error @enderror" />
                @error('name')
                    <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                @enderror
            </div>

            <div class="form-control w-full mt-2">
                <label class="label" for="email"><span class="label-text">Email</span></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('email')
                    <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                @enderror
            </div>

            <div class="form-control w-full mt-2">
                <label class="label" for="password"><span class="label-text">Password</span></label>
                <input id="password" type="password" name="password" required
                    class="input input-bordered w-full @error('password') input-error @enderror" />
                @error('password')
                    <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                @enderror
            </div>

                    <div class="form-control w-full mt-2">
                        <label class="label" for="password_confirmation"><span class="label-text">Confirm password</span></label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="input input-bordered w-full" />
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">Sign Up</button>
                    </div>
                </form>
                <p class="mt-4 text-sm text-base-content/60">
                    Already have an account? <a href="/login" class="link">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
