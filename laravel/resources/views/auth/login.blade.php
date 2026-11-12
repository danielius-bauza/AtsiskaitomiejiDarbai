<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mt-8">Sign in</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/login">
                    @csrf

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

                    <div class="form-control mt-4">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" name="remember" class="checkbox checkbox-sm" />
                            <span class="label-text">Remember me</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-full">Sign In</button>
                    </div>
                </form>
                <p class="mt-4 text-sm text-base-content/60">
                    No account yet? <a href="/register" class="link">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
