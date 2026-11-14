<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Deactivate Account</h2>
        <p class="mt-1 text-sm text-gray-600">
            You will be logged out and your account will be hidden. Your data is kept, and logging in again reactivates it.
        </p>
    </header>

    <form method="post" action="{{ route('profile.deactivate') }}" class="space-y-6"
          onsubmit="return confirm('Deactivate your account?');">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="deactivate_password" value="Password" />
            <x-text-input id="deactivate_password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Confirm with your password" />
            <x-input-error :messages="$errors->accountDeactivation->get('password')" class="mt-2" />
        </div>

        <x-danger-button>Deactivate Account</x-danger-button>
    </form>
</section>