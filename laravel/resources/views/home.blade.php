<x-layout>
    <x-slot:title>Home</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                @auth
                    <form method="POST" action="/chirps">
                        @csrf

                    <div class="form-control w-full">
                        <textarea name="message" rows="4" maxlength="255" required
                            placeholder="What's on your mind?"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit" class="btn btn-primary btn-sm">Chirp</button>
                        </div>
                    </form>
                @else
                    <p class="text-base-content/60">
                        <a href="/login" class="link">Sign in</a> or
                        <a href="/register" class="link">sign up</a> to post a chirp.
                    </p>
                @endauth
            </div>
        </div>

        <div class="space-y-4 mt-8">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <p class="text-base-content/60">Be the first to chirp!</p>
            @endforelse
        </div>
    </div>
</x-layout>
